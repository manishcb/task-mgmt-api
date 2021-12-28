<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasktousersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasktousers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('task_admin_name');
            $table->integer('task_id');
            $table->longText('task');
            $table->date('task_start_date');
            $table->time('task_start_time');
            $table->date('task_end_date');
            $table->time('task_end_time');
            $table->integer('task_duration_mnts');
            $table->string('task_priority');
            $table->longText('task_remarks');
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
        Schema::dropIfExists('tasktousers');
    }
}
