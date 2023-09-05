<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Notification;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\NotificationResource;
use App\Http\Requests\V1\StorenotificationRequest;
use App\Http\Requests\V1\UpdatenotificationRequest;
use App\Http\Resources\V1\NotificationCollection;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notification = Notification::all();
        if ($notification->count() > 0) {
            return response()->json([
                'status' => 200,
                'Notification' => new NotificationCollection($notification)
            ], 200);
        } else {
            return response()->json([
                'status' => 200,
                'message' => 'No Notification Record Found'
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
    public function store(StorenotificationRequest $request)
    {
        $storeNotification = Notification::create($request->all());

        if ($storeNotification) {
            return response()->json([
                'status' => 200,
                'Notification' => new NotificationResource($storeNotification)
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show( $notificationId)
    {
        $notification = Notification::find($notificationId);

        if (!$notification) {
            return response()->json([
                'status' => 404,
                'message' => 'Notification Not Found'
            ], 404);
        } else {
            return response()->json([
                'status' => 200,
                'Notification' => new NotificationResource($notification)
            ], 200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(notification $notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatenotificationRequest $request,  $notificationId)
    {
        $notification = Notification::find($notificationId);

        if ($notification) {
            $notification->update($request->all());
            return response()->json([
                'status' => 200,
                'message' => 'Notification Updated Successfully'
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Notification Record Not Found'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($notificationId)
    {
        $notification = Notification::find($notificationId);

        if ($notification) {
            $notification->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Notification Deleted Succesfully'
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Notification Record Not Found'
            ], 404);
        }
    }
}
