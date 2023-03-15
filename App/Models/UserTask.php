<?php
class UserTask
{
    private ?int $id;
    private int $userId;
    private int $taskId;

    //TODO where to handle id = userId_taskId
    public function __construct(?int $id,  int $userId, int $taskId,)
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->taskId = $taskId;
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
