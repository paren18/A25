<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HoursModel extends Model
{
    protected $table = 'hours';

    public $timestamps = false;
    protected $fillable = [
        'employee_id',
        'hours',
    ];
}
