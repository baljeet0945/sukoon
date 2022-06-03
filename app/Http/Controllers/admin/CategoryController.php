<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use DB;
use Session;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        return view('pages.backend.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cata = Category::all();
        return view('pages.backend.category.create',compact('cata'))->with('no',1);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'title'         => 'required',
            'image'         => 'required',
            'description'   => 'required',
            'sub_category'  => 'required',

        ]);

        $categories = new Category();

        $categories->title        = $request->title;
        $categories->description  = $request->description;
        $categories->sub_category = $request->sub_category;
        
        
        if($request->hasfile('image'))
        {
            $file= $request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('uploads/category/',$filename);
            $categories->image=$filename;
        }
        
        $categories->save();


        return redirect()
                        ->route('admin.category.create')
                        ->with('message','Category Created Successfuly!');

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
        $data = Category::find($id);
        return view('pages.backend.category.edit',compact('data'));
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
            'title'         => 'required',
            'image'         => 'required',
            'description'   => 'required',
            'sub_category'  => 'required',

        ]);

        $categories = Category::find($id);

        $categories->title        = $request->title;
        $categories->description  = $request->description;
        $categories->sub_category = $request->sub_category;

        if($request->hasfile('image'))
        {
            $file= $request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('uploads/category/',$filename);
            $categories->image=$filename;
        }
        $categories->save();

        return redirect()
                        ->route('admin.category.create')
                        ->with('message','Category Updated Successfuly!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $category = Category::findorfail($id);

            $category->delete();

            Session()->flash('message', 'Delete Menu Category Successfully!');
             return ['status' => 'true'];
    }
}
