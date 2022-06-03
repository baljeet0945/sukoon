<?php

namespace App\Http\Controllers\admin;

use App\Models\Dailysale;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class DailysaleController extends Controller
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
        $daily = Dailysale::all();
        return view('pages.backend.daily-sale.create',compact('daily'))->with('no',1);
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
            'date'  => 'required',
            'amount' => 'required',

        ]);

        $daily = new Dailysale();

        $daily->amount = $request->amount;
        $daily->date = $request->date;

        $daily->save();

        return redirect()->back()->with('message', 'Daily Sale Add Successfuly!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dailysale  $dailysale
     * @return \Illuminate\Http\Response
     */
    public function show(Dailysale $dailysale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dailysale  $dailysale
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Dailysale::findorfail($id);

        return view('pages.backend.daily-sale.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dailysale  $dailysale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated =  $request->validate([
            'date'  => 'required',
            'amount' => 'required',

        ]);

        $daily = Dailysale::find($id);

        $daily->amount = $request->amount;
        $daily->date = $request->date;

        $daily->update();
        return redirect()->route('admin.daily.create')->with('message', 'Daily Sale Updated Successfuly!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dailysale  $dailysale
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $daily = Dailysale::findorfail($id);

        $daily->delete();
        Session()->flash('message', 'Delete Daily Sale Successfully!');
        return ['status' => 'true'];
        
    }
}
