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
                'message' => 'No User Records Found '
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
        $user = User::create($request->all());

        return response()->json([
            'status' => 200,
            'message' => 'User created successfully',
            'user' => new UserResource($user)
        ], 200);
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
                'message' => 'No  User Record Found '
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
    public function update(UpdateUserRequest $request, $userId)
    {
        $user = User::find($userId);
        $user->update($request->all());

        return response()->json([
            'status' => 200,
            'message' => 'User  Updated Successfully',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($userId)
    {
        $user = User::find($userId);
        if ($user) {

            $user->delete();
            return response()->json([
                'status' => 200,
                'message' => 'User Deleted Successfully '
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'NO  User Record Found '
            ], 404);
        }
    }
}
