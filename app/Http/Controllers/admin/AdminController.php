<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Admin;
use App\Models\Dailysale;
use App\Models\Expen;
use App\Models\Excate;
use App\Models\Order;
use App\Models\Item;
use Session;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    
    
    public function dashboard(Request $request)
    {
        
        $product = Product::where('status',1)->count();
        $daily = Dailysale::all()->sum('amount');
         
        $expen = Expen::all()->sum('price');
        
        $object=$daily-$expen;
       
        
        return view('pages.backend.dashboard',compact('product','daily','expen','object'));
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

    public function changeExcatestatus(Request $request)
    {
        $excate = Excate::find($request->excate_id);
        $excate->status = $request->status;
        $excate->save();

        return response()->json(['success'=>'Status change successfully.']);

    }

    public function retriveNetProfite(Request $request)
    {
        $expen = Expen::select(
            DB::raw("year(created_at) as monht"),
            DB::raw("SUM(click) as total_click"),
            DB::raw("SUM(viewer) as total_viewer")) 
            ->orderBy(DB::raw("YEAR(created_at)"))
            ->groupBy(DB::raw("YEAR(created_at)"))
            ->get();

            $result[] = ['Month','price','date'];
            foreach ($expen as $key => $value) {
            $result[++$key] = [$value->month, (int)$value->created_at, (int)$value->date];
            }

            return view('pages.backend.dashboard')
                ->with('expen',json_encode($result));
    
        //return view('dashboard', compact('data'));

    }

    public function changeOrderstatus(Request $request)
    {
        $order = Order::find($request->order_id);
        $order->status = $request->status;
        $order->save();

        return response()->json(['success'=>'Status change successfully.']);
    }

    public function logout()
    {
        session()->forget(['adminData']);

        return redirect('/admin');
    }

    public function OrderDetail()
    {
        $items = Item::all();
        return view('pages.backend.orders.order-details',compact('items'));
    }
    
}
