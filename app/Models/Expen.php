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

    public function Excate(){
        return $this->hasOne(Excate::class,'id','expen_id');
    }
}
