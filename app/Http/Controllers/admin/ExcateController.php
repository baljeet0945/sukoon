<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Excate;
use App\Models\Expen;
class ExcateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Excate::all();
        return view('pages.backend.expencategory.create',compact('data'))->with('no',1);
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
            'name'  => 'required',

        ]);

        $excate = new Excate;

        $excate->name     = $request->name;
        //$excate->expen_id = $request->expen;

        $excate->save();

        return redirect()->back()->with('message', 'Expensive Categoey Create Successfuly!');
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
        $excate= Excate::findorfail($id);
        return view('pages.backend.expencategory.edit',compact('excate'));
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
        $validated =  $request->validate([
            'name'  => 'required',

        ]);

        $excate = Excate::find($id);

        $excate->name = $request->name;
        //$excate->expen_id =$request->expen_id;

        $excate->update();

        return redirect()->route('admin.excates.create')->with('message', 'Expensive Categoey Updated Successfuly!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $excate =Excate::findorfail($id);

        $excate->delete();
        return redirect()->route('admin.excates.create')->with('message', 'Expensive category Deleted Successfuly!');
    }
}
