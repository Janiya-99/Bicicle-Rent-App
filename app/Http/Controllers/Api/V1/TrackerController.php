<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Tracker;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoretrackerRequest;
use App\Http\Requests\V1\UpdatetrackerRequest;
use App\Http\Resources\V1\TrackerCollection;
use App\Http\Resources\V1\TrackerResource;
use App\Models\Tracker as ModelsTracker;

class TrackerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tracker = Tracker::all();
        if ($tracker->count() > 0) {
            return response()->json([
                'status' => 200,
                'Tracker' => new TrackerCollection($tracker)
            ], 200);
        } else {
            return response()->json([
                'status' => 200,
                'message' => 'No Tracker Record Found'
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
    public function store(StoretrackerRequest $request)
    {
        $storeTracker = Tracker::create($request->all());

        if ($storeTracker) {
            return response()->json([
                'status' => 200,
                'Tracker' => new TrackerResource($storeTracker)
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show( $trackerId)
    {
        $tracker = Tracker::find($trackerId);
        
        if (!$tracker) {
            return response()->json([
                'status' => 404,
                'message' => 'Tracker Not Found'
            ], 404);
        } else {
            return response()->json([
                'status' => 200,
                'Tracker' => new TrackerResource($tracker)
            ], 200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tracker $tracker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatetrackerRequest $request,  $trackerId)
    {
        $tracker = Tracker::find($trackerId);

        if ($tracker) {
            $tracker->update($request->all());
            return response()->json([
                'status' => 200,
                'message' => 'Tracker Updated Successfully'
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' =>'Tracker Record Not Found'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $trackerId)
    {
        $tracker = Tracker::find($trackerId);
        if ($tracker) {
            $tracker->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Tracker Deleted Succesfully'
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' =>'Tracker Record Not Found'
            ], 404);
        }
    }
}
