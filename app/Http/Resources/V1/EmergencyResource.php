<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmergencyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'emergencyId' => $this->emergency_id,
            'bicycleId' => $this->bicycle_id,
            'emegencyStatusId' => $this->emergency_status_id,
            'lang' => $this->lang,
            'long' => $this->long,
            'date' => $this->date,
            'time' => $this->time,
            'description' => $this->description,
            'createdAt' =>$this->created_

        ];
    }
}
