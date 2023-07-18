<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\EmergencyEmployee;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmergencyEmployeeRequest;
use App\Http\Requests\UpdateEmergencyEmployeeRequest;
use App\Http\Resources\V1\EmployEmegencyCollection;

class EmergencyEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emergencyEmployee = EmergencyEmployee::all();

        if($emergencyEmployee->count() > 0 ){
            return response()->json([
                'status' => 200,
                'employemergencies' => new EmployEmegencyCollection($emergencyEmployee)
            ], 200);
        }else {
            return response()->json([
                'status' => 404,
                'message' => 'EmergencyEmploy Records Not Found'
            ], 404);
        }
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
    public function store(StoreEmergencyEmployeeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(EmergencyEmployee $emergencyEmployee)
    {
        if($emergencyEmployee->count() > 0 ){
            return response()->json([
                'status' => 200,
                'employemergencies' => new EmployEmegencyCollection($emergencyEmployee)
            ], 200);
        }else {
            return response()->json([
                'status' => 404,
                'message' => 'EmergencyEmploy Records Not Found'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EmergencyEmployee $emergencyEmployee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmergencyEmployeeRequest $request, EmergencyEmployee $emergencyEmployee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmergencyEmployee $emergencyEmployee)
    {
        //
    }
}
