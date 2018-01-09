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
    protected function create(array $data)
    {
		$status = [
			'success' => false,
			'user' => null
		];

		$user = new User;
		$user->name = $data['name'];
		$user->email = $data['email'];
		$user->password = bcrypt($data['password']);

		$user->id = User::create([
            'name' => $user->name,
			'email' => $user->email,
            'password' => bcrypt($user->password)
		])->id;

		if( $user->id != null ){

			$user->account = $this->generateAccount( $user );
			
			$account = DB::select( 'UPDATE user SET account : account WHERE id = :id ', array(
				'id' => $user->id,
				'account' => $user->account
			));
			
			$status['success'] = true;
			$status['user'] = $user;

			return $status;
		}
		else {
			
			return $status;
		}
		
	}
	
	private function generateAccount( User $user)
	{
		$rand = rand( 0, 3 );
		if( $rand == 0 ){
			$accountKey = $rand.$user->name.$user->email;
		}
		else if( $rand == 1 ){
			$accountKey = $user->name.$user->email.$rand;
		}
		else if( $rand == 2 ){
			$accountKey = $user->name.$rand.$user->email;
		}
		else if( $rand == 3 ){
			$accountKey = $rand.$user->email.$user->name;
		}

		return hash('sha256', $accountKey );
	}

}
