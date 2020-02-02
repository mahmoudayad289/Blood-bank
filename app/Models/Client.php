<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{

    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('name', 'email', 'password', 'phone', 'data_of_birth', 'status', 'last_donation_data', 'pin_code', 'blood_type_id', 'city_id');

    public function bloodType()
    {
        return $this->belongsTo('App\Models\BloodType');
    }


    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function bloodTypes()
    {
        return $this->belongsToMany('App\Models\BloodType');
    }

    public function notifications()
    {
        return $this->belongsToMany(Notification::class,'client_notification','notification_id');
    }

    public function posts()
    {
        return $this->belongsToMany('App\Models\Post');
    }


    public function tokens()
    {
        return $this->hasMany(Token::class);
    }

    public function governorates()
    {
        return $this->belongsToMany('App\Models\Governorat','client_governorate','governorate_id','client_id');
    }


    public function donationRequests()
    {
        return $this->hasMany(DonationRequest::class);
    }


    protected $hidden = [
        'password', 'api_token',
    ];

}
