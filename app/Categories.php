<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'cat_id';
    protected $fillable = ['cat_nama', 'cat_text'];
}
