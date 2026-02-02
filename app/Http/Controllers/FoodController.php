<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Food;
use App\Models\Menu;
use App\Models\Order;
use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class FoodController extends Controller
{
    // Show the Menu Page
    public function index(Request $request) {
        $query = \App\Models\Food::query();

        if ($request->has('category')) {
            $query->where('category', $request->category);
        }

        $foods = $query->paginate(6);
        $categories = \App\Models\Menu::all();
        
        return view('home.shop', compact('foods', 'categories'));
    }

    // Show Home Page with Featured Items
    public function home() {
        $featured_foods = Menu::take(6)->get(); 
        $food_items=Food::take(6)->get();
        
        return view('home.index', compact('featured_foods', 'food_items'));
    }

    public function addToCart(Request $request) {
       

        $user_id = FacadesAuth::user()->id;
        $food_id = $request->id;

        $cartItem = Cart::where('user_id', $user_id)->where('food_id', $food_id)->first();

        if($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            Cart::create([
                'user_id' => $user_id,
                'food_id' => $food_id,
                'quantity' => 1
            ]);
        }

        return redirect()->back()->with('success', 'Item added to cart!');
    }

    public function viewCart() {
        
        
        $user_id = FacadesAuth::user()->id;
        $cartItems = \App\Models\Cart::where('user_id', $user_id)->with('food')->get();
        
        return view('home.cart', compact('cartItems'));
    }

    public function incrementCart($id) {
        if(\Illuminate\Support\Facades\Auth::check()) {
            $user_id = \Illuminate\Support\Facades\Auth::id();
            $cart = \App\Models\Cart::find($id);
            if($cart && $cart->user_id == $user_id) {
                $cart->quantity += 1;
                $cart->save();
            }
        }
        return redirect()->back();
    }

    public function decrementCart($id) {
        if(\Illuminate\Support\Facades\Auth::check()) {
            $user_id = \Illuminate\Support\Facades\Auth::id();
            $cart = \App\Models\Cart::find($id);
            if($cart && $cart->user_id == $user_id) {
                if($cart->quantity > 1) {
                    $cart->quantity -= 1;
                    $cart->save();
                } else {
                    // Option: Remove if matches 1? Or just do nothing? 
                    // User asked for "-" button, usually means decrement. 
                    // To remove, they can use the remove button.
                    // Keeping it at 1 minimum.
                }
            }
        }
        return redirect()->back();
    }

    public function removeFromCart($id) {
            $user_id = FacadesAuth::user()->id;
            
            $cart =Cart::find($id);
            if($cart && $cart->user_id == $user_id) {
                $cart->delete();
            }

        return redirect()->back()->with('success', 'Item removed correctly');
    }

    public function checkout() {
        

        $user_id = FacadesAuth::user()->id;
        $cartItems = Cart::where('user_id', $user_id)->with('food')->get();
        $user_detail=User::find($user_id);

        if($cartItems->count() == 0) {
            return redirect()->route('shop');
        }
        return view('home.checkout', compact('cartItems','user_detail'));
    }

    public function placeOrder(Request $request) {
        if(!\Illuminate\Support\Facades\Auth::check()) {
            return redirect()->route('login');
        }

        // Validate request
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'payment_method' => 'required|in:cod,card'
        ]);

        // Calculate Total Amount
        $user_id = \Illuminate\Support\Facades\Auth::id();
        $cartItems = \App\Models\Cart::where('user_id', $user_id)->with('food')->get();
        $total = 0;
        foreach($cartItems as $item) {
            $total += $item->food->price * $item->quantity;
        }
        $shipping = $total > 1000 ? 0 : 500;
        $final_amount = $total + $shipping;

        // Create Order
        $order = new \App\Models\Order();
        $order->customer_name = $request->name;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->user_id = $user_id;
        $order->status = 'Pending';
        $order->price = $final_amount;
        $order->save();

        // Save Order Items
        foreach($cartItems as $item) {
            $orderItem = new \App\Models\OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->food_id = $item->food_id;
            $orderItem->quantity = $item->quantity;
            $orderItem->price = $item->food->price;
            $orderItem->save();
        }

        if ($request->payment_method == 'card') {
            $stripe = new \App\Http\Controllers\StripeController();
            return $stripe->pay($order->id, $final_amount);
        }

        // If Cash On Delivery (or other future methods)
        // Clear the cart from DB
        \App\Models\Cart::where('user_id', $user_id)->delete();

        return redirect()->route('user.home')->with('success', 'Order placed successfully! Thank you for ordering.');
    }

    public function orderSuccess(Request $request) {
        if($request->has('order_id')) {
            $order = \App\Models\Order::find($request->order_id);
            if($order) {
                $order->status = 'Paid'; // Or Confirmed
                $order->save();
                
                // Clear Cart
                $user_id = $order->user_id;
                \App\Models\Cart::where('user_id', $user_id)->delete();
                
                return redirect()->route('user.home')->with('success', 'Payment Successful! Your order #' . $order->id . ' has been placed.');
            }
        }
        return redirect()->route('user.home')->with('error', 'Something went wrong.');
    }

    public function myOrders() {
       
        $user_id =FacadesAuth::user()->id;
        $orders =Order::where('user_id', $user_id)->with('food')->latest()->get();
        return view('home.my_orders', compact('orders'));
    }

    public function cancelOrder($id) {
        $order = \App\Models\Order::find($id);
        if($order && $order->user_id == \Illuminate\Support\Facades\Auth::id()) {
            $order->delete();
            return redirect()->back()->with('success', 'Order cancelled successfully.');
        }
        return redirect()->back()->with('error', 'Order not found.');
    }
}
