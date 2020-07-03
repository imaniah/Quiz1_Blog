<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'album_id';
    
    public function photo(){
    	return $this->belongsTo('App\Photo', 'album_photo_id');
    }
}
