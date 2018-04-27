<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ViolationList extends Model
{
	protected $table = 'violations';

    protected $fillable = [
        'violation_name', 'violation_category',
    ];

    public $timestamps = false;

    public function employeeViolation()
    {
    	return $this->hasMany(employeeViolation::class);
    }
}
