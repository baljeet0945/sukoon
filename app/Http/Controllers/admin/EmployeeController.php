<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\EmployeeAdvance;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // $data       = Employee::where('id',1)->first(); 
        $where = array('id' => 'id');
        $data  = Employee::where($where)->first();   
        $employees  = Employee::all();  
        $advance    = EmployeeAdvance::all();
        return view('pages.backend.employees.index',compact('employees','advance','data'))->with('no',1);
    }

    public function advance($id)
    { 
         
       
        return view('pages.backend.employees.advance',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.backend.employees.create');
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
            'name'       => 'required',
            'department' => 'required',
            'amount'     => 'required',

        ]);

        $employee = new Employee;

        $employee->name        =$request->name;
        $employee->department  =$request->department;
        $employee->amount      =$request->amount;

        $employee->save();

        return redirect()->route('admin.employees.index')->with('message', 'Employee Add Successfuly!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $employees  = Employee::find($id);

        return response()->json($employees);
        // $employee = Employee::where('id',$id)->first();
        // return view('pages.backend.employees.show',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Employee::findorfail($id);
        return view('pages.backend.employees.edit',compact('data'));
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
            'name'       => 'required',
            'department' => 'required',
            'amount'     => 'required',

        ]);

        $employee = Employee::find($id);

        $employee->name        =$request->name;
        $employee->department  =$request->department;
        $employee->amount      =$request->amount;

        $employee->update();

        return redirect()->route('admin.employees.index')->with('message', 'Employee Updated Successfuly!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::findorfail($id);

        $employee->delete();
        Session()->flash('message', 'Delete Employee Successfully!');
        return ['status' => 'true'];
    }
}
