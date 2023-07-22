<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WeatherResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'recentActivityId' => $this->recent_activity_id,
            'windSpeed' => $this->wind_speed,
            'temperature'=> $this->temperature,
            'visibility' => $this->visibility,
            'humidity' => $this->humidity,
            'weatherStatus' => $this->weather_status
        ];
    }
}
