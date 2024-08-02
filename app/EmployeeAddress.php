<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Employee;
class EmployeeAddress extends Model
{
    public function employee_address(){
        return $this->belongsTo(Employee::class);
     }
}
