<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car_registration extends Model
{
    use HasFactory;
    public $timestamps = false; 
    protected $fillable = [
        'car_brand',
        'car_model',
        'car_fuel_type',
        // 'car_regis_date',
        // 'car_owner_name',
        // 'car_owner_address',
        // 'car_owner_phone',
        // 'car_owner_email',
        // 'car_owner_aadhar_no',
        // 'car_owner_pan_no',
        // 'car_owner_voter_card_no',
        // 'car_insurance_company',
        // 'car_insurance_expire_date',
        // 'car_registration_no',
        // 'car_chasis_no',
        // 'car_milage_in_km',
        //'car_owner_image',
        // 'car_owner_aadhar_image',
        // 'car_owner_pan_image',
        // 'car_owner_voter_image',
        // 'car_owner_insurance_image',
        // 'car_image',
        // 'car_blue_book_image',
        
    ];
    
}
