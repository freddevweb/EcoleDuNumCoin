<?php

namespace App\Repositories;

use App\User;
use Illuminate\Contracts\Auth\Guard;

class UserRepository extends BaseRepository
{

	public $curent;

    public function __construct( Guard $auth )
    {
        $this->entity = $auth->user();
    }

	public function updateProfil( User $user)
	{
		
		$newUser = new User();
		$newUser->id = $this->entity->id;
		$newUser->name = $user->name;
		$newUser->email = $user->email;

		$newUser->save();


	}


}