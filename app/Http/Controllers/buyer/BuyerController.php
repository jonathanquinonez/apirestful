<?php

namespace App\Http\Controllers\buyer;

use App\Http\Controllers\ApiController;
use App\buyer;
use Illuminate\Http\Request;

class BuyerController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compradores = buyer::has('transactions')->get();

        return $this->showAll($compradores);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
 
   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $compradores = buyer::has('transactions')->findOrFail($id);
       return response()->json(['data'=>$compradores],200);

    }

    
}
