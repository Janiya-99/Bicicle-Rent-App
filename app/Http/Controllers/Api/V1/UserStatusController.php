<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\UserStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserStatusRequest;
use App\Http\Requests\UpdateUserStatusRequest;
use App\Http\Resources\V1\UserStatusCollection;
use App\Http\Resources\V1\UserStatusResource;

class UserStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return UserStatus::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return new UserStatusCollection(UserStatus::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserStatusRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($userStatus)
    {
        $userStatus = UserStatus::where('status_id', $userStatus)->first();

        if (!$userStatus) {
            return response()->json(['message' => 'User status not found'], 404);
        }

        return new UserStatusResource($userStatus);
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
    public function update(UpdateUserStatusRequest $request, UserStatus $userStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserStatus $userStatus)
    {
        //
    }
}
