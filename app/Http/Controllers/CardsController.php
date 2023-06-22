<?php

namespace App\Http\Controllers;

use App\Models\Cards;
use App\Http\Requests\StoreCardsRequest;
use App\Http\Requests\UpdateCardsRequest;

class CardsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCardsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cards $cards)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cards $cards)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCardsRequest $request, Cards $cards)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cards $cards)
    {
        //
    }
}
