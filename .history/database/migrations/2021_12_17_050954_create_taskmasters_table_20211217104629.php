<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskmastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taskmasters', function (Blueprint $table) {
            $table->id();
            $table->string('task_admin_name');
            $table->longText('main_task');
            $table->date('task_create_date');
            $table->date('task_start_date');
            $table->time('task_start_time');
            $table->date('task_end_date');
            $table->time('task_end_time');
            $table->integer('task_duration_mnts');
            $table->longText('assign_task_remarks');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taskmasters');
    }
}
