<?php
class TaskUserRepository
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function add(UserTask $userTask)
    {
        $stmt = $this->db->prepare("INSERT INTO users_tasks (task_id, user_id) VALUES (?, ?)");
        $stmt->execute([$userTask->getTaskId(), $userTask->getUserId()]);

        $userTask->setId($this->db->lastInsertId());
    }

    public function remove(UserTask $userTask)
    {
        $stmt = $this->db->prepare("DELETE FROM users_tasks WHERE id = ?");
        $stmt->execute([$userTask->getId()]);
    }
}
