<?php

namespace App;

use App\product;



class seller extends User
{
    //
    public function products()
    {
    	return  $this-> hasMany(product::class);
    }
}
