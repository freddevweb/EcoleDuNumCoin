<?php

use Illuminate\Database\Seeder;
use App\User;
use App\CryptoCoin;

class AdressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

		$users = $this->User->all();
		$cyptos = $this->CryptoCoin->all();



		foreach( $users as $user ){

			foreach( $cryptos as $crypto ){

				$addressNumber = substr( hash('sha256', $user->name.$crypto->name.time() ) ,0 ,30 );

				$sum = rand(100000000, 1000000000 )/100000000;

				\App\Adress::create(array(
					'account' => $user->account,
					'adressNumber' => $addressNumber,
					'cryptoId' => $crypto->id,
					'sum' => $sum,
				));
			}
		}
    }
}
