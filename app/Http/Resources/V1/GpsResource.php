<?php

namespace App\Http\Resources\V1;

use App\Http\Resources\V1\Bicycle\BicycleResource\BicycleResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\V1\User\UserResource\UserPathResource;

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
            'gpsId' => $this->gps_id,
            'pathId'=> new UserPathResource($this->path),
            'bicycleId'=> new BicycleResource($this->bicycle),
            'gpsPointsLang'=> $this->gps_points_lang,
            'gpsPointsLong'=> $this->gps_points_long,
            'createdAt' => $this->created_at
        ];
    }
}
