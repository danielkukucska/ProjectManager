<?php
class CreateTaskDTO
{
    private string $name;
    private string $description;
    private int $projectId;
    private string $status;

    public function __construct(string $name, string $description, int $projectId, string $status)
    {
        $this->name = $name;
        $this->description = $description;
        $this->projectId = $projectId;
        $this->status = $status;
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
