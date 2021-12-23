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
            $table->integer('assign_admin_name');
            $table->string('assign_username');
            $table->dateTime('assign_task_issue_date');
            $table->date('assign_task_issue_date');
            $table->longText('usertask');
            $table->integer('usertask_duration_mnts');
            
            $table->dateTime('task_complete_date_time');
            $table->longText('remarks');
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
