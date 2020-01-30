<?php

namespace App\Services;

use App\Models\Position;
use App\Models\Summary;

class RelatedChecker
{
    public function isRelatedPositionAndSummary(Position $position, Summary $summary): bool
    {
        return $position->getMinimalExperienceInYears() < $summary->getExperienceInYears() &&
            !$summary->getPreviousCompanies()->contains($position->getCompany());
    }
}
