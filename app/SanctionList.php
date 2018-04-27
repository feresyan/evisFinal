<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanctionList extends Model
{
	protected $table = 'sanctions';

    protected $fillable = [
        'sanction_name', 'sanction_level',
    ];

    public $timestamps = false;

    public function employeeViolation()
    {
    	return $this->hasMany(EmployeeSanction::class);
    }
}
