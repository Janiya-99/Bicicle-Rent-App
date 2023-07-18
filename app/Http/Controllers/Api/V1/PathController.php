<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Path;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePathRequest;
use App\Http\Resources\V1\PathResource;
use App\Http\Requests\UpdatePathRequest;
use App\Http\Resources\V1\PathCollection;

class PathController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paths = Path::all();

        if ($paths->count() > 0) {
            return response()->json([
                'status' => 200,
                'paths' => new PathCollection($paths)
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Paths Records Found'
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
    public function store(StorePathRequest $request)
    {
        $storePath = Path::create($request->all());

        if ($storePath) {
            return response()->json([
                'status' => 200,
                'path' => new PathResource($storePath)
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Path $path)
    {
        if($path){
            return response()->json([
                'status' =>200,
                'path' => new PathResource($path)
            ], 200);
        }else {
            return response()->json([
                'status' =>404,
                'message' => 'No path Record Found'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Path $path)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePathRequest $request, Path $path)
    {
        if($path){
            $path->update($request->all());

            return response()->json([
                'status' =>200,
                'message' => 'Path Updated Successfully'
            ], 200);
        }else {
            return response()->json([
                'status' =>404,
                'message' => 'No path Record Found'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Path $path)
    {
        if($path){
            $path->delete();
            return response()->json([
                'status' =>200,
                'message' => 'Path Deleted Successfully'
            ], 200);
        }else {
            return response()->json([
                'status' =>404,
                'message' => 'No path Record Found'
            ], 404);
        }
    }
}
