<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	
	public function documentation()
	{
		return view("docs");
	}


	public function tests(){

		$addresses = DB::table('adresses')->get();

		for($i = 0; $i <= 4; $i++){

			foreach( $addresses as $address ){
			
				$arrayTo = DB::table('adresses')
					->where('cryptoId', $address->cryptoId)
					->where('adressNumber', '<>' , $address->adressNumber)
					->get();
	
				$to = $arrayTo[ rand(0, count($arrayTo)-1 )];
				
				$bitcoinDatas = [
					"price_usd" => "573.137",
					"price_btc" => "1.0",
					"last_updated" => "1472762067"
				];
	
				$ethDatas = [
					"price_usd" => "12.1844",
					"price_btc" => "0.021262",
					"last_updated"=> "1472762062"
				];
	
				if( $address->cryptoId == 1 ){
					$price = json_encode( $bitcoinDatas );
				}
				else if( $address->cryptoId == 2 ){
					$price = json_encode( $ethDatas );
				}
	
				$sum = rand(100,9999999)/10000000;
				
				dump (array(
					'from' => $address->adressNumber,
					'to' => $to->adressNumber,
					'sum' => $sum ,
					'prices' => $price,
				));
			}

		}
		
		die();
	}



	
}

