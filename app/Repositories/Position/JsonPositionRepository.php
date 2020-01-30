<?php

namespace App\Repositories\Position;

use App\Collections\PositionCollection;
use App\Factories\PositionFactory;
use App\Models\Position;
use App\Services\JsonParser;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class JsonPositionRepository implements PositionRepository
{
    /** @var array */
    private $positionsData;

    /** @var PositionFactory */
    private $positionFactory;

    public function __construct(string $pathToFile, JsonParser $jsonParser, PositionFactory $positionFactory)
    {
        $this->positionsData = $jsonParser->parseFile($pathToFile);
        $this->positionFactory = $positionFactory;
    }

    public function all(): PositionCollection
    {
        $positionsCollection = new PositionCollection();

        foreach ($this->positionsData as $positionData) {
            $position = $this->positionFactory->create(
                $positionData['id'],
                $positionData['title'],
                $positionData['salary'],
                $positionData['minimal_experience_in_years'],
                $positionData['company_name']
            );

            $positionsCollection->add($position);
        }

        return $positionsCollection;
    }

    public function findById(int $id): Position
    {
        $key = array_search($id, array_column($this->positionsData, 'id'));

        if ($key === false) {
            throw new NotFoundHttpException();
        }

        $positionData = $this->positionsData[$key];

        return $this->positionFactory->create(
            $positionData['id'],
            $positionData['title'],
            $positionData['salary'],
            $positionData['minimal_experience_in_years'],
            $positionData['company_name']
        );
    }
}
