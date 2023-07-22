<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\TransactionStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreTransactionStatusRequest;
use App\Http\Requests\V1\UpdateTransactionStatusRequest;
use App\Http\Resources\V1\User\TransactionStatusCollection;
use App\Http\Resources\V1\User\TransactionStatusResource;

class TransactionStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactionStatus = TransactionStatus::all();

        if($transactionStatus->count() > 0){
            return response()->json([
                'status' => 200,
                'transaciton statuses' => new TransactionStatusCollection($transactionStatus)
            ],200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Transaction Statuses Records Not Found'
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
    public function store(StoreTransactionStatusRequest $request)
    {
        $storeTransactonStatus = TransactionStatus::create($request->all());

        if($storeTransactonStatus){
            return response()->json([
                'status' => 200,
                'transaciton status' => new TransactionStatusResource($storeTransactonStatus)
            ],200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($transactionStatusId)
    {
        $transactionStatus = TransactionStatus::find($transactionStatusId);
        if($transactionStatus){
            return response()->json([
                'status' => 200,
                'transaciton status' => new TransactionStatusResource($transactionStatus)
            ],200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Transaction Status Records Not Found'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TransactionStatus $transactionStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransactionStatusRequest $request, TransactionStatus $transactionStatus)
    {
        if($transactionStatus){
            $transactionStatus->update($request->all());
            return response()->json([
                'status' => 200,
                'message' =>'Transaction Status Updated Successfully'
            ],200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Transaction Status Records Not Found'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TransactionStatus $transactionStatus)
    {
        if($transactionStatus){
            $transactionStatus->delete;
            return response()->json([
                'status' => 200,
                'message' =>'Transaction Status Deleted Successfully'
            ],200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Transaction Status Records Not Found'
            ], 404);
        }
    }
}
