<?php

namespace App\Http\Resources\V1\User\UserResource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserPathResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'startLong' => $this->start_long,
            'startLang' => $this->start_lang,
            'endLong' => $this->end_long,
            'endLang' => $this->end_lang,
            'startLocation' => $this->start_location,
            'endLocation' => $this->end_location,
            'distance' => $this->distance,
        ];
    }
}
