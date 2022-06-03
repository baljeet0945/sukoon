<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Session;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        return view('pages.backend.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $category =Category::all();
        return view('pages.backend.product.create',compact('products','category'))->with('no',1);
    }
    
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated =  $request->validate([
            'product_name' => 'required',
            'image'        => 'required',
            'price'        => 'required',

        ]);

        $products = new Product;
        $products->product_name =$request->product_name;
        $products-> price = $request->price;
        $products-> category_id = $request->category;
        

        if($request->hasfile('image'))
       {
           $file= $request->file('image');
           $extension=$file->getClientOriginalExtension();
           $filename=time().'.'.$extension;
           $file->move('uploads/products/',$filename);
           $products->image=$filename;
       }
        $products->save();

        return redirect()
                        ->route('admin.product.create')
                        ->with('message','New Product Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findorfail($id);
        $category = Category::all();
        return view ('pages.backend.product.edit',compact('product','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'product_name' => 'required',
            'image'        => 'required',
            'price'        => 'required',

        ]);

        $products = Product::find($id);

        $products->product_name =$request->product_name;
        $products-> price = $request->price;
        $products-> category_id = $request->category;

        if($request->hasfile('image'))
       {
           $file= $request->file('image');
           $extension=$file->getClientOriginalExtension();
           $filename=time().'.'.$extension;
           $file->move('uploads/products/',$filename);
           $products->image=$filename;
       }
        $products->update();

       return redirect()
                        ->route('admin.product.create')
                        ->with('message','Product Updated Successfuly!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findorfail($id);
        $category = Category::findorfail($product->category_id);
        $product->delete();
        $category->delete();
                
        Session()->flash('message', 'Delete Menu Successfully!');
        return ['status' => 'true'];
    }

   
}
