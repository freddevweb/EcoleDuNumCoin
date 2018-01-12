<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\UserRepository;
use App\Repositories\AdressRepository;

class UserController extends Controller
{

	private $user;
	
	private $userRepo;
	private $addressRepo;
	
	public function __construct( UserRepository $userRepo, AdressRepository $addressRepo )
	{
		$this->user = Auth::user();
		$this->userRepo = $userRepo;
		$this->addressRepo = $addressRepo;
	}

	public function getProfile()
	{
		$user = Auth::user();
		return view('profil', [ 'user' => $user] );
	}

	public function getAddresses()
	{
		$addresses = $this->addressRepo->getAddressesByAccount( Auth::user()->account );

		return view('addresses', array( 'addresses' => $addresses ));
	}

	public function getAddress( $address )
	{
		$values = [
			'success' => false,
			'msg' => null,
			'datas' => null
		];

		$addressAccount = $this->addressRepo->getAddressByAdress( $address )[0]->account;

		$userConnectedAccount = Auth::user()->account;

		if( $userConnectedAccount === $addressAccount ){

			$getAddress = $this->addressRepo->getAddress( Auth::user()->account, $address );
		
			$values['success'] = true;
			$values['datas'] = $getAddress[0];
		}
		else {
			
			$values['msg'] = "Vous n'avez pas les droits pour effectuer cette action!";

			return redirect()->route('compte', array( "datas" => $values));
		}
		dump($values);
		return view('address', array( 'values' => $values ));
	}
	
	public function createAddress()
	{
		//
		dump();
		die();
	}

	public function doTransactions()
	{
		//
		dump();
		die();
	}

	public function seeMyTransaction()
	{
		//
		dump();
		die();
	}

	public function updateProfile( User $user )
	{
		//
		dump();
		die();
	}

	public function deleteAccount( User $user )
	{
		//
		dump();
		die();
	}


}
