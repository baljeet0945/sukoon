<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expen;
use App\Models\Excate;
use App\Models\Category;
use Session;
class ExpensiveController extends Controller
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
        $excate = Expen::all();      
        
        return view('pages.backend.expensive.create',compact('excate'))->with('no',1);

        
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
            //'category'  => 'required',
            'price' => 'required',

        ]);

        $data =new Expen();        
        $data->price =$request->price;
        $data->excate_id = $request->category;

        $data->save();

        return redirect()->back()->with('message', 'Expensive Create Successfuly!');
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
        $expen = Expen::findorfail($id);

        $excate = Excate::all();

        return view ('pages.backend.expensive.edit',compact('expen','excate'));
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
            //'category'  => 'required',
            'price' => 'required',

        ]);

        $data = Expen::find($id);
        //$excate =Excate::find($id);

        //$data->category =$request->category;
        $data->price =$request->price;
        $data->excate_id = $request->category;

        $data->update();

        return redirect()->route('admin.expens.create')->with('message', 'Expensive Updated Successfuly!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expen = Expen::findorfail($id);
        $excate = Excate::findorfail($expen->excate_id);
        $expen->delete();
        $excate->delete();
        Session()->flash('message', 'Delete Expensive Successfully!');
        return ['status' => 'true'];
        
    }
}
