<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Gps;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\GpsResource;
use App\Http\Resources\V1\GpsCollection;
use App\Http\Requests\V1\StoreGpsRequest;
use App\Http\Requests\V1\UpdateGpsRequest;

class GpsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gps = Gps::all();

        if($gps){
            return response()->json([
                'status' => 200,
                'Gps' => new GpsCollection($gps)
            ],200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Gps Records Not Found'
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
    public function store(StoreGpsRequest $request)
    {
        $StoreGps = Gps::create($request->all());

        if($StoreGps){
            return response()->json([
                'status' => 200,
                'message' =>'Gps Created Successfully',
                'gps' => new GpsResource($StoreGps)
            ],200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($gpsId)
    {
        $gps = Gps::find($gpsId);

        if($gps){
            return response()->json([
                'status' => 200,
                'Gps' => new GpsResource($gps)
            ],200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Gps Records Not Found'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gps $gps)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGpsRequest $request, $gpsId)
    {
        $gps = Gps::find($gpsId);

        if($gps){
            $gps->update($request->all());
            return response()->json([
                'status' => 200,
                'message' =>'Gps Updated Successfully'
            ],200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Gps Records Not Found'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($gpsId)
    {
        $gps = Gps::find($gpsId);
        if($gps){
            $gps->delete();
            return response()->json([
                'status' => 200,
                'message' =>'Gps Deleted Successfully'
            ],200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Gps Records Not Found'
            ], 404);
        }
    }
}
