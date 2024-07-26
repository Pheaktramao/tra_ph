<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BranchResource extends JsonResource
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
            'name' => $this->name,
            'address' => $this->address,
            'company' =>$this->company->name,
            'first_name' => $this->user->first_name,
            'last_name' => $this->user->last_name,
            // 'user' =>$this->user_id->first_name,
            "id" => $this->id,
            "name" => $this->name,
            "user" => [
                "id" => $this->user->id,
                "first_name" => $this->user->first_name,
                "last_name" => $this->user->last_name,
                "email" => $this->user->email,
                'create' => $this->created_at->format('d/m/Y'),
                'update' => $this->updated_at->format('d/m/Y'),
            ],
            "company" => [
                "id" => $this->company->id,
                "name" => $this->company->name,
                "address" => $this->company->address,
                'create' => $this->created_at->format('d/m/Y'),
                'update' => $this->updated_at->format('d/m/Y'),
            ],
            'create' => $this->created_at->format('d/m/Y'),
            'update' => $this->updated_at->format('d/m/Y'),
        ];
    }
}
