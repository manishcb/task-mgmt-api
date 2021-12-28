<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsertasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usertasks', function (Blueprint $table) {
            $table->id();
            $table->string('assign_admin_name');
            $table->string('assign_username');
            $table->date('assign_task_register_date');
            $table->dateTime('assign_task_start_date_time');
            $table->longText('assign_usertask');
            $table->integer('assign_usertask_duration_mnts');
            $table->dateTime('assign_task_complete_date_time');
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
        Schema::dropIfExists('usertasks');
    }
}
