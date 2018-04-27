<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{	
	protected $table = 'employees';

	protected $guarded = [
        'id',
    ];
    
    public function employeeViolation()
    {
    	return $this->hasMany(EmployeeViolation::class);
    }

    public function department()
    {
    	return $this->belongsTo(Department::class);
    }

    public function employeeSanction()
    {
        return $this->hasMany(EmployeeSanction::class);
    }

    public function employeeLayoffs()
    {
        return $this->hasMany(EmployeeLayooffs::class);
    }
}
