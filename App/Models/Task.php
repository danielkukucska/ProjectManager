<?php
class Task
{
    private int $id;
    private string $name;
    private string $description;
    private int $project_id;
    private array $assignees;
    private string $status;

    public function __construct($name, $description, $project_id, $assignees = [], $status)
    {
        $this->name = $name;
        $this->description = $description;
        $this->project_id = $project_id;
        $this->assignees = $assignees;
        $this->status = $status;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getProjectId()
    {
        return $this->project_id;
    }

    public function setProjectId($project_id)
    {
        $this->project_id = $project_id;
    }

    public function getAssignees()
    {
        return $this->assignees;
    }

    public function addAssignee($user)
    {
        $this->assignees[] = $user;
    }

    public function removeAssignee($assigneeId)
    {
        foreach ($this->assignees as $key => $assignee) {
            if ($assignee->getId() == $assigneeId) {
                unset($this->assignees[$key]);
                return true;
            }
        }
        return false;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }
}
