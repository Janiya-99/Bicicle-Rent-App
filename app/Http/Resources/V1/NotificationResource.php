<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'description'=>$this->description,
            'title'=>$this->title,
            'date'=>$this->date,
            'time'=>$this->time,
            'createdAt'=>$this->created_at,
        ];
    }
}
