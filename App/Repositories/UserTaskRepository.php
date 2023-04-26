<?php
class UserTaskRepository
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getById(int $id)
    {
        $stmt = $this->db->prepare("SELECT * FROM users_tasks WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch();

        if ($row) {
            return new UserTask($row["id"], $row["user_id"], $row["task_id"]);
        } else {
            return null;
        }
    }

    public function getByUserIdTaskId(int $userId, int $taskId)
    {
        $stmt = $this->db->prepare("SELECT * FROM users_tasks WHERE user_id = ? AND task_id = ?");
        $stmt->execute([$userId, $taskId]);
        $row = $stmt->fetch();

        if ($row) {
            return new UserTask($row["id"], $row["user_id"], $row["task_id"]);
        } else {
            return null;
        }
    }

    public function getAllByTaskId(int $taskId)
    {
        $stmt = $this->db->prepare("SELECT * FROM users_tasks WHERE task_id = ?");
        $stmt->execute([$taskId]);
        $rows = $stmt->fetchAll();

        $userTasks = [];
        foreach ($rows as $row) {
            $userTask = new UserTask($row["id"], $row["user_id"], $row["task_id"]);
            $userTasks[] = $userTask;
        }

        return $userTasks;
    }

    public function getAllByUserId(int $userId, int $exlcudeByTimesheetId = null)
    {
        echo $exlcudeByTimesheetId;
        $userTasks = [];
        if ($exlcudeByTimesheetId == null) {
            $stmt = $this->db->prepare("SELECT * FROM users_tasks WHERE user_id = ?");
            $stmt->execute([$userId]);
        } else {
            $stmt = $this->db->prepare("SELECT ut.* FROM users_tasks ut LEFT JOIN timesheet_lines tl ON ut.task_id = tl.task_id AND tl.timesheet_id = ? WHERE ut.user_id = ? AND tl.id IS NULL");
            $stmt->execute([$exlcudeByTimesheetId, $userId]);
        }
        $rows = $stmt->fetchAll();

       
        foreach ($rows as $row) {
            echo print_r($row);
            $userTask = new UserTask($row["id"], $row["user_id"], $row["task_id"]);
            $userTasks[] = $userTask;
        }
        return $userTasks;
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
