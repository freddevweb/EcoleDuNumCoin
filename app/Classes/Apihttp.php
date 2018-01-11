<?php

namespace App\Classes;

use Illuminate\Database\Eloquent\Model;

class Apihttp
{
	private $baseUrl = "https://api.coinmarketcap.com/v1/ticker/";
	public $coin;
	public $params;
	public $url;

	public function urlConstruct()
	{
		$this->url = $this->baseUrl;
		if( isset($this->coin) ){
			$this->url .= $this->coin . "/";
		}
		if( isset($this->params) ){
			$string="?";

			foreach ($this->params as $key => $value ){
				$and = ( $string != "?" ) ? "&" : "";
				$string .= $and;
				$str = ( !empty( $value ) || strlen( $string )-1 != "&"  ) ?  $key."=".$value : "";
				$string .= $str;
			}
			
			$this->url .= $string;
		}

		return $this->url;
		// return http_get( $baseUrl , array() , $info  );
	}
	

	
	
	

}
