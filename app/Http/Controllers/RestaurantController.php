<?php

namespace App\Http\Controllers;

use App\Models\Restaurant; // This tells Laravel to use your Restaurant database model
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index() {
        $restaurants = []; // Sending an empty array to stop the SQL error
        return view('restaurants.index', compact('restaurants'));
    }
}
