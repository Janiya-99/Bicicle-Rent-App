<?php

namespace App\Http\Resources\V1\Bicycle\BicycleResource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\V1\Bicycle\BicycleResource\TypeResource;
use App\Http\Resources\V1\Bicycle\BicycleResource\BicycleStationResource;

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
            'typeId' => new TypeResource($this->bicycleType),
            'qrCode' => $this->qr_code,
            'liveLang' => $this->live_lang,
            'liveLong' => $this->live_long,
            'tempPin' => $this->temp_pin,
            'height' => $this->height,
            'weight' =>$this->weight,
            'manufactured' => $this->manufactured,
            'station' =>  new BicycleStationResource($this->station)
        ];
    }
}
