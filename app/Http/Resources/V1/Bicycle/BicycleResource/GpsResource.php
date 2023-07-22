<?php

namespace App\Http\Resources\V1\Bicycle\BicycleResource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GpsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'gpsPointsLang'=> $this->gps_points_lang,
            'gpsPointsLong'=> $this->gps_points_long,
            'createdAt' => $this->created_at
        ];
    }
}
