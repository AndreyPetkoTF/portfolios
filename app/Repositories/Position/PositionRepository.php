<?php

namespace App\Repositories\Position;

use App\Collections\PositionCollection;
use App\Models\Position;

interface PositionRepository
{
    public function all(): PositionCollection;

    public function findById(int $id): Position;
}
