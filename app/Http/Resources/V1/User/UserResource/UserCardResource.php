<?php

namespace App\Http\Resources\V1\User\UserResource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserCardResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [

            'cardNumber' => $this->card_number,
            'securityNumber' => $this->security_number,
        ];
    }

}
