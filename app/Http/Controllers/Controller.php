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

	public function allCoins( $convert = null )
	{
		$query = new Apihttp;
		$query->coin = !empty( $coin ) ? $coin : "" ;
		$query->params["convert"] = !empty( $convert ) ? $convert : "";
		$url = $query->urlConstruct();

		$request = new Client();
		$response = $request->get( $url )->getBody();
		echo $response;
	}

	public function coin( $coin, $convert = null ){
		
		$query = new Apihttp;
		$query->coin = $coin ;
		$query->params = !empty( $params ) ? $params : "";
		$url = $query->urlConstruct();

		$request = new Client();
		$response = $request->get( $url )->getBody();
		echo $response;

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

