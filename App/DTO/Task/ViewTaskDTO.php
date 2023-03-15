<?php
class ViewTaskDTO
{
    private string $id;
    private string $name;
    private string $description;
    private int $projectId;
    private string $status;
    private array $assignees;

    public function __construct(Task $task, array $assignees)
    {
        $this->id = $task->getID();
        $this->name = $task->getName();
        $this->description = $task->getDescription();
        //TODO expand? not necessary because user flow, no place in app where you have task and not the project, maybe timesheet?
        $this->projectId = $task->getProjectId();
        $this->status = $task->getStatus();
        $this->assignees = $assignees;
    }

    public function getID()
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
