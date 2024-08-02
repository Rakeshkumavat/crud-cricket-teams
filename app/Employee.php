<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\EmployeeAddress;

class Employee extends Model

{

    public function employee(){
        return $this->hasOne(EmployeeAddress::class,'employee_id','id');
    }
}
