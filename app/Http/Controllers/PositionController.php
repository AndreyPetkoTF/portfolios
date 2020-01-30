<?php

namespace App\Http\Controllers;

use App\Resources\PositionResource;
use App\Services\PositionService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PositionController extends Controller
{
    /** @var PositionService */
    private $positionService;

    public function __construct(PositionService $positionService)
    {
        $this->positionService = $positionService;
    }

    public function list(): AnonymousResourceCollection
    {
        return PositionResource::collection($this->positionService->all());
    }

    public function find(int $id): PositionResource
    {
        return new PositionResource($this->positionService->find($id));
    }

    public function related(int $summaryId): AnonymousResourceCollection
    {
        return PositionResource::collection($this->positionService->related($summaryId));
    }
}
