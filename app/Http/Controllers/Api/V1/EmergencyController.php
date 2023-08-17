<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Emergency;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\EmergencyResource;
use App\Http\Resources\V1\EmergencyCollection;
use App\Http\Requests\V1\StoreEmergencyRequest;
use App\Http\Requests\V1\UpdateEmergencyRequest;

class EmergencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emergency = Emergency::all();

        if($emergency->count() > 0){
            return response()->json([
                'status' => 200,
                'emergencies' => new EmergencyCollection($emergency)
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Emergencyies Reocords Not Found'
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
    public function store(StoreEmergencyRequest $request)
    {
        $storeEmergencies = Emergency::create($request->all());

        if($storeEmergencies) {
            return response()->json([
                'status' => 200,
                'emergency' => new EmergencyResource($storeEmergencies),
                'message' => 'Emergency Store Succesfully'
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($emergencyId)
    {
        $emergency = Emergency::find($emergencyId);

        if($emergency){
            return response()->json([
                'status' =>200,
                'emergency' => new EmergencyResource($emergency)
            ], 200);
        } else{
            return response()->json([
                'status' => 404,
                'message' => 'Emergency Record Not Found'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Emergency $emergency)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmergencyRequest $request, $emergencyId)
    {
        $emergency = Emergency::find($emergencyId);

        if($emergency){
            $emergency->update($request->all());
            return response()->json([
                'status' =>200,
                'message' => 'Emergency Updated Succesfully'
            ], 200);
        } else{
            return response()->json([
                'status' => 404,
                'message' => 'Emergency Record Not Found'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Emergency $emergency)
    {
        if($emergency){
            $emergency->delete();
            return response()->json([
                'status' =>200,
                'message' => 'Emergency Deleted Succesfully'
            ], 200);
        } else{
            return response()->json([
                'status' => 404,
                'message' => 'Emergency Record Not Found'
            ], 404);
        }
    }
}
