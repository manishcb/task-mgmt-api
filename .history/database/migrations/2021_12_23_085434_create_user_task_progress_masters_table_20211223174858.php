<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTaskProgressMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_task_progress_masters', function (Blueprint $table) {
            
            $table->string('name');
            $table->integer('task_id')->primary();
            $table->longText('task');
            $table->time('commit_stop');
            $table->integer('total_work_mnts');
            $table->integer('total_break_mnts');
            $table->integer('gross_work_mnts');
            $table->integer('admin_estimate_mnts');
            $table->longText('remark');
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
        Schema::dropIfExists('user_task_progress_masters');
    }
}
