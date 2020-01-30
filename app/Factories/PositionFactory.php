<?php

namespace App\Factories;

use App\Models\Position;

class PositionFactory
{
    /** @var CompanyFactory */
    private $companyFactory;

    public function __construct(CompanyFactory $companyFactory)
    {
        $this->companyFactory = $companyFactory;
    }

    public function create(
        int $id,
        string $title,
        int $salary,
        int $minimalExperienceInYears,
        string $companyName
    ): Position {
        $position = new Position();
        $position->setId($id);
        $position->setTitle($title);
        $position->setSalary($salary);
        $position->setMinimalExperienceInYears($minimalExperienceInYears);
        $position->setCompany($this->companyFactory->create($companyName));

        return $position;
    }
}
