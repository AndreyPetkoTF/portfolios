<?php


namespace App\Resources;

use App\Models\Summary;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Summary */
class SummaryCollectionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'experience_in_years' => $this->getExperienceInYears(),
        ];
    }
}
