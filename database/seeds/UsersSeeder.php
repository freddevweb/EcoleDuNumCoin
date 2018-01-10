<?php

use Illuminate\Database\Seeder;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		//
		$persons = [ "Alfonso", "Fred","Francois" ];


		foreach( $persons as $value){

			$email = strtolower( $value )."@email.com";
			$password = strtolower( $value ).strtolower( $value );

			$rand = rand( 0, 3 );
			if( $rand == 0 ){
				$accountKey = substr( hash('sha256',$rand.$value.$email), 0, 10 );
			}
			else if( $rand == 1 ){
				$accountKey = substr( hash('sha256',$value.$email.$rand), 0, 10 );
			}
			else if( $rand == 2 ){
				$accountKey = substr( hash('sha256',$value.$rand.$email), 0, 10 );
			}
			else if( $rand == 3 ){
				$accountKey = substr( hash('sha256',$rand.$email.$value), 0, 10 );
			}

			\App\User::create(array(
				'name' => $value,
				'email' => $email,
				'password' => bcrypt( $password.$password ),
				'account' =>  $accountKey,
			));
		}
	}
}
