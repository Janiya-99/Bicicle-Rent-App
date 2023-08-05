<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\BicycleStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreBicycleStatusRequest;
use App\Http\Requests\V1\UpdateBicycleStatusRequest;
use App\Http\Resources\V1\Bicycle\BicycleStatusResource;
use App\Http\Resources\V1\Bicycle\BicycleStatusCollection;

class BicycleStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bicycleStatus = BicycleStatus::all();

        if($bicycleStatus){
            return response()->json([
                'status' => 200,
                'bicycle Status' => new BicycleStatusCollection($bicycleStatus),
            ],200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Bicycle Status Records Not Found'
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
    public function store(StoreBicycleStatusRequest $request)
    {
        $storeBicycleStatus = BicycleStatus::create($request->all());
        if($storeBicycleStatus){
            return response()->json([
                'status' => 200,
                'bicycle Status' => new BicycleStatusResource($storeBicycleStatus),
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
    public function show($bicycleStatusId)
    {
        $bicycleStatus = BicycleStatus::find($bicycleStatusId);
        if($bicycleStatus){
            return response()->json([
                'status' => 200,
                'bicycle status' => new BicycleStatusResource($bicycleStatus)
            ],200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Bicycle Status Records Not Found'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BicycleStatus $bicycleStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBicycleStatusRequest $request,$bicycleStatusId)
    {
        $bicycleStatus = BicycleStatus::find($bicycleStatusId);
        if($bicycleStatus){
            $bicycleStatus->update($request->all());
            return response()->json([
                'status' => 200,
                'message' =>'Bicycle Status Updated Successfully'
            ],200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Bicycle Status Records Not Found'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($bicycleStatusId)
    {
        $bicycleStatus = BicycleStatus::find($bicycleStatusId);
        if($bicycleStatus){
            $bicycleStatus->delete();
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
