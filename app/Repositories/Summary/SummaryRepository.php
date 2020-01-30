<?php

namespace App\Repositories\Summary;

use App\Collections\SummaryCollection;
use App\Models\Summary;

interface SummaryRepository
{
    public function all(): SummaryCollection;

    public function allWithRelations(): SummaryCollection;

    public function findById(int $id): Summary;
}

