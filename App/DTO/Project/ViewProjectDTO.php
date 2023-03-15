<?php
class ViewProjectDTO
{
    private int $id;
    private string $name;
    private string $description;
    private DateTime $startDate;
    private DateTime $endDate;
    private ViewUserDTO $owner;

    public function __construct(Project $project, ViewUserDTO $owner)
    {
        $this->id = $project->getId();
        $this->name = $project->getName();
        $this->description = $project->getDescription();
        $this->startDate = $project->getStartDate();
        $this->endDate = $project->getEndDate();
        $this->owner = $owner;
    }

    public function getId()
    {
        return $this->id;
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

    public function getOwner()
    {
        return $this->owner;
    }
}
