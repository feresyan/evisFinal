<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeLayoffs extends Model
{
	protected $table = 'employee_layoffs';

    protected $fillable = [
        'employee_id', 'employee_sanction_id', 'layoffs_date','reason',
    ];

    public function Employee()
    {
    	return $this->belongsTo(Employee::class);
    }

    public function employeeSanction()
    {
        return $this->hasOne(EmployeeSanction::class);
    }
}
