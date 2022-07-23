<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Admin;
use App\Models\Dailysale;
use App\Models\Expen;
use App\Models\Order;
use Session;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    
    
    public function dashboard(Request $request)
    {
        $currentMonth=date('m');// Current month
        $maxDays=date('t');// Total number of days in month
        $currentDayOfMonth=date('j');// Current date in month        
        
        $product = Product::where('status',1)->count();
        $daily = Dailysale::where('date', 'like','%'.date('Y').'%')->sum('amount'); 
        $currentMonthIncome = Dailysale::where('date', 'like','%'.date('Y-'.$currentMonth).'%')->sum('amount');
        $expen = Expen::where('created_at', 'like', '%' .date('Y').'%')->sum('price'); 
        $currentMonthExpens = Expen::where('created_at', 'like', '%' .date('Y-'.$currentMonth).'%')->sum('price');       
        $object=$daily-$expen; 
        $getMonthIncome = array();
        $getMonthExpense = array();        
        for ($x = 1; $x <= $currentMonth; $x++) {
            if($x<10){                
                $getMonthIncome[] = Dailysale::whereMonth('created_at', '0'.$x)
                            ->whereYear('created_at', date('Y'))
                            ->sum('amount');
                $getMonthExpense[] = Expen::whereMonth('created_at', '0'.$x)
                            ->whereYear('created_at', date('Y'))
                            ->sum('price');
            } else {
                $getMonthIncome[] = Dailysale::whereMonth('created_at', $x)
                            ->whereYear('created_at', date('Y'))
                            ->sum('amount');
                $getMonthExpense[] = Expen::whereMonth('created_at', $x)
                            ->whereYear('created_at', date('Y'))
                            ->sum('price');
            }                     
        }        

        $weeks = array(); 
        $Totalweeks = 1;       
        for ($wk=0; $wk<$maxDays; $wk++) {
            if(($wk % 7) == 1){                
                $weeks[] = $Totalweeks++;
            }            
        }
       
        $numberOfDays = array(); 
        $daysIncome = array(); 
        $daysExpen = array();    
            for ($days = 1; $days <= $currentDayOfMonth; $days++) {
                if($days<10){
                    $numberOfDays[] = '0'.$days;
                    $daysIncome[] = Dailysale::where('date', 'like', '%' . date('Y-'.$currentMonth.'-0'.$days) . '%')->sum('amount');
                    $daysExpen[] = Expen::where('created_at', 'like', '%' . date('Y-'.$currentMonth.'-0'.$days) . '%')->sum('price');               
                }else {
                    $numberOfDays[] = $days; 
                    $daysIncome[]= Dailysale::where('date', 'like', '%' . date('Y-'.$currentMonth.'-'.$days) . '%')->sum('amount');
                    $daysExpen[] = Expen::where('created_at', 'like', '%' . date('Y-'.$currentMonth.'-'.$days) . '%')->sum('price');                                        
                }
            }        
        
        $monthlyTotalIncome = implode(',', $getMonthIncome);
        $getMonthExpense = implode(',', $getMonthExpense); 
        $currentNumberOfDays = implode(',', $numberOfDays);
        $EverydayIncome = implode(',', $daysIncome);
        $EverydaydaysExpen = implode(',', $daysExpen);
        $TotalsWeeksMonth = implode(',', $weeks);       
        
        return view('pages.backend.dashboard',
                compact('product',
                'daily',
                'currentMonthIncome',
                'expen',
                'currentMonthExpens',
                'object',
                'monthlyTotalIncome',
                'getMonthExpense',
                'currentNumberOfDays',
                'EverydayIncome',
                'EverydaydaysExpen',
                'TotalsWeeksMonth'
            ));
    }

    public function filterBy(Request $request)
    {
        $month = date('m');
        $year = date('Y');        
        if($request->filterBy=='month'):            
            $monthlDailySaleTotal = Dailysale::whereYear('created_at', $year)->sum('amount');
            $expenMonthly = Expen::whereYear('created_at', $year)->sum('price');
            return response()->json([
                            'success'=>$monthlDailySaleTotal , 
                            'expenMonthly'=>$expenMonthly ,
                            'monthlyData'=>'monthly'
                        ]);    
        elseif($request->filterBy=='week'):
            $DailySaleTotal= Dailysale::where('date', 'like', '%' . date('Y-'.$month) . '%')->sum('amount');
            $expenWeek = Expen::where('created_at', 'like', '%' . date('Y-'.$month) . '%')->sum('price');
            return response()->json([
                            'success'=>$DailySaleTotal,
                            'expenWeek'=>$expenWeek,
                            'weeklyData'=>'weekly'
                        ]);
        elseif($request->filterBy=='daily'):            
            $DailySaleTotal= Dailysale::where('date', 'like', '%' . date('Y-'.$month) . '%')->sum('amount');
            $expenDailyTotal = Expen::where('created_at', 'like', '%' . date('Y-'.$month) . '%')->sum('price'); 
                       
            return response()->json([
                                    'success'=>$DailySaleTotal,
                                    'expenDailyTotal'=>$expenDailyTotal, 
                                    'dailyData'=>'daily'
                                ]);
        endif; 
    }

    public function signin()
    {
        //return 'helloo';
        return view('pages.backend.login');
    }

    public function adminLogin(Request $request)
    {
        $validated =  $request->validate([
            'email'    => 'required',
            'password' => 'required',
            

        ]);

        $admin=Admin::where(['email'=>$request->email,'password'=>sha1($request->password)])
        ->count();
        if($admin>0){
            $adminData=Admin::where(['email'=>$request->email,'password'=>sha1($request->passwrod)])
            ->get();
            session(['adminData'=>$adminData]);
            return redirect('admin/dashboard');
        }else {
        // Authentication failed...
        return redirect()->back()->with('message', 'Invalid Username or Password');
        }
    }

    public function changeStatus(Request $request)
    {
        $product = Product::find($request->product_id);
        $product->status = $request->status;
        $product->save();
  
        return response()->json(['success'=>'Status change successfully.']);
    }

    public function changeCategorystatus(Request $request)
    {
        $category = Category::find($request->category_id);
        $category->status = $request->status;
        $category->save();
  
        return response()->json(['success'=>'Status change successfully.']);
    }

    public function changeEcatestatus(Request $request)
    {
        $excate = Excate::find($request->excate_id);
        $excate->status = $request->status;
        $excate->save();

        return response()->json(['success'=>'Status change successfully.']);

    }

    public function retriveNetProfite($show)
    {
        //return $show;
        $posts = Order::orderBy('created_at')->get()->groupBy(function($item) {
            return $item;
       });

      

    }

    public function logout()
    {
        session()->forget(['adminData']);

        return redirect('/admin');
    }
}
