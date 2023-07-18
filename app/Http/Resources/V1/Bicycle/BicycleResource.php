<?php

namespace App\Http\Resources\V1\Bicycle;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BicycleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'bicycleId' => $this->bicycle_id,
            'typeId' => BicycleTypeResource::collection($this->type),
            'stationId' => $this->station_id,
            'statusId' => $this->status_id,
            'qr_code' => $this->qr_code,
            'liveLang' => $this->live_lang,
            'liveLong' => $this->live_long,
            'tempPin' => $this->temp_pin,
        ];
    }
}
