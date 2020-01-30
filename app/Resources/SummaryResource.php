<?php

namespace App\Resources;

use App\Models\Summary;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Summary */
class SummaryResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'experience_in_years' => $this->getExperienceInYears(),
            'previous_companies' => CompanyResource::collection($this->getPreviousCompanies()),
        ];
    }
}
