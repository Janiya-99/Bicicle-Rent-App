<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Bicycle;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBicycleRequest;
use App\Http\Requests\UpdateBicycleRequest;

class BicycleController extends Controller
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
    public function store(StoreBicycleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Bicycle $bicycle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bicycle $bicycle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBicycleRequest $request, Bicycle $bicycle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bicycle $bicycle)
    {
        //
    }
}
