<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;

use GuzzleHttp\Client;

use App\Classes\Apihttp;

class Controller extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	
	public function documentation()
	{
		return view("docs");
	}

	public function allCoins()
	{
		$query = new Apihttp;
		$query->coin = !empty( $coin ) ? $coin : "" ;
		$query->params["convert"] = !empty( $convert ) ? $convert : "";
		$url = $query->urlConstruct();

		$request = new Client();
		$response = json_decode( $request->get( $url )->getBody() );
		// dump($response);
		// die();
		return view('coinsView', [ 'response' => $response] );
	}

	public function coin( $coin ){
		
		$query = new Apihttp;
		$query->coin = $coin ;
		$url = $query->urlConstruct();

		$request = new Client();
		$response = json_decode( $request->get( $url )->getBody() );
		dump( $response ) ;
		die();
		return view('coinView', [ 'response' => $response[0]] );
	}


	public function tests(){


		$query = new Apihttp;
		// $query->coin = "bitcoin";
		$query->params = array(
			'convert' => "EUR",
		);
		$url = $query->urlConstruct();

		$request = new Client();
		$res = $request->get( $url );

		dump( $res->getStatusCode() );
		dump( $res->getBody() ); 

		echo $res->getStatusCode();
		echo "<br/>";
		echo( $res->getBody() );

		die();
	}




	
}

