<?php

namespace App\Services;

use App\Collections\PositionCollection;
use App\Models\Position;
use App\Models\Summary;
use App\Repositories\Position\PositionRepository;
use App\Repositories\Summary\SummaryRepository;

class PositionService
{
    /** @var PositionRepository */
    private $positionRepository;

    /** @var SummaryRepository */
    private $summaryRepository;

    /** @var RelatedChecker */
    private $relatedChecker;

    public function __construct(
        PositionRepository $positionRepository,
        SummaryRepository $summaryRepository,
        RelatedChecker $relatedChecker
    ) {
        $this->positionRepository = $positionRepository;
        $this->summaryRepository = $summaryRepository;
        $this->relatedChecker = $relatedChecker;
    }

    public function all(): PositionCollection
    {
        return $this->positionRepository->all();
    }

    public function find(int $id): Position
    {
        return $this->positionRepository->findById($id);
    }

    public function related(int $summaryId): PositionCollection
    {
        $summary = $this->summaryRepository->findById($summaryId);
        $positions = $this->positionRepository->all();
        $relatedPositions = new PositionCollection();

        /** @var Position $position */
        foreach ($positions as $position) {
            if ($this->relatedChecker->isRelatedPositionAndSummary($position, $summary)) {
                $relatedPositions->add($position);
            }
        }

        return $relatedPositions;
    }
}
