<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Contact;
use App\Models\Food;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class FoodController extends Controller
{
    public function index(Request $request) {
        $query = Food::query();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where('name', 'LIKE', "%{$search}%");
        }

        if ($request->has('category')) {
            $query->where('category', $request->category);
        }

        $foods = $query->paginate(6);
        $categories =Menu::all();
        
        if ($request->wantsJson()) {
            return view('home.partials.food_grid', compact('foods'))->render();
        }

        return view('home.shop', compact('foods', 'categories'));
    }

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
        
        if ($request->wantsJson()) {
             $count = Cart::where('user_id', $user_id)->sum('quantity');
             return response()->json([
                 'success' => true, 
                 'message' => 'Item added to cart!',
                 'cart_count' => $count
             ]);
        }

        return redirect()->back()->with('success', 'Item added to cart!');
    }

    public function viewCart() {
        
        
        $user_id = FacadesAuth::user()->id;
        $cartItems = Cart::where('user_id', $user_id)->with('food')->get();
        
        return view('home.cart', compact('cartItems'));
    }

    public function incrementCart($id) {
        
            $user_id = FacadesAuth::id();
            $cart = Cart::find($id);
            if($cart && $cart->user_id == $user_id) {
                $cart->quantity += 1;
                $cart->save();

                if(request()->wantsJson()) {
                    return $this->cartJsonResponse($user_id, $cart);
                }
            }
        
        return redirect()->back();
    }

    public function decrementCart($id) {
        
            $user_id = FacadesAuth::id();
            $cart = Cart::find($id);
            if($cart && $cart->user_id == $user_id) {
                if($cart->quantity > 1) {
                    $cart->quantity -= 1;
                    $cart->save();
                
                
                if(request()->wantsJson()) {
                    return $this->cartJsonResponse($user_id, $cart);
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

            if(request()->wantsJson()) {
                return $this->cartJsonResponse($user_id, null);
            }

        return redirect()->back()->with('success', 'Item removed correctly');
    }

    private function cartJsonResponse($user_id, $updatedItem = null) {
        $cartItems = Cart::where('user_id', $user_id)->with('food')->get();
        $total = 0;
        foreach($cartItems as $item) {
            $total += $item->food->price * $item->quantity;
        }
        $shipping = $total > 200 ? 0 : 100;
        $final = $total + $shipping;
        $count = $cartItems->sum('quantity');

        return response()->json([
            'success' => true,
            'cart_count' => $count,
            'subtotal' => $total,
            'shipping' => $shipping,
            'total' => $final,
            'is_empty' => $count === 0,
            'item_id' => $updatedItem ? $updatedItem->id : null,
            'item_quantity' => $updatedItem ? $updatedItem->quantity : 0,
            'item_total' => $updatedItem ? $updatedItem->food->price * $updatedItem->quantity : 0,
        ]);
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
        try {
            if(FacadesAuth::check()) {
               
            }
             
             if(!FacadesAuth::check()) {
                 return redirect()->route('login');
             }

            $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|string|max:20',
                'address' => 'required|string',
                'payment_method' => 'required|in:cod,card'
            ]);

            $user_id = FacadesAuth::id();
            $cartItems = Cart::where('user_id', $user_id)->with('food')->get();
            $total = 0;
            foreach($cartItems as $item) {
                $total += $item->food->price * $item->quantity;
            }
            $shipping = $total > 200 ? 0 : 100;
            $final_amount = $total + $shipping;

            $order = new Order();
            $order->customer_name = $request->name;
            $order->phone = $request->phone;
            $order->address = $request->address;
            $order->user_id = $user_id;
            $order->status = 'Pending';
            $order->price = $final_amount;
            $order->save();

            foreach($cartItems as $item) {
                $orderItem = new OrderItem();
                $orderItem->order_id = $order->id;
                $orderItem->food_id = $item->food_id;
                $orderItem->quantity = $item->quantity;
                $orderItem->price = $item->food->price;
                $orderItem->save();
            }

            if ($request->payment_method == 'card') {
                $stripe = new StripeController();
                return $stripe->pay($order->id, $final_amount);
            }

            Cart::where('user_id', $user_id)->delete();

            return redirect()->route('user.home')->with('success', 'Order placed successfully! Thank you for ordering.');
            
        } catch (\Exception $e) {
            dd($e->getMessage(), $e->getTraceAsString());
        }
    }

    public function orderSuccess(Request $request) {
        if($request->has('order_id')) {
            $order = Order::find($request->order_id);
            if($order) {
                $order->status = 'Paid'; // Or Confirmed
                $order->save();
                
                $user_id = $order->user_id;
                Cart::where('user_id', $user_id)->delete();
                
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
        $order = Order::find($id);
        if($order && $order->user_id == FacadesAuth::id()) {
            $order->delete();
            return redirect()->back()->with('success', 'Order cancelled successfully.');
        }
        return redirect()->back()->with('error', 'Order not found.');
    }
    public function sendMessage(Request $request) {
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->save();

        toastr()->closeButton(true)->success('Message sent successfully.');
        return back();
    }
}
