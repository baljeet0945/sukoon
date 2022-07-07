<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentSetting;
class PaymentSettingController extends Controller
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
        $data =PaymentSetting::all();

        return view('pages.backend.payment-setting.create',compact('data'))->with('no',1);
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
            'date'     => 'required',
            'date_end' => 'required',            

        ]);

        $payments = new PaymentSetting();

        $payments->date  =$request->date;
        $payments->date_end  =$request->date_end;

        $payments->save();

        return redirect()->back()->with('message','Date Stored Successfylly!');
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
        $advance = PaymentSetting::findorfail($id);
        return view('pages.backend.payment-setting.edit',compact('advance'));
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
            'date'     => 'required',
            'date_end' => 'required',            

        ]);

        $value = PaymentSetting::find($id);

        $value->date  =$request->date;
        $value->date_end  =$request->date_end;

        $value->update();

        return redirect()->route('admin.payment-setting.create')->with('message','Date Updated Successfylly!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $advance = PaymentSetting::findorfail($id);
        
        $advance->delete();
        Session()->flash('message', 'Deleted Advance Date Successfully!');
        return ['status' => 'true'];
    }
}
