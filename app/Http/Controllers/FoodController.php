<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $featured_foods = \App\Models\Food::take(6)->get(); // Fetch 6 items for display
        return view('home.index', compact('featured_foods'));
    }

    // Handle adding items to cart (Session-based)
    public function addToCart(Request $request) {
        $cart = session()->get('cart', []);
        $id = $request->id;

        // Check if item exists in cart
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $request->name,
                "price" => $request->price,
                "quantity" => 1
            ];
        }

        session()->put('cart', $cart);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Item added to cart!',
                'cartCount' => count($cart)
            ]);
        }

        return redirect()->back()->with('success', 'Item added to cart!');
    }
    public function viewCart() {
        return view('user.cart'); // Not moved yet
    }

    public function removeFromCart($id) {
        $cart = session()->get('cart');
        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('success', 'Item removed correctly');
    }

    public function checkout() {
        // Here you would normally save the order to the DB
        // For now, we just clear the cart
        session()->forget('cart');
        return redirect()->route('user.home')->with('success', 'Order placed successfully!');
    }
}
