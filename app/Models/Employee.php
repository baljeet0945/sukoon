<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['name','department','amount'];


    public function employeeadvances(){
        return $this->hasOne(EmployeeAdvance::class,'employee_id','id');
    }

    public function advanctypes(){
        return $this->belongsTo(AdvanceType::class);
    }
}
