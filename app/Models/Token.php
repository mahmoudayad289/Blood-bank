<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    protected $fillable = ['client_id','type','token'];

    public function clients()
    {
        return $this->belongsTo(Client::class);
    }

}
