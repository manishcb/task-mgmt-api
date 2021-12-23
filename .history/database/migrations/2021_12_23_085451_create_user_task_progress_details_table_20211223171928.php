<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTaskProgressDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_task_progress_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('task_id');
            $table->date('task_start_date');
            $table->time('task_start_time');
            $table->time('task_pause_time');
            $table->time('task_stop_time');
            $table->integer('task_break_mnts');
            
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
        Schema::dropIfExists('user_task_progress_details');
    }
}
