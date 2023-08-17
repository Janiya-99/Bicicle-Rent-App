<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Employ;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\EmployResource;
use App\Http\Resources\V1\EmployCollection;
use App\Http\Requests\V1\StoreEmployRequest;
use App\Http\Requests\V1\UpdateEmployRequest;

class EmployController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employ = Employ::all();

        if($employ->count() > 0 ){
            return response()->json([
                'status' => 200,
                'employees' => new EmployCollection($employ)
            ], 200);
        } else{
            return response()->json([
                'status' => 404,
                'message' =>'Employees Records Not Found'
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
    public function store(StoreEmployRequest $request)
    {
        $storeEmploy = Employ::create($request->all());

        if($storeEmploy){
            return response()->json([
                'status' => 200,
                'employ' => new EmployResource($storeEmploy)
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Employ $employ)
    {

        if($employ){
            return response()->json([
                'status' => 200,
                'employ' => new EmployResource($employ)
            ], 200);
        }else {
            return response()->json([
                'status' => 404,
                'message' => 'Employ Not Found'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employ $employ)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployRequest $request,  Employ $employ)
    {

        if($employ){
            $employ->update($request->all());

            return response()->json([
                'status' => 200,
                'message' => 'Employ Updated Succesfully'
            ], 200);
        }else {
            return response()->json([
                'status' => 404,
                'message' => 'Employ Record Not Found'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employ $employ)
    {
        if($employ){

            $employ->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Employ Deleted Succesfully'
            ], 200);
        }else {
            return response()->json([
                'status' => 404,
                'message' => 'Employ Record Not Found'
            ], 404);
        }
    }
}
