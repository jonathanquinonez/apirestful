<?php

namespace App;

use App\transaction;



class buyer extends User
{
    //
    public function transaction()
    {
    	return $this-> hasMany (transaction::class);
    }
}
