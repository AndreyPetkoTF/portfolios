<?php

namespace App\Services;

use App\Collections\SummaryCollection;
use App\Models\Position;
use App\Models\Summary;
use App\Repositories\Position\PositionRepository;
use App\Repositories\Summary\SummaryRepository;

class SummaryService
{
    /* @var SummaryRepository */
    private $summaryRepository;

    /** @var PositionRepository */
    private $positionRepository;

    /** @var RelatedChecker */
    private $relatedChecker;

    public function __construct(
        SummaryRepository $summaryRepository,
        PositionRepository $positionRepository,
        RelatedChecker $relatedChecker
    ) {
        $this->summaryRepository = $summaryRepository;
        $this->positionRepository = $positionRepository;
        $this->relatedChecker = $relatedChecker;
    }

    public function all(): SummaryCollection
    {
        return $this->summaryRepository->all();
    }

    public function find(int $id): Summary
    {
        return $this->summaryRepository->findById($id);
    }

    public function related(int $positionId): SummaryCollection
    {
        $position = $this->positionRepository->findById($positionId);

        $summaries = $this->summaryRepository->allWithRelations();
        $relatedSummaries = new SummaryCollection();

        /** @var Summary $summary */
        foreach ($summaries as $summary) {
            if ($this->relatedChecker->isRelatedPositionAndSummary($position, $summary)) {
                $relatedSummaries->add($summary);
            }
        }

        return $relatedSummaries;
    }
}
