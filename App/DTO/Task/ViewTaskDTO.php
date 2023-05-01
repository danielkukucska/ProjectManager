<?php
class ViewTaskDTO
{
    private int $id;
    private string $name;
    private string $description;
    private int $projectId;
    private string $status;
    private array $assignees;

    public function __construct(Task $task, array $assignees)
    {
        $this->id = $task->getId();
        $this->name = $task->getName();
        $this->description = $task->getDescription();
        $this->projectId = $task->getProjectId();
        $this->status = $task->getStatus();
        $this->assignees = $assignees;
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

    public function getProjectId()
    {
        return $this->projectId;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getAssignees()
    {
        return $this->assignees;
    }
}
