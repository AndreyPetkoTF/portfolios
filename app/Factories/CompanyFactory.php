<?php

namespace App\Factories;

use App\Models\Company;

class CompanyFactory
{
    public function create(string $name): Company
    {
        return new Company($name);
    }
}
