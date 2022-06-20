<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['advance_id','advance_amount','name','department','amount'];


    public function employeeAdvance()
    {
        return $this->hasOne(EmployeeAdvance::class,'id','employeeadvance_id');
    }
}
