<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Menu;
use App\Models\Food;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;




class AdminController extends Controller
{
    public function  index()  {
        $orders = Order::latest()->take(5)->get();
        $total_revenue = Order::sum('price');
        $total_orders = Order::count();
        $total_food_items = Food::count();
        $total_menu_items = Menu::count();

        $top_categories = Food::selectRaw('category, count(*) as count')
            ->groupBy('category')
            ->orderByDesc('count')
            ->take(3)
            ->get();
        
        $total_food = $total_food_items > 0 ? $total_food_items : 1;
        foreach($top_categories as $cat) {
            $cat->percentage = round(($cat->count / $total_food) * 100);
        }

        return view('admin.dashboard', compact('orders', 'total_revenue', 'total_orders', 'total_food_items', 'total_menu_items', 'top_categories'));
    }

    public function menu()  {
        $menuitems=Menu::all();

        return view('admin.menu',compact('menuitems'));
    }
    public function menu_add(Request $request){
        return view('admin.menu_item');
    }

      public function menu_store(Request $request){
        $request->validate([
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

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
        $request->validate([
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

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
        $customers = User::where('user_role', '!=', 'admin')->paginate(10);
        $total_customers = User::where('user_role', '!=', 'admin')->count();
        $new_customers_this_month = User::where('user_role', '!=', 'admin')->where('created_at', '>=', now()->subMonth())->count();

        return view('admin.customers', compact('customers', 'total_customers', 'new_customers_this_month'));
    }

    public function delete_customer($id) {
        $user =User::findOrFail($id);
        
        if($user->user_role === 'admin') {
             toastr()->closeButton(true)->error('Cannot delete an Administrator.');
             return back();
        }

        $user->delete();
        toastr()->closeButton(true)->success('Customer deleted successfully.');
        return back();
    }

    public function messages() {
        $messages = Contact::latest()->paginate(10);
        return view('admin.messages', compact('messages'));
    }

    public function delete_message($id) {
        $message = Contact::find($id);
        if($message) {
            $message->delete();
            toastr()->closeButton(true)->success('Message deleted successfully.');
        }
        return back();
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
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'menu_id' => 'required|exists:menus,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $food = new Food;
        $food->name = $request->input('name'); 
        
        $menuId = $request->input('menu_id');
        $food->menu_id = $menuId;
        
        $menu = Menu::find($menuId);
        if ($menu) {
            $food->category = $menu->category;
        } else {
             $food->category = 'Uncategorized'; 
        }
        $food->price = $request->input('price');
        $food->stock = $request->input('stock');
        
        $image = $request->file('image');
        if($image){
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move('Food_items', $image_name); 
            $food->image = $image_name;
        }

        $food->save();
        toastr()->closeButton(true)->success('Food Item added successfully.');
        return redirect('food');
    }

    public function edit_food($id)
    {
        $food = Food::findOrFail($id);
        $items = Menu::all(); 
        return view('admin.edit_food', compact('food', 'items'));
    }

    public function update_food(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'menu_id' => 'required|exists:menus,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $food = Food::findOrFail($id);
        $food->name = $request->input('name');
        
        $menuId = $request->input('menu_id');
        $food->menu_id = $menuId;
        
        $menu = Menu::find($menuId);
        if ($menu) {
            $food->category = $menu->category;
        } else {
             $food->category = 'Uncategorized'; 
        }
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
