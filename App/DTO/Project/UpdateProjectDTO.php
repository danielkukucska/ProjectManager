<?php
class UpdateProjectDTO
{
    private string $name;
    private string $description;
    private DateTime $startDate;
    private DateTime $endDate;
    private int $ownerId;

    //TODO check contructor params
    public function __construct(string $name, string $description, DateTime $startDate, DateTime $endDate, int $ownerId)
    {
        $this->name = $name;
        $this->description = $description;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->ownerId = $ownerId;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getStartDate()
    {
        return $this->startDate;
    }

    public function getEndDate()
    {
        return $this->endDate;
    }

    public function getOwnerId()
    {
        return $this->ownerId;
    }
}
