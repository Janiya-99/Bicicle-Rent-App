<?php

namespace App\Http\Resources\V1\Bicycle;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class StationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'stationId' => $this->station_id,
            'name' => $this->name,
            'lang' => $this->lang,
            'long' => $this->long,
            'description' => $this->description,
            'isOpen' => $this->is_open,
            'addressLine1' => $this->address_line_1,
            'addressLine' => $this->address_line_2,
            'addressLine3' => $this->address_line_3,
        ];
    }
}
