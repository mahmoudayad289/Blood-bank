<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model 
{

    protected $table = 'posts';
    public $timestamps = true;
    protected $fillable = array('title', 'image', 'body', 'category_id');

    protected $appends = ['image_path'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }


    public function getImagePathAttribute()
    {
        return asset('/images/posts/' . $this->image);
    }

}
