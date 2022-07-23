<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeAdvance extends Model
{
    use HasFactory;

    protected $fillable = ['employee_id','type_id','advance_amount'];

    public function employee(){
        return $this->hasOne(Employee::class,'id','employee_id');
    }

    public function advancetypes(){
        return $this->hasOne(AdvanceType::class,'employeeadvance_id','id');
    }
}
