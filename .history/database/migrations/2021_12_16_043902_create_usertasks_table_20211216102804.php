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
            $table->dateTime('task_date_time');
            $table->integer('userid');
            $table->string('username');
            $table->string('usertask');
            $table->integer('usertask_duration_mnts');
            $table->integer('approved_admin_name');
            










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
