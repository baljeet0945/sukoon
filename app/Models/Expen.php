<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expen extends Model
{
    use HasFactory;

    protected $fillable =[
                'excate_id','name','price'
    ];

    public function excate(){
        return $this->hasOne(Excate::class,'id','excate_id');
    }
}
