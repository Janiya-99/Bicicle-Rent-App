<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\EmployContact;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\EmployContactResource;
use App\Http\Resources\V1\EmployContactCollection;
use App\Http\Requests\V1\StoreEmployContactRequest;
use App\Http\Requests\V1\UpdateEmployContactRequest;

class EmployContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employContact = EmployContact::all();

        if($employContact->count() > 0){
            return response()->json([
                'status' => 200,
                'employ contacts' => new EmployContactCollection($employContact)
            ],200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Gps Records Not Found'
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
    public function store(StoreEmployContactRequest $request)
    {
        $employContact = EmployContact::create($request->all());

        if($employContact){
            return response()->json([
                'status' => 200,
                'message' =>'Employ Contact Created Successfully',
                'employ contacts' => new EmployContactResource($employContact)
            ],200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Employ Contact Records Not Found'
            ], 404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($employContactId)
    {
        $employContact = EmployContact::find($employContactId);

        if($employContact){
            return response()->json([
                'status' => 200,
                'employ contacts' => new EmployContactResource($employContact)
            ],200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Employ Contact Record Not Found'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EmployContact $employContact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployContactRequest $request, EmployContact $employContact)
    {
        if($employContact){
            $employContact->update($request->all());

            return response()->json([
                'status' => 200,
                'message' => 'Employ Contact Updated Successfully'
            ],200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Employ Contact Record Not Found'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmployContact $employContact)
    {
        if($employContact){
            $employContact->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Employ Contact Deleted Successfully'
            ],200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Employ Contact Record Not Found'
            ], 404);
        }
    }
}
