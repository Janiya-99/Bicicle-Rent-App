<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Transaction;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Http\Resources\V1\User\TransactionCollection;
use App\Http\Resources\V1\User\TransactionResource;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $transactions = Transaction::all();

        if ($transactions->count() > 0) {
            return response()->json([
                'status' => 200,
                'transactions' => new TransactionCollection($transactions)
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
    public function store(StoreTransactionRequest $request)
    {
        $transaction = Transaction::create($request->all());

        return response()->json([
            'status' => 200,
            'message' => 'Transaction created successfully',
            'transaction' => new TransactionResource($transaction)
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {

        if (!$transaction) {
            return response()->json([
                'status' => 404,
                'message' => 'NO Records Found '
            ], 404);
        } else {
            return response()->json([
                'status' => 200,
                'transaction' => new TransactionResource($transaction)
            ], 200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransactionRequest $request, $transactionId)
    {
        $transaction = Transaction::find($transactionId);

        if (!$transaction) {
            return response()->json([
                'status' => 404,
                'message' => 'Transaction not found'
            ], 404);
        }

        $transaction->update($request->all());

        return response()->json([
            'status' => 200,
            'message' => 'Transaction Updated Successfully',
        ], 200);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        if ($transaction) {

            $transaction->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Transaction Deleted Successfully '
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'NO  Transaction Records Found '
            ], 404);
        }
    }
}
