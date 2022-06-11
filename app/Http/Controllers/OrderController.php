<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Item;

class OrderController extends Controller
{
    public function add(Request $request)
    {
        // $validated =  $request->validate([
        //     'orderInfo name'    => 'required',
        //     'orderInfo phone' => 'required',
            

        // ]);
        
    //return $request;
        $user = new User;

        $user->name  =$request->orderInfo['name'];
        $user->phone =$request->orderInfo['phone'];

        $user->save();

        $order = new Order;

        $order->user_id =$user->id;
        $order->amount  =$request->orderInfo['totalValue'];

        $order->save();

        
        // $items = new Item;

        // $items->product_id =$request->orderItem[0]['id'];
        // $items->order_id   =$order->id;
        // $items->qty        =$request->orderItem[0]['qty'];
       
        // $items->save();
        
        
       
        foreach( $request->orderItem as $k => $p ) {
            $data = collect([
                'product_id' => $p['id'],
                'order_id' => $order->id,
                'qty' => $p['qty'],
                
            ]);
            $items[] = $data->toArray();
           
        }
        //return $items;
        Item::insert($items);

        return response()->json($items);
        
  
    }
}
