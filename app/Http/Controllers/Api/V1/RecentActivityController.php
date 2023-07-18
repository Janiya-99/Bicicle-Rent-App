<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\RecentActivity;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRecentActivityRequest;
use App\Http\Requests\UpdateRecentActivityRequest;
use App\Http\Resources\V1\RecetActivityCollection;
use App\Http\Resources\V1\RecetActivityResource;

class RecentActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recentActivity = RecentActivity::all();

        if($recentActivity->count() > 0){
            return response()->json([
                'status' => 200,
                'recentActivities' => new RecetActivityCollection($recentActivity)
            ], 200);
        }else {
            return response()->json([
                'status' => 404,
                'message' => 'No Recent Activity Record Found'
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
    public function store(StoreRecentActivityRequest $request)
    {
       $storeRecentActivity = RecentActivity::create($request->all());

       if($storeRecentActivity){
        return response()->json([
            'status' => 200,
            'recentActivities' => new RecetActivityCollection($storeRecentActivity)
        ], 200);
    }

    }

    /**
     * Display the specified resource.
     */
    public function show( $activityId)
    {
        $recentActivity = RecentActivity::find($activityId);

        if($recentActivity){
            return response()->json([
                'status' => 200,
                'recentActivities' => new RecetActivityResource($recentActivity)
            ], 200);
        }else {
            return response()->json([
                'status' => 404,
                'message' => 'No Recent Activity Record Found'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RecentActivity $recentActivity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRecentActivityRequest $request, $activityId)
    {
        $recentActivity = RecentActivity::find($activityId);

        if($recentActivity){
            $recentActivity->update($request->all());
            return response()->json([
                'status' => 200,
                'message' => 'Recent Activity Updated Succesfully'
            ], 200);
        }else {
            return response()->json([
                'status' => 404,
                'message' => 'No Recent Activity Record Found'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RecentActivity $recentActivity)
    {
        if($recentActivity){
            $recentActivity->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Recent Activity Deleted Succesfully'
            ], 200);
        }else {
            return response()->json([
                'status' => 404,
                'message' => 'No Recent Activity Record Found'
            ], 404);
        }
    }
}
