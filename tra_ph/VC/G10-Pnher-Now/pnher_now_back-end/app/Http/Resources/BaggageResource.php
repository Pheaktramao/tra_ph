<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BaggageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,  // Assuming `name` is an attribute of `Baggage`
            'user' => [
                'id' => $this->user->id,
                'name' => $this->user->name,
            ],
            'deliveryStatus' => [
                'id' => $this->deliveryStatus->id,
                'name' => $this->deliveryStatus->name,
            ],
        ];
    }
}
