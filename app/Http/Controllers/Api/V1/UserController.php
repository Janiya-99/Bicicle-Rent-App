<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\User\UserResource;
use App\Http\Requests\V1\StoreUserRequest;
use App\Http\Requests\V1\UpdateUserRequest;
use App\Http\Resources\V1\User\UserCollection;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        if ($users->count() > 0) {
            return response()->json([
                'status' => 200,
                'users' => new UserCollection($users)
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'NO Records Found '
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
    public function store(StoreUserRequest $request)
    {
        return new UserResource(User::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        if ($user) {
            return response()->json([
                'status' => 200,
                'users' =>  new UserResource($user)
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'NO  User Records Found '
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ($user) {

            $user->delete();
            return response()->json([
                'status' => 200,
                'message' => 'User Deleted Successfully '
            ], 200);

        } else {
            return response()->json([
                'status' => 404,
                'message' => 'NO  User Records Found '
            ], 404);
        }
    }
}
