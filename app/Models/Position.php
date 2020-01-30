<?php

namespace App\Models;

class Position
{
    /** @var int */
    private $id;

    /** @var string */
    private $title;

    /** @var int */
    private $salary;

    /** @var int */
    private $minimalExperienceInYears;

    /** @var Company */
    private $company;

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
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return int
     */
    public function getSalary(): int
    {
        return $this->salary;
    }

    /**
     * @param int $salary
     */
    public function setSalary(int $salary): void
    {
        $this->salary = $salary;
    }

    /**
     * @return int
     */
    public function getMinimalExperienceInYears(): int
    {
        return $this->minimalExperienceInYears;
    }

    /**
     * @param int $minimalExperienceInYears
     */
    public function setMinimalExperienceInYears(int $minimalExperienceInYears): void
    {
        $this->minimalExperienceInYears = $minimalExperienceInYears;
    }

    /**
     * @return Company
     */
    public function getCompany(): Company
    {
        return $this->company;
    }

    /**
     * @param Company $company
     */
    public function setCompany(Company $company): void
    {
        $this->company = $company;
    }
}
