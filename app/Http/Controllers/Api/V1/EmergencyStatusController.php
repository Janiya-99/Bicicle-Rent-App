<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\EmergencyStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreEmergencyStatusRequest;
use App\Http\Requests\V1\UpdateEmergencyStatusRequest;
use App\Http\Resources\V1\EmergencyStatusCollection;
use App\Http\Resources\V1\EmergencyStatusResource;

class EmergencyStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emergencyStatus = EmergencyStatus::all();

        if($emergencyStatus){
            return response()->json([
                'status' => 200,
                'emerency Status' => new EmergencyStatusCollection($emergencyStatus),
            ],200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Emergency Status Records Not Found'
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
    public function store(StoreEmergencyStatusRequest $request)
    {
        $storeEmergencyStatus = EmergencyStatus::create($request->all());
        if($storeEmergencyStatus){
            return response()->json([
                'status' => 200,
                'bicycle Status' => new EmergencyStatusResource($storeEmergencyStatus),
                'message' =>'Bicycle Status Created Successfully'
            ],200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Bicycle Status Records Not Found'
            ], 404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($emergencyStatusId)
    {
        $emergencyStatus = EmergencyStatus::find($emergencyStatusId);
        if($emergencyStatus){
            return response()->json([
                'status' => 200,
                'emergency status' => new EmergencyStatusResource($emergencyStatus)
            ],200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Emergency Status Records Not Found'
            ], 404);
        }
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
    public function update(UpdateEmergencyStatusRequest $request,  $emergencyStatusId)
    {
        $emergencyStatus = EmergencyStatus::find($emergencyStatusId);
        if($emergencyStatus){
            $emergencyStatus->update($request->all());
            return response()->json([
                'status' => 200,
                'message' =>'Emergency Status Updated Successfully'
            ],200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Emergency Status Records Not Found'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmergencyStatus $emergencyStatus)
    {
        if($emergencyStatus){
            $emergencyStatus->delete();
            return response()->json([
                'status' => 200,
                'message' =>'Bicycle Status Deleted Successfully'
            ],200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Bicycle Status Records Not Found'
            ], 404);
        }
    }
}
