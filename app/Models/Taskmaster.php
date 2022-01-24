<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taskmaster extends Model
{
    use HasFactory;
    public $timestamps = false; 
    protected $fillable = [
    'task_admin_name',
    'task_start_date',
    'task',
    //'task_create_date',
    //'task_start_time',
    'task_duration_mnts',
    'task_end_date',
    //'task_end_time',
    'task_priority',
    'task_remarks',
    'work_location',
    'lati',
    'longi',
    ];
}
