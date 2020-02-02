<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonationRequest extends Model 
{

    protected $table = 'donation_requests';
    public $timestamps = true;
    protected $fillable = array('name', 'age', 'blood_type_id', 'number_of_bags', 'hospital_name', 'latitude', 'longitude', 'hospital_address', 'city_id','client_id', 'number', 'message');

    public function notifications()
    {
        return $this->hasMany('App\Models\Notification');
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function bloodtype()
    {
        return $this->belongsTo(BloodType::class,'blood_type_id');
    }

    public function clients()
    {
        return $this->belongsTo(Client::class);
    }

}
