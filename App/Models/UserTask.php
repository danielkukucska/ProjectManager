<?php
class UserTask
{
    private int $id;
    private int $taskId;
    private int $userId;

    public function __construct(int $taskId, int $userId, int $id = null)
    {
        $this->id = $id;
        $this->taskId = $taskId;
        $this->userId = $userId;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getTaskId()
    {
        return $this->taskId;
    }

    public function getUserId()
    {
        return $this->userId;
    }
}
