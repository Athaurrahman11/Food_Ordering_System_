<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;


use function PHPUnit\Framework\fileExists;

class AdminController extends Controller
{
    public function  index()  {
        return view('admin.dashboard');
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
            $request->image->move('Menu_items',$image_name);
            $menuItem->image=$image_name;
        }
        toastr()->closeButton(true)->timeOut(1000)->success('Menu Item added successfully.');
        $menuItem->save();

        return redirect('menu');
    }

    public function delete_menu(Request $request,$id){
        $menu_item=Menu::find($id);
        $image_path=public_path('Menu_items/'. $menu_item->image) ;

        if(fileExists($image_path)){
            unlink($image_path);
        }
        $menu_item->delete();
        toastr()->closeButton(true)->success('Your account has been created!');
        return back();



    }

    public function edit_menu(Request $request,$id){
        $menu_item=Menu::find($id);

        $oldImageName=public_path('Menu_items/'.$menu_item->image);

        

        return view('admin.edit_menu',compact('menu_item'));

    }

    public function update_item(Request $request,$id){
         $menu_item=new Menu;
        $category=$request->category;
        $description=$request->description;

        $newImage=$request->file('image');
       if($newImage){
         $newImageName=time().'.'. $newImage->getClientOriginalExtension();
         $request->image->move('Menu_items/'.$newImageName);
       }
       return redirect('menu');
    }

    public function orders(){
        return view('admin.orders');
    }

    public function food(){
        return view('admin.foodManagement');
    }
     public function add_food(){
        $items=Menu::all();

        return view('admin.food',compact('items'));
    }
}

