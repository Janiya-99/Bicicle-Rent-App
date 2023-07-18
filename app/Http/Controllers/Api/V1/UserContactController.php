<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\UserContact;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreUserContactRequest;
use App\Http\Resources\V1\User\ContactCollection;
use App\Http\Requests\V1\UpdateUserContactRequest;
use App\Http\Resources\V1\User\ContactResource;

class UserContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userContacts = UserContact::all();
        if (!$userContacts->count() > 0) {
            return response()->json([
                'status' => 404,
                'message' => 'User Contacts not Found'
            ], 404);
        } else {
            return response()->json([
                'status' => 200,
                'user contacts' => new ContactCollection($userContacts)
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
    public function store(StoreUserContactRequest $request)
    {
        $storeUserContact = UserContact::create($request->all());

        if ($storeUserContact) {
            return response()->json([
                'status' => 200,
                'user contact' => new ContactResource($storeUserContact)
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($userContactId)
    {
        $userContact = UserContact::find($userContactId);

        if (!$userContact) {
            return response()->json([
                'status' => 404,
                'message' => 'User Contact not Found'
            ], 404);
        } else {
            return response()->json([
                'status' => 200,
                'user contacts' => new ContactResource($userContact)
            ], 200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserContact $userContacts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserContactRequest $request, $userContactId)
    {
        $userContact = UserContact::find($userContactId);

        if ($userContact) {
            $userContact->update($request->all());
            return response()->json([
                'status' => 200,
                'message' => 'User Contact Updated Successfully'
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'User Contact not Found'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($userContactId)
    {
        $userContact = UserContact::find($userContactId);

        if ($userContact) {
            $userContact->delete();
            return response()->json([
                'status' => 200,
                'message' => 'User Contact Deleted Successfully'
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'User Contact not Found'
            ], 404);
        }
    }
}
