<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Governorat extends Model 
{

    protected $table = 'governorates';
    public $timestamps = true;
    protected $fillable = array('name');

    public function cities()
    {
        return $this->hasMany('App\Models\City');
    }

    public function clients()
    {
        return $this->belongsToMany(Client::class,'client_governorate','client_id','governorate_id');

    }

}
