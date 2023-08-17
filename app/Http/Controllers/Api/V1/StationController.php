<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Station;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreStationRequest;
use App\Http\Requests\V1\UpdateStationRequest;
use App\Http\Resources\V1\Bicycle\StationResource;
use App\Http\Resources\V1\Bicycle\StationCollection;

class StationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $station = Station::all();

        if($station->count() > 0 ){
            return response()->json([
                'status' => 200,
                'stations' => new StationCollection($station)
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Station Records Not Found'
            ], 200);
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
    public function store(StoreStationRequest $request)
    {
        $storeStation = Station::create($request->all());
        if ($storeStation) {
            return response()->json([
                'status' => 200,
                'message' => 'Station Created Successfully',
                'user contact' => new StationResource($storeStation)
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Station $station)
    {
        if($station){
            return response()->json([
                'status' => 200,
                'station' => new StationResource($station)
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Station Records Not Found'
            ], 200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Station $station)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStationRequest $request, Station $station)
    {
        if ($station) {
            $station->update($request->all());
            return response()->json([
                'status' => 200,
                'message' => 'Station Updated Succesfully'
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'user contacts' =>'Station Record Not Found'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Station $station)
    {

        if ($station) {
            $station->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Station Deleted Succesfully'
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'user contacts' =>'Station Record Not Found'
            ], 404);
        }
    }
}
