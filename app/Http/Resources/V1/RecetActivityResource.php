<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RecetActivityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'activityId' => $this->activity_id,
            'date' => $this->date,
            'startTime' => $this->start_time,
            'endTime' => $this->end_time
        ];
    }
}
