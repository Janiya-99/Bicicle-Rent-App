<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PathResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'pathId' => $this->path_id,
            'userId' => $this->user_id,
            'bicycleId' => $this->bicycle_id,
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
