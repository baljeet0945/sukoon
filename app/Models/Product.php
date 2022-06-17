<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable =[
        'product_name','product_title','image','price'
    ];

     public function category()
     {
         return $this->hasOne(Category::class,'category_id','id');
     }

     public function items()
     {
        return $this->hasOne(Item::class,'id','item_id');
     }
}
