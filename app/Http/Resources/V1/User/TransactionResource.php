<?php

namespace App\Http\Resources\V1\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'transactionId' => $this->transaction_id,
            'userId' => $this->user_id,
            'amount' => $this->amount,
            'transactionStatus' => new TransactionStatusResource($this->transactionStatus),
            'createdAt' => $this->created_at

        ];

    }
}
