<?php

namespace App\Repositories;

use App\Transaction;

class TransactionRepository extends BaseRepository
{

    public function __construct( Transaction $transaction )
    {
        $this->entity = $transaction;
    }


	


}