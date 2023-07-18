<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Bicycle;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBicycleRequest;
use App\Http\Requests\UpdateBicycleRequest;
use App\Http\Resources\V1\Bicycle\BicycleCollection;
use App\Http\Resources\V1\Bicycle\BicycleResource;

class BicycleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bicycles = Bicycle::all();
        if ($bicycles->count() > 0) {
            return response()->json([
                'status' => 200,
                'Bicycles' => new BicycleCollection($bicycles)
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
    public function store(StoreBicycleRequest $request)
    {
        $storeBicycle = Bicycle::create($request->all());

        if ($storeBicycle) {
            return response()->json([
                'status' => 200,
                'Bicycle' => new BicycleResource($storeBicycle)
            ], 200);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Bicycle $bicycle)
    {

        if (!$bicycle) {
            return response()->json([
                'status' => 404,
                'message' => 'Bicycle Not Found'
            ], 404);
        } else {
            return response()->json([
                'status' => 200,
                'Bicycle' => new BicycleResource($bicycle)
            ], 200);
        }
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
        
        if ($bicycle) {
            $bicycle->update($request->all());
            return response()->json([
                'status' => 200,
                'message' => 'Bicycle Updated Successfully'
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'user contacts' =>'Bicycle Record Not Found'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bicycle $bicycle)
    {

        if ($bicycle) {
            $bicycle->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Bicycle Deleted Succesfully'
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'user contacts' =>'Bicycle Record Not Found'
            ], 404);
        }
    }
}
