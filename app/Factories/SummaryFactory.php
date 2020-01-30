<?php

namespace App\Factories;

use App\Collections\CompanyCollection;
use App\Models\Summary;

class SummaryFactory
{
    /** @var CompanyFactory */
    private $companyFactory;

    public function __construct(CompanyFactory $companyFactory)
    {
        $this->companyFactory = $companyFactory;
    }

    public function create(
        int $id,
        string $name,
        string $description,
        int $experienceInYears,
        array $previousCompanies = null
    ): Summary {
        $summary = new Summary();
        $summary->setId($id);
        $summary->setName($name);
        $summary->setDescription($description);
        $summary->setExperienceInYears($experienceInYears);

        if ($previousCompanies != null) {
            $companyCollection = new CompanyCollection();

            foreach ($previousCompanies as $previousCompany) {
                $companyCollection->add(
                    $this->companyFactory->create($previousCompany)
                );
            }

            $summary->setPreviousCompanies($companyCollection);
        }

        return $summary;
    }
}
