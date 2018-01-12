<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(Array $data)
    {

		$accountKey = null;

		$rand = rand( 0, 3 );
		if( $rand == 0 ){
			$accountKey = substr( hash('sha256',$rand.$data['email'].$data['name']), 0, 30 );
		}
		else if( $rand == 1 ){
			$accountKey = substr( hash('sha256',$data['email'].$rand.$data['name']), 0, 30 );
		}
		else if( $rand == 2 ){
			$accountKey = substr( hash('sha256',$data['name'].$rand.$data['email']), 0, 30 );
		}
		else if( $rand == 3 ){
			$accountKey = substr( hash('sha256',$rand.$data['email'].$data['name']), 0, 30 );
		}

		// $accountKey = $this->generateAccount( $data );
		// dump($accountKey);die();
		return User::create([
            'name' => $data['name'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
			'account' => $accountKey,
		]);
	}
	
	private function generateAccount( Array $data )
	{
		$rand = rand( 0, 3 );
		if( $rand == 0 ){
			$accountKey = substr( hash('sha256',$rand.$data['email'].$data['name']), 0, 30 );
		}
		else if( $rand == 1 ){
			$accountKey = substr( hash('sha256',$data['email'].$rand.$data['name']), 0, 30 );
		}
		else if( $rand == 2 ){
			$accountKey = substr( hash('sha256',$data['name'].$rand.$data['email']), 0, 30 );
		}
		else if( $rand == 3 ){
			$accountKey = substr( hash('sha256',$rand.$data['email'].$data['name']), 0, 30 );
		}

		return $accountKey;
	}

}
