<?php

namespace App\Http\Resources\V1\Bicycle;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BicycleTypeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'bicycleTypeId'=>$this->id,
            'type' => $this->type,
        ];
    }
}
