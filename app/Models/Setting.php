<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model 
{

    protected $table = 'settings';
    public $timestamps = true;
    protected $fillable = array('app_name', 'app_about', 'phone', 'email', 'f_link', 't_link', 'y_link', 'insta_link', 'whats_number', 'goole_plus_link');

}