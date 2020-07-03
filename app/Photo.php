<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'photo_id';
    
    public function post(){
    	return $this->belongsTo('App\Post', 'photo_post_id');
    }
}
