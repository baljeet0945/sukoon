<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;    

    protected $fillable =[
            'product_id','title','image','description','sub_cateory'
    ];

    public function product()
    {
        return $this->hasOne(Product::class,'category_id','id');
    }
}
