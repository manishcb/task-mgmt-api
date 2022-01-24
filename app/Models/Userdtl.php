<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userdtl extends Model
{
    use HasFactory;
    public $timestamps = false; 
    protected $fillable = [
        'name',
        'email',
        'designation',
        'password',
        'dashboard',
        'createuser',
        'task',
        'forms'


    ];


}
