<?php

namespace App;

use App\transaction;
use Illuminate\Database\Eloquent\Concerns\hasMany;



class buyer extends User
{
    //
    public function transactions()
    {
    	return $this-> hasMany (transaction::class);
    }
}
