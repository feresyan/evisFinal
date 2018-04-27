<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeViolation extends Model
{
	protected $table = 'employee_violation';

    protected $fillable = [
        'employee_id', 'violation_id', 'violation_date',
    ];

    public function Employee()
    {
    	return $this->belongsTo(Employee::class);
    }

    public function violationList()
    {
    	return $this->belongsTo(ViolationList::class);
    }

    public function employeeSanction()
    {
        return $this->hasOne(EmployeeSanction::class);
    }

}
