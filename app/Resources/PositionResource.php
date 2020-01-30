<?php

namespace App\Resources;

use App\Models\Position;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Position */
class PositionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->getId(),
            'title' => $this->getTitle(),
            'salary' => $this->getSalary(),
            'minimal_experience_in_years' => $this->getMinimalExperienceInYears(),
            'company' => new CompanyResource($this->getCompany()),
        ];
    }
}
