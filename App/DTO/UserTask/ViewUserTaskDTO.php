<?php
class ViewUserTaskDTO
{
    private int $id;
    private string $userId;
    private string $taskId;

    public function __construct(UserTask $userTask)
    {
        $this->id = $userTask->getId();
        $this->userId = $userTask->getUserId();
        $this->taskId = $userTask->getTaskId();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getTaskId()
    {
        return $this->taskId;
    }
}
