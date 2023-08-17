<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\PaymentType;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\PaymentTypeResource;
use App\Http\Resources\V1\PaymentTypeCollection;
use App\Http\Requests\V1\StorePaymentTypeRequest;
use App\Http\Requests\V1\UpdatePaymentTypeRequest;

class PaymentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paymentType = PaymentType::all();

        if($paymentType->count() > 0) {
            return response()->json([
                'status' => 200,
                'paymentTypes' => new PaymentTypeCollection ($paymentType)
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Payment Type Found'
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
    public function store(StorePaymentTypeRequest $request)
    {
        $storePaymentType = PaymentType::create($request->all());

        return response()->json([
            'status' => 200,
            'message' => 'User created successfully',
            'user' => new PaymentTypeResource($storePaymentType)
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show( $paymentTypeId)
    {
        $paymentType = PaymentType::find($paymentTypeId);

        if($paymentType) {
            return response()->json([
                'status' => 200,
                'paymentTypes' => new PaymentTypeResource($paymentType)
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Payment Type Found'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaymentType $paymentType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaymentTypeRequest $request, $paymentTypeId)
    {
        $paymentType = PaymentType::find($paymentTypeId);

        if ($paymentType) {
            $paymentType->update($request->all());
            return response()->json([
                'status' => 200,
                'message' => 'Payment Type Updated Succesfully'
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'user contacts' =>'Payment Type Record Not Found'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaymentType $paymentType)
    {
        if ($paymentType) {
            $paymentType->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Payment Type Deleted Successfully '
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'NO  Payment Type Record Found '
            ], 404);
        }
    }
}
