<?php

namespace App\Repositories;

use App\Adress;

class AdressRepository extends BaseRepository
{

    public function __construct( Adress $address )
    {
        $this->entity = $address;
    }



}