<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*

        $table->bigInteger()
        $table->mediumInteger()
        $table->integer()
        $table->smallInteger()
        $table->tinyInteger()
        */

        // rollback migration
        //php artisan migrate:rollback --path=/database/migrations/2021_12_06_052922_create_car_registrations_table.php


        Schema::create('car_registrations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('car_brand');
            $table->string('car_model');
            $table->string('car_fuel_type');
            $table->date('car_regis_date');
            $table->string('car_owner_name');
            $table->string('car_owner_address');
            $table->bigInteger('car_owner_phone');
            $table->string('car_owner_email');
            $table->string('car_owner_aadhar_no');
            $table->string('car_owner_pan_no');
            $table->string('car_owner_voter_card_no');
            $table->string('car_insurance_company');
            $table->date('car_insurance_expire_date');
            $table->string('car_registration_no');
            $table->string('car_chasis_no');
            $table->integer('car_milage_in_km');
            $table->string('car_owner_image');
            $table->string('car_owner_aadhar_image');
            $table->string('car_owner_pan_image');
            $table->string('car_owner_voter_image');
            $table->string('car_owner_insurance_image');
            $table->string('car_image');
            $table->string('car_blue_book_image');
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
        Schema::dropIfExists('car_registrations');
    }
}
