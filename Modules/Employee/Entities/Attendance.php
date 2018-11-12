<?php

namespace Modules\Employee\Entities;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
    	'employee_id', 'entry_time', 'exit_time', 'comments', 'office_ip'
    ];
}
