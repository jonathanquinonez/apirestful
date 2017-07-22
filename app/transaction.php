<?php

namespace App;

use App\buyer;
use App\product;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    //
    protected $fillable = [
    'quantity',
    'buyer_id',
    'product_id',
    ];

    public function buyers()
    {
    	return $this->belongsTo(buyer::class);
    }

    public function product()
    {
    	return $this->belongsTo(product::class);
    }


}
