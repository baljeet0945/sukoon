<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;

class OrderController extends Controller
{
    public function add(Request $request)
    {

        // $validated = $request->validate([
        //     'name'         => 'required',
        //     'phone'         => 'required',
            

        // ]);
        //return $request;
        $order = new Order;
        //return $request;
        $order->user_id  = auth()->user()->id ?? null;
        $order->amount   = $request->amount;
        
        
        $order->save();
  
    }
}
