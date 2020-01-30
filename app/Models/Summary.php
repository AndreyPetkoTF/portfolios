<?php
declare(strict_types=1);

namespace App\Models;

use App\Collections\CompanyCollection;

class Summary
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var string */
    private $description;

    /** @var int */
    private $experienceInYears;

    /** @var CompanyCollection */
    private $previousCompanies;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getExperienceInYears(): int
    {
        return $this->experienceInYears;
    }

    /**
     * @param int $experienceInYears
     */
    public function setExperienceInYears(int $experienceInYears): void
    {
        $this->experienceInYears = $experienceInYears;
    }

    /**
     * @return CompanyCollection
     */
    public function getPreviousCompanies(): CompanyCollection
    {
        return $this->previousCompanies;
    }

    /**
     * @param CompanyCollection $previousCompanies
     */
    public function setPreviousCompanies(CompanyCollection $previousCompanies): void
    {
        $this->previousCompanies = $previousCompanies;
    }
}
