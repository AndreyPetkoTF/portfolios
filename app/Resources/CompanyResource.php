<?php

namespace App\Resources;

use App\Models\Company;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Company */
class CompanyResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name' => $this->getName(),
        ];
    }
}
