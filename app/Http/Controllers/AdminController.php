<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

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

        $menuItem->save();

        return back();
    }
}

