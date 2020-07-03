<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'post_id';
    
    public function categories(){
    	return $this->belongsTo('App\Categories', 'post_cat_id');
    }
}
