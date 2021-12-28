<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taskmaster extends Model
{
    use HasFactory;
    public $timestamps = false; 

    $table->string('task_admin_name');
            $table->longText('task');
            $table->date('task_create_date');
            $table->date('task_start_date');
            $table->time('task_start_time');
            $table->date('task_end_date');
            $table->time('task_end_time');
            $table->integer('task_duration_mnts');
            $table->string('task_priority');
            $table->longText('task_remarks');
            $table->timestamps();
}
