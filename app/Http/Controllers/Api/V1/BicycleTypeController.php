<?php

namespace App\Http\Controllers\Api\V1;


use App\Models\BicycleType;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreBicycleTypeRequest;
use App\Http\Requests\V1\UpdateBicycleTypeRequest;
use App\Http\Resources\V1\Bicycle\BicycleTypeResource;
use App\Http\Resources\V1\Bicycle\BicycleTypeCollection;

class BicycleTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bicycleType = BicycleType::all();
        if ($bicycleType->count() > 0) {
            return response()->json([
                'status' => 200,
                'bicycle types' => new BicycleTypeCollection($bicycleType)
            ], 200);
        } else {
            return response()->json([
                'status' => 200,
                'message' => 'No Bicycle Record Found'
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
    public function store(StoreBicycleTypeRequest $request)
    {
        $storeBicycle = BicycleType::create($request->all());

        if ($storeBicycle) {
            return response()->json([
                'status' => 200,
                'bicycle type' => new BicycleTypeResource($storeBicycle)
            ], 200);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($bicycleTypeId)
    {
        $bicycleType = BicycleType::find($bicycleTypeId);

        if (!$bicycleType) {
            return response()->json([
                'status' => 404,
                'message' => 'Bicycle Not Found'
            ], 404);
        } else {
            return response()->json([
                'status' => 200,
                'bicycle type' => new BicycleTypeResource($bicycleType)
            ], 200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BicycleType $bicycleType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBicycleTypeRequest $request, $bicycleTypeId)
    {
        $bicycle = BicycleType::find($bicycleTypeId);

        if ($bicycle) {
            $bicycle->update($request->all());
            return response()->json([
                'status' => 200,
                'message' => 'Bicycle Type Updated Succesfully'
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'bicycle type' =>'Bicycle Type Record Not Found'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BicycleType $bicycleType)
    {

        if ($bicycleType) {
            $bicycleType->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Bicycle Type Deleted Succesfully'
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'bicycle type' =>'Bicycle Type Record Not Found'
            ], 404);
        }
    }
}
