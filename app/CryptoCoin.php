<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CryptoCoin extends Model
{

	public function adress(){
		return $this->hasMany("App\CryptoCoin");
	}
	
}
