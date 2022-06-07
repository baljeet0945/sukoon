<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function add(Request $request)
    {

        // $validated = $request->validate([
        //     'title'         => 'required',
        //     'image'         => 'required',
        //     'description'   => 'required',
        //     'sub_category'  => 'required',

        // ]);

        //$order = new Order();
        return $request;

        // $categories->title        = $request->title;
        // $categories->description  = $request->description;
        // $categories->sub_category = $request->sub_category;
        
        
        // if($request->hasfile('image'))
        // {
        //     $file= $request->file('image');
        //     $extension=$file->getClientOriginalExtension();
        //     $filename=time().'.'.$extension;
        //     $file->move('uploads/category/',$filename);
        //     $categories->image=$filename;
        // }
        
        // $categories->save();


        // return redirect()
        //                 ->route('admin.category.create')
        //                 ->with('message','Category Created Successfuly!');

    }
}
