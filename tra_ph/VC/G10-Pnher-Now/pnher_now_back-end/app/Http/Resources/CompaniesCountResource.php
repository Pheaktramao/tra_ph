<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompaniesCountResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $this->load('company');
        $totalCompanies = $this->company ? $this->company->count() : 0;

        return [
            "id" => $this->id,
            "name" => $this->name,
            "address" => $this->address,
            "total_company" => $totalCompanies,
        ];

    }

}
