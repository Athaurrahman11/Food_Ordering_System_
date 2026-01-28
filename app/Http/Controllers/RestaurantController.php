<?php

namespace App\Http\Controllers;

use App\Models\Restaurant; // This tells Laravel to use your Restaurant database model
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index() {
        $restaurants = Restaurant::paginate(8);
        return view('admin.restaurants', compact('restaurants'));
    }

    public function create() {
        return view('restaurants.create');
    }

    public function store(Request $request) {
        $restaurant = new Restaurant;
        $restaurant->name = $request->name;
        $restaurant->description = $request->description;
        $restaurant->delivery_time = $request->delivery_time;
        $restaurant->status = 'open'; // Default
        
        $image = $request->file('image');
        if($image){
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move('Restaurant_images', $image_name);
            $restaurant->image = $image_name;
        }

        $restaurant->save();
        toastr()->closeButton(true)->success('Restaurant added successfully.');
        return redirect('restaurants');
    }

    public function edit($id) {
        $restaurant = Restaurant::findOrFail($id);
        return view('restaurants.edit', compact('restaurant'));
    }

    public function update(Request $request, $id) {
        $restaurant = Restaurant::findOrFail($id);
        $restaurant->name = $request->name;
        $restaurant->description = $request->description;
        $restaurant->delivery_time = $request->delivery_time;

        $newImage = $request->file('image');
        if($newImage){
            $newImageName = time().'.'.$newImage->getClientOriginalExtension();
            $newImage->move('Restaurant_images', $newImageName);
            $restaurant->image = $newImageName;
        }

        $restaurant->save();
        toastr()->closeButton(true)->success('Restaurant updated successfully.');
        return redirect('restaurants');
    }

    public function destroy($id) {
        $restaurant = Restaurant::findOrFail($id);
        $image_path = public_path('Restaurant_images/' . $restaurant->image);
        if(file_exists($image_path)){
            unlink($image_path);
        }
        $restaurant->delete();
        toastr()->closeButton(true)->success('Restaurant deleted successfully.');
        return back();
    }
}
