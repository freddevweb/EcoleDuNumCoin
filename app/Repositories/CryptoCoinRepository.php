<?php

namespace App\Repositories;

use App\CryptoCoin;

class CryptoCoinRepository extends BaseRepository
{

    public function __construct( CryptoCoin $CryptoCoin )
    {
        $this->entity = $CryptoCoin;
    }



}