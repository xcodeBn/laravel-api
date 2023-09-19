<?php

namespace App\Http\Controllers;

use App\Models\v1\Sellers;
use App\Http\Requests\StoreSellersRequest;
use App\Http\Requests\UpdateSellersRequest;

class SellersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSellersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSellersRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\v1\Sellers  $sellers
     * @return \Illuminate\Http\Response
     */
    public function show(Sellers $sellers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\v1\Sellers  $sellers
     * @return \Illuminate\Http\Response
     */
    public function edit(Sellers $sellers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSellersRequest  $request
     * @param  \App\Models\v1\Sellers  $sellers
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSellersRequest $request, Sellers $sellers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\v1\Sellers  $sellers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sellers $sellers)
    {
        //
    }
}
