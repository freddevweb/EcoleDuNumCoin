<?php

namespace App\Repositories;

use App\Adress;
use Illuminate\Support\Facades\DB;

class AdressRepository extends BaseRepository
{

    public function __construct( Adress $address )
    {
        $this->entity = $address;
    }


	public function getAddressesByAccount( $accountNumber )
	{
		return DB::select('SELECT addr.*, cc.name, cc.abbreviation  FROM adresses as addr INNER JOIN cryptocoins as cc ON addr.cryptoId = cc.id  WHERE account = :account', array(
			'account' => $accountNumber
			// 'account' => "0db6356f468b285837a64819f5f2cf"
		));
	}

	public function getAddressByAdress( $address )
	{
		return DB::select('SELECT addr.*, cc.name, cc.abbreviation  FROM adresses as addr INNER JOIN cryptocoins as cc ON addr.cryptoId = cc.id  WHERE adressNumber = :address', array(
			'address' => $address
		));
	}

	public function getAddress( $account, $address )
	{
		return DB::select('SELECT addr.*, cc.name, cc.abbreviation  FROM adresses as addr INNER JOIN cryptocoins as cc ON addr.cryptoId = cc.id  WHERE adressNumber = :address AND account = :account' , array(
			'account' => $account,
			'address' => $address
		));
	}

	public function createAddress()
	{
		//
	}

	public function deleteAddress( $addressId, $account)
	{

	}


}