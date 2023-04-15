<?php
class CreateTaskDTO
{
    private string $name;
    private string $description;
    private int $projectId;
    private string $status;

    public function __construct(string $name, string $description, int $projectId)
    {
        $this->name = $name;
        $this->description = $description;
        $this->projectId = $projectId;
        $this->status = "TO DO";
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getProjectId()
    {
        return $this->projectId;
    }

    public function getStatus()
    {
        return $this->status;
    }
}
