<?php
class UpdateTaskDTO
{
    private string $name;
    private string $description;
    private int $projectId;
    private string $status;

    public function __construct(int $projectId, string $name, string $description, string $status)
    {
        $this->projectId = $projectId;
        $this->name = $name;
        $this->description = $description;
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
