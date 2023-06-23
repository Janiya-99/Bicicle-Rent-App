<?php

namespace App\Http\Controllers;

use App\Models\EmergencyStatus;
use App\Http\Requests\StoreEmergencyStatusRequest;
use App\Http\Requests\UpdateEmergencyStatusRequest;

class EmergencyStatusController extends Controller
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
    public function store(StoreEmergencyStatusRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(EmergencyStatus $emergencyStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EmergencyStatus $emergencyStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmergencyStatusRequest $request, EmergencyStatus $emergencyStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmergencyStatus $emergencyStatus)
    {
        //
    }
}
