<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_form_detail extends Model
{
    use HasFactory;
    public $timestamps = false; 
    protected $fillable = [
    'formname',
    'item',
    'type',
    
    ];
}
