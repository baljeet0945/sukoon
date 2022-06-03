<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Admin;
use App\Models\Dailysale;
use App\Models\Expen;
use Session;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    
    
    public function dashboard()
    {
        //$count = Product::where('status','=','1')->count();
        $product = Product::where('status',1)->count();
        $daily = Dailysale::all()->sum('amount');
        $expen = Expen::all()->sum('price');
        return view('pages.backend.dashboard',compact('product','daily','expen'));
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

    public function changeCategory(Request $request)
    {
        $category = Category::find($request->category_id);
        $category->status = $request->status;
        $category->save();
  
        return response()->json(['success'=>'Status change successfully.']);
    }

    public function logout()
    {
        session()->forget(['adminData']);

        return redirect('/admin');
    }
}
