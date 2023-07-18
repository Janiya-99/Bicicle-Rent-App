<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Weather;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWeatherRequest;
use App\Http\Requests\UpdateWeatherRequest;
use App\Http\Resources\V1\WeatherCollecton;
use App\Http\Resources\V1\WeatherResource;

class WeatherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $weather = Weather::all();
        if($weather->count() > 0){
            return response()->json([
                'status' => 200,
                'weather' => new WeatherCollecton($weather)
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Weather Records Not Found'
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
    public function store(StoreWeatherRequest $request)
    {
        $storeWeather = Weather::create($request->all());

        if($storeWeather){
            return response()->json([
                'status' => 200,
                'message' => 'Weather Created Successfully',
                'weather' => new WeatherResource($storeWeather)
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Weather Record Not Found'
            ], 404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($weatherId)
    {
        $weather = Weather::find($weatherId);

        if($weather){
            return response()->json([
                'status' => 200,
                'weather' => new WeatherResource($weather)
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Weather Record Not Found'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Weather $weather)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWeatherRequest $request, Weather $weather)
    {
        if($weather){
            $weather->update($request->all());
            return response()->json([
                'status' => 200,
                'message' =>'Weather Updated Successfully'
            ],200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Weather Record Not Found'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Weather $weather)
    {
        if($weather){
            $weather->delete();
            return response()->json([
                'status' => 200,
                'message' =>'Weather Deleted Successfully'
            ],200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Weather Record Not Found'
            ], 404);
        }
    }
}
