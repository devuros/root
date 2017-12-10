<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    
    protected $fillable = ['title', 'body'];

    protected $perPage = 5;


    public function tags()
    {

    	return $this->belongsToMany('App\Tag');

    }
    
}
