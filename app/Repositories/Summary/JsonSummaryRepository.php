<?php

namespace App\Repositories\Summary;

use App\Collections\SummaryCollection;
use App\Factories\SummaryFactory;
use App\Models\Summary;
use App\Services\JsonParser;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class JsonSummaryRepository implements SummaryRepository
{
    /** @var array */
    private $summariesData;

    /** @var SummaryFactory */
    private $summaryFactory;

    public function __construct(string $pathToFile, JsonParser $jsonParser, SummaryFactory $summaryFactory)
    {
        $this->summariesData = $jsonParser->parseFile($pathToFile);
        $this->summaryFactory = $summaryFactory;
    }

    public function all(): SummaryCollection
    {
        $summaryCollection = new SummaryCollection();

        foreach ($this->summariesData as $summaryData) {
            $summary = $this->summaryFactory->create(
                $summaryData['id'],
                $summaryData['name'],
                $summaryData['description'],
                $summaryData['experience_in_years']
            );

            $summaryCollection->add($summary);
        }

        return $summaryCollection;
    }

    public function allWithRelations(): SummaryCollection
    {
        $summaryCollection = new SummaryCollection();

        foreach ($this->summariesData as $summaryData) {
            $summary = $this->summaryFactory->create(
                $summaryData['id'],
                $summaryData['name'],
                $summaryData['description'],
                $summaryData['experience_in_years'],
                $summaryData['previous_companies']
            );

            $summaryCollection->add($summary);
        }

        return $summaryCollection;
    }

    public function findById(int $id): Summary
    {
        $key = array_search($id, array_column($this->summariesData, 'id'));

        if ($key === false) {
            throw new NotFoundHttpException();
        }

        $summaryData = $this->summariesData[$key];

        return $this->summaryFactory->create(
            $summaryData['id'],
            $summaryData['name'],
            $summaryData['description'],
            $summaryData['experience_in_years'],
            $summaryData['previous_companies']
        );
    }
}
