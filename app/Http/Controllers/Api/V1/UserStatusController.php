<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\UserStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreUserStatusRequest;
use App\Http\Requests\V1\UpdateUserStatusRequest;
use App\Http\Resources\V1\User\UserStatusCollection;
use App\Http\Resources\V1\User\UserStatusResource;

class UserStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userStatuses = UserStatus::all();
        if (!$userStatuses->count() > 0) {
            return response()->json([
                'status' => 404,
                'message' => 'User status not found'
            ], 404);
        } else {
            return response()->json([
                'status' => 200,
                'user statuses' => new UserStatusCollection($userStatuses)
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
    public function store(StoreUserStatusRequest $request)
    {
        $userStatusStore = UserStatus::create($request->all());

        if ($userStatusStore) {
            return response()->json([
                'status' => 200,
                'message' => 'User Status Store Successfully',
                'user status' => new UserStatusResource($userStatusStore)

            ], 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($userStatusId)
    {
        $userStatus = UserStatus::find($userStatusId);

        if (!$userStatus) {
            return response()->json([
                'status' => 404,
                'message' => 'User status not found'
            ], 404);
        } else {
            return response()->json([
                'status' => 200,
                'user status' => new UserStatusResource($userStatus)
            ], 200);
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserStatus $userStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserStatusRequest $request, $statusId)
    {
        $userStatus = UserStatus::find($statusId);

        if ($userStatus) {
            $userStatus->update($request->all());
            return response()->json([
                'status' => 200,
                'message' => 'User Status Updated Successfully '
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No  User Status Records Found '
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($userStatusId)
    {
        $userStatus = UserStatus::find($userStatusId);

        if ($userStatus) {
            $userStatus->delete();
            return response()->json([
                'status' => 200,
                'message' => 'User Staus Deleted Successfully '
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'NO  User Status Records Found '
            ], 404);
        }
    }
}
