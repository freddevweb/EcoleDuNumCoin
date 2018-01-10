<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cryptocoin extends Model
{

	public function adress(){
		return $this->hasMany("App\CryptoCoin");
	}
	
}
