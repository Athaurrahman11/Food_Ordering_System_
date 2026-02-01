<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Food;
use App\Models\Menu;
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
        if(!\Illuminate\Support\Facades\Auth::check()) {
            return redirect()->route('login');
        }

        $user_id = \Illuminate\Support\Facades\Auth::id();
        $cartItems = \App\Models\Cart::where('user_id', $user_id)->with('food')->get();

        if($cartItems->count() == 0) {
            return redirect()->route('shop');
        }
        return view('home.checkout', compact('cartItems'));
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

        // Here you would normally save the order to the DB
        // For example: Order::create([...]);

        // Clear the cart from DB
        $user_id = \Illuminate\Support\Facades\Auth::id();
        \App\Models\Cart::where('user_id', $user_id)->delete();

        return redirect()->route('user.home')->with('success', 'Order placed successfully! Thank you for ordering.');
    }
}
