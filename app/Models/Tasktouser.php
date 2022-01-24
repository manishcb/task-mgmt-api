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
    'task_create_date',
    'task',
    'task_duration_mnts',
    'task_end_date',
    'task_priority',
    'task_remarks',
    ];
}
