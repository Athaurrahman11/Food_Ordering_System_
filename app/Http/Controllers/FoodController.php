<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FoodController extends Controller
{
    // Show the Menu Page
    public function index() {
        return view('user.shop');
    }

    // Handle adding items to cart (Session-based)
    public function addToCart(Request $request) {
        $cart = session()->get('cart', []);

        // Logic to add item based on ID/Name
        $cart[] = [
            "name" => $request->name,
            "price" => $request->price,
            "quantity" => 1
        ];

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Item added to cart!');

    }
}
