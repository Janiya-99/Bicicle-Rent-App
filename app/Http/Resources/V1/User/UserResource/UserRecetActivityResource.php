<?php

namespace App\Http\Resources\V1\User\UserResource;

use Illuminate\Http\Request;
use App\Http\Resources\V1\WeatherResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserRecetActivityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'weather' => WeatherResource::collection($this->weather),
            'date' => $this->date,
            'startTime' => $this->start_time,
            'endTime' => $this->end_time
        ];
    }
}
