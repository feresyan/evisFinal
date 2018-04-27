<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
	protected $table = 'counters';

    protected $fillable = [
        'employee_id', 'ringan','sedang','berat',
    ];

    public $timestamps = false;

}
