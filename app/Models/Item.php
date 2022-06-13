<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable =[
        'order_id','product_id','qty','status'
    ];

    public function orders()
    {
        return $this->hasOne(Order::class,'id','order_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class,'id','product_id');
    }
}
