<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usertask extends Model
{
    use HasFactory;
    public $timestamps = false; 

    protected $fillable = [
        
        'assign_admin_name',
        'assign_username',
        'assign_task_register_date',
        'assign_task_start_date_time',
        'assign_usertask',
        'assign_usertask_duration_mnts',
        'assign_task_end_date_time',
        'assign_task_remarks',
        
    ];



}
