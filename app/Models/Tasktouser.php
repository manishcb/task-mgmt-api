<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasktouser extends Model
{
    use HasFactory;
    public $timestamps = false; 
    protected $fillable = [
    'name',
    'task_admin_name',
    'task_id',
    'task',
    'task_start_date',
    'task_start_time',
    'task_end_date',
    'task_end_time',
    'task_duration_mnts',
    'task_priority',
    'task_remarks',
    ];
}
