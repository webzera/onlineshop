<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    public function owner() //for multishop
    {
    	return $this->belongsTo(User::class, 'user_id');
    }
}
