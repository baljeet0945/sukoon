<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdvanceType;
class AdvanceTypeController extends Controller
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
        $employee = AdvanceType::all();
        return view('pages.backend.Advancetype.create',compact('employee'))->with('no',1);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $advance = new AdvanceType;

        $advance->name  =$request->name;

        $advance->save();

        return redirect()->back()->with('message', 'Advance Type Add Successfuly!');
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
        $data = AdvanceType::findorfail($id);

        return view('pages.backend.Advancetype.edit',compact('data'));
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
        $advance =  AdvanceType::find($id);

        $advance->name  =$request->name;

        $advance->update();

        return redirect()->route('admin.advance-type.create')->with('message', 'Advance Type Updated Successfuly!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $advance = AdvanceType::findorfail($id);

        $advance->delete();
        Session()->flash('message', 'Delete Advance Type  Successfully!');
        return ['status' => 'true'];
    }
}
