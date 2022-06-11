<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Excate extends Model
{
    use HasFactory;
    protected $fillable =[
                'expen_id','name'
    ];

    public function expen(){
        return $this->hasOne(Expen::class,'id','expen_id');
    }
}
