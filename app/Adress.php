<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adress extends Model
{

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function cryptocoin()
    {
        return $this->belongsTo('App\CryptoCoin');
	}
	
	public function historical()
	{
		return $this->hasMany('App\Historical');
	}
}
