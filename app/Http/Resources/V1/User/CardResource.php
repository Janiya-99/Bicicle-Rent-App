<?php

namespace App\Http\Resources\V1\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CardResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'cardId' => $this->card_id,
            'userId' => $this->user_id,
            'cardNumber' => $this->card_number,
            'securityNumber' => $this->security_number,
        ];
    }

}
