<?php
class Task
{
    private ?int $id;
    private string $name;
    private string $description;
    private int $projectId;
    private string $status;

    public function __construct(?int $id, string $name, string $description, int $projectId, string $status)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->projectId = $projectId;
        $this->status = $status;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    public function getProjectId()
    {
        return $this->projectId;
    }

    public function setProjectId(int $projectId)
    {
        $this->projectId = $projectId;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus(string $status)
    {
        $this->status = $status;
    }
}
