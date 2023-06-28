<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\UserContact;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreUserContactRequest;
use App\Http\Requests\V1\UpdateUserContactRequest;

class UserContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserContact $userContact)
    {
        //
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
    public function update(UpdateUserContactRequest $request, UserContact $userContact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserContact $userContact)
    {
        //
    }
}
