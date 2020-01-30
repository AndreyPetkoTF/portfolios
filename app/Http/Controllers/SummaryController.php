<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Position;
use App\Resources\SummaryCollectionResource;
use App\Resources\SummaryResource;
use App\Services\SummaryService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class SummaryController extends Controller
{
    /** @var SummaryService */
    private $summaryService;

    public function __construct(SummaryService $summaryService)
    {
        $this->summaryService = $summaryService;
    }

    public function list(): AnonymousResourceCollection
    {
        return SummaryCollectionResource::collection($this->summaryService->all());
    }

    public function find(int $id): SummaryResource
    {
        return new SummaryResource($this->summaryService->find($id));
    }

    public function related(int $positionId): AnonymousResourceCollection
    {
        return SummaryCollectionResource::collection($this->summaryService->related($positionId));
    }
}
