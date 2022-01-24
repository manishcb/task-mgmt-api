<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserFormDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_form_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('formname');
            $table->longText('item');
            $table->longText('type');
            $table->timestamps();
            $table->foreign('formname')->references('formname')->on('user_form_masters')
            ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_form_details');
    }
}
