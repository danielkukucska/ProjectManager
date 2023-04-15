<?php
class CreateUserTaskDTO
{
    private string $userId;
    private string $taskId;

    public function __construct(int $userId, int $taskId)
    {
        $this->userId = $userId;
        $this->taskId = $taskId;
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
