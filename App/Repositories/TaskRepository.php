<?php
class TaskRepository
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getByUserId(int $userId)
    {
        $stmt = $this->db->prepare("SELECT * FROM tasks WHERE user_id = ?");
        $stmt->execute([$userId]);
        $rows = $stmt->fetch();

        $tasks = [];
        foreach ($rows as $row) {
            $task = new Task($row['id'], $row['name'], $row['description'], $row['project_id'], $row['status']);
            $tasks[] = $task;
        }

        return $tasks;
    }

    public function getById(int $id)
    {
        $stmt = $this->db->prepare("SELECT * FROM tasks WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch();

        if ($row) {
            return new Task($row['id'], $row['name'], $row['description'], $row['project_id'], $row['status']);
        } else {
            return null;
        }
    }

    public function getByProjectId(int $projectId)
    {
        $stmt = $this->db->prepare("SELECT * FROM tasks WHERE project_id = ?");
        $stmt->execute([$projectId]);
        $rows = $stmt->fetchAll();

        $tasks = [];
        foreach ($rows as $row) {
            $tasks[] = new Task($row['id'], $row['name'], $row['description'], $row['project_id'], $row['status']);
        }

        return $tasks;
    }

    public function save(Task $task)
    {
        if ($task->getId()) {
            $stmt = $this->db->prepare("UPDATE tasks SET name = ?, description = ?, project_id = ?, status = ? WHERE id = ?");
            $stmt->execute([$task->getName(), $task->getDescription(), $task->getProjectId(), $task->getStatus(), $task->getId()]);
        } else {
            $stmt = $this->db->prepare("INSERT INTO tasks (name, description, project_id, status) VALUES (?, ?, ?, ?)");
            $stmt->execute([$task->getName(), $task->getDescription(), $task->getProjectId(), $task->getStatus()]);

            $task->setId((int) $this->db->lastInsertId());
        }
    }

    public function delete(Task $task)
    {
        $stmt = $this->db->prepare("DELETE FROM tasks WHERE id = ?");
        $stmt->execute([$task->getId()]);
    }
}
