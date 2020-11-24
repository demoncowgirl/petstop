<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function messages() {
    	return $this->hasMany('App\Message');
    }
}

protected $fillable=['name', 'email_address', 'message'];

protected $dates = ['timestamps'];
