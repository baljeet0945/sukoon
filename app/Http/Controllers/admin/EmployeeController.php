<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\AdvanceType;
use App\Models\EmployeeAdvance;
use App\Models\PaymentSetting;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use DB;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        
        //   $employees       =Employee::all();
        $paymentSettings = PaymentSetting::all()->toArray();       
       
        $from = $paymentSettings[0]['date'];
        $to   = $paymentSettings[0]['date_end'];

        $totalAdvance =  DB::select('select  employee_advances.employee_id, sum(employee_advances.advance_amount) as total_advance from `advance_types` inner join `employee_advances` on `employee_advances`.`type_id` = `advance_types`.`id` where `employee_id` = "'.'employee_id'.'" and `employee_advances`.`created_at` between "'.$from.'" and "'.$to.'"');
        //return $totalAdvance;
        $employees  = Employee::select(\DB::raw('employees.*, SUM(advance_amount ) as total_advance '))
                                ->leftJoin('employee_advances', 'employee_advances.employee_id', '=', 'employees.id')
                                ->groupBy("employees.name")
                                //->whereBetween('employee_advances.created_at',array($from, $to)) 
                                ->get();       
       
       //return $employees;

        $advance    = AdvanceType::all();
        
        
        return view('pages.backend.employees.index',compact('employees','advance','totalAdvance'))->with('no',1);
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
        //return $request;
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
        //return $id;
        $employees  = Employee::find($id);           
        
        // $data = EmployeeAdvance::where('employee_id',$id)->sum('advance_amount');
        
        $paymentSettings = PaymentSetting::all()->toArray(); 
       
        $startDate = $paymentSettings[0]['date'];
        $endDate = $paymentSettings[0]['date_end'];
          //DB::enableQueryLog();
        
        // get data for table 
        $totalAdvance =  DB::select('select  employee_advances.employee_id, sum(employee_advances.advance_amount) as total_advance from `advance_types` inner join `employee_advances` on `employee_advances`.`type_id` = `advance_types`.`id` where `employee_id` = "'.$id.'" and `employee_advances`.`created_at` between "'.$startDate.'" and "'.$endDate.'"');
        //return response()->JSON($totalAdvance);
        
          $advances = AdvanceType::join('employee_advances', function ($join) {
                                    $join->on('employee_advances.type_id', '=', 'advance_types.id');   
                                    })->where('employee_id', $id)->whereBetween('employee_advances.created_at',array($startDate, $endDate))->get();
 // return $advances;
                                    
       
        //$query = DB::getQueryLog();
//$query = end($query);
//dd($query);
           //return $advances; 
        //    $date = date('Y-m-d');
        //    $object =PaymentSetting:: date('Y-m-d', strtotime($date. ' + 1 months'));
           //return $newdate;

        $payment = PaymentSetting::select('*')
                                    ->whereMonth('date', Carbon::now()->month) 
                                    ->first('id',$id);  
            
                                    // for ($i = 1; $i <= 12; $i++) {
                                    //     $months[] = date("Y-m-05", strtotime( date( 'Y-m-05' )." $i months"));
                                    // }
        $result = CarbonPeriod::create('2022-01-05', '1 month', '2022-12-05');

            // foreach ($result as $dt) {
            //     echo $dt->format("Y-m-05");
            // }
             //return $result;
        
        
    
        return view('pages.backend.employees.show',compact('totalAdvance', 'employees','advances','result','payment'));
    
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
