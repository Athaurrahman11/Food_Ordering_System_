<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Food;
use App\Models\Order;
use Illuminate\Http\Request;




class AdminController extends Controller
{
    public function  index()  {
        $orders = Order::latest()->take(5)->get();
        return view('admin.dashboard', compact('orders'));
    }

    public function menu()  {
        $menuitems=Menu::all();

        return view('admin.menu',compact('menuitems'));
    }
    public function menu_add(Request $request){
        return view('admin.menu_item');
    }

      public function menu_store(Request $request){
        $menuItem=new Menu;
        $menuItem->category=$request->input('category');
        $menuItem->description=$request->input('description');
        $image=$request->file('image');
        
        if($image){
            $image_name=time().'.'. $image->getClientOriginalExtension();
            $image->move('Menu_items',$image_name);
            $menuItem->image=$image_name;
        }
        toastr()->closeButton(true)->timeOut(1000)->success('Menu Item added successfully.');
        $menuItem->save();

        return redirect('menu');
    }

    public function delete_menu(Request $request,$id){
        $menu_item=Menu::findOrFail($id);
        $image_path=public_path('Menu_items/'. $menu_item->image) ;

        if(file_exists($image_path)){
            unlink($image_path);
        }
        $menu_item->delete();
        toastr()->closeButton(true)->success('Menu Item deleted successfully.');
        return back();



    }

    public function edit_menu(Request $request,$id){
        $menu_item=Menu::findOrFail($id);

        $oldImageName=public_path('Menu_items/'.$menu_item->image);

        

        return view('admin.edit_menu',compact('menu_item'));

    }

    public function update_menu(Request $request,$id){
        $menu_item=Menu::findOrFail($id);
        $menu_item->category=$request->category;
        $menu_item->description=$request->description;

        $newImage=$request->file('image');
        if($newImage){
            $newImageName=time().'.'. $newImage->getClientOriginalExtension();
            $newImage->move('Menu_items',$newImageName);
            $menu_item->image=$newImageName;
        }
        $menu_item->save();
        toastr()->closeButton(true)->success('Menu Item updated successfully.');
        return redirect('menu');
    }

    public function orders() {
        $orders = Order::latest()->paginate(10);
        $total_orders = Order::count();
        $pending_orders = Order::where('status', 'Pending')->count();
        $in_progress_orders = Order::where('status', 'Preparing')->count();
        return view('admin.orders', compact('orders', 'total_orders', 'pending_orders', 'in_progress_orders'));
    }

    public function update_order_status($id, $status) {
        $order = Order::findOrFail($id);
        $order->status = $status;
        $order->save();
        toastr()->closeButton(true)->success('Order status updated to ' . $status);
        return back();
    }

    public function customers() {
        return view('admin.customers');
    }

    public function food(Request $request) {
        $search = $request->input('search');
        $category = $request->input('category');

        $query = Food::query();

        if($search){
             $query->where(function($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('category', 'LIKE', "%{$search}%")
                  ->orWhere('price', 'LIKE', "%{$search}%");
             });
        }

        if($category && $category != 'All') {
            $query->where('category', $category);
        }

        $food_items = $query->paginate(8);
        $categories = Menu::select('category')->distinct()->get();
       
        return view('admin.foodManagement', compact('food_items', 'categories'));
    }

    public function add_food() {
        $items = Menu::all();
        return view('admin.food', compact('items'));
    }

    public function store_food(Request $request)
    {
        $food = new Food;
        $food->name = $request->input('name'); // Assuming input name is 'name'
        $food->category = $request->input('category');
        $food->price = $request->input('price');
        $food->stock = $request->input('stock');
        
        $image = $request->file('image');
        if($image){
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move('Food_items', $image_name); // Different folder for food? or same? Let's use Food_items
            $food->image = $image_name;
        }

        $food->save();
        toastr()->closeButton(true)->success('Food Item added successfully.');
        return redirect('food');
    }

    public function edit_food($id)
    {
        $food = Food::findOrFail($id);
        $items = Menu::all(); // Need categories for the dropdown
        return view('admin.edit_food', compact('food', 'items'));
    }

    public function update_food(Request $request, $id)
    {
        $food = Food::findOrFail($id);
        $food->name = $request->input('name');
        $food->category = $request->input('category');
        $food->price = $request->input('price');
        $food->stock = $request->input('stock');

        $newImage = $request->file('image');
        if($newImage){
            $newImageName = time().'.'.$newImage->getClientOriginalExtension();
            $newImage->move('Food_items', $newImageName);
            $food->image = $newImageName;
        }
        
        $food->save();
        toastr()->closeButton(true)->success('Food Item updated successfully.');
        return redirect('food');
    }

    public function delete_food($id)
    {
        $food = Food::findOrFail($id);
        $image_path = public_path('Food_items/' . $food->image);
        if(file_exists($image_path)){
            unlink($image_path);
        }
        $food->delete();
        toastr()->closeButton(true)->success('Food Item deleted successfully.');
        return back();
    }

}
