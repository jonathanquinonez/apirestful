<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\ApiController;
use App\seller;
use Illuminate\Http\Request;

class SellerController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendedor = seller::has('products')->get();

         return $this->showAll($vendedor);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $vendedor = seller::has('products')->findOrFail($id);

        return response()->json(['data'=> $vendedor],200);

    }

}
