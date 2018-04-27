<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeSanction extends Model
{
	protected $table = 'employee_sanction';

    protected $fillable = [
        'employee_id', 'employee_violation_id','status','sanction_id',
    ];

    public function Employee()
    {
    	return $this->belongsTo(Employee::class);
    }

    public function sanctionList()
    {
    	return $this->belongsTo(SanctionList::class);
    }

    public function employeeViolation()
    {
        return $this->hasOne(EmployeeViolation::class);
    }

    public function employeeLayoffs()
    {
        return $this->hasOne(EmployeeLayoffs::class);
    }
}
