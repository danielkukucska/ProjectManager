<?php
class ProjectRepository
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAll()
    {
        $stmt = $this->db->prepare("SELECT * FROM projects");
        $stmt->execute();
        $rows = $stmt->fetchAll();

        $projects = [];
        foreach ($rows as $row) {
            $project = new Project($row["id"], $row["name"], $row["description"], new DateTime($row["start_date"]), new DateTime($row["end_date"]), $row["owner_id"]);
            $projects[] = $project;
        }

        return $projects;
    }

    public function getAllByOwnerId(int $ownerId)
    {
        $stmt = $this->db->prepare("SELECT * FROM projects WHERE owner_id = ?");
        $stmt->execute([$ownerId]);
        $rows = $stmt->fetchAll();

        $projects = [];
        foreach ($rows as $row) {
            $project = new Project($row["id"], $row["name"], $row["description"], new DateTime($row["start_date"]), new DateTime($row["end_date"]), $row["owner_id"]);
            $projects[] = $project;
        }

        return $projects;
    }

    public function getById(int $id)
    {
        $stmt = $this->db->prepare("SELECT * FROM projects WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch();

        if ($row) {
            return new Project($row["id"], $row["name"], $row["description"], new DateTime($row["start_date"]), new DateTime($row["end_date"]), $row["owner_id"]);
        } else {
            return null;
        }
    }

    public function save(Project $project)
    {
        if ($project->getId()) {
            $stmt = $this->db->prepare("UPDATE projects SET name = ?, description = ?, start_date = ?, end_date = ?, owner_id = ? WHERE id = ?");
            $stmt->execute([$project->getName(), $project->getDescription(), $project->getStartDate()->format("Y-m-d H:i:s"), $project->getEndDate()->format("Y-m-d H:i:s"), $project->getOwnerId(), $project->getId()]);
        } else {
            $stmt = $this->db->prepare("INSERT INTO projects (name, description, start_date, end_date, owner_id) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$project->getName(), $project->getDescription(), $project->getStartDate()->format("Y-m-d H:i:s"), $project->getEndDate()->format("Y-m-d H:i:s"), $project->getOwnerId()]);
            $project->setId((int) $this->db->lastInsertId());
        }
    }

    public function delete(int $projectId)
    {
        $stmt = $this->db->prepare("DELETE FROM projects WHERE id = ?");
        $stmt->execute([$projectId]);
    }

    public function getProgress(int $projectId)
    {
        $stmt = $this->db->prepare("SELECT tasks.id as task_id, tasks.name AS task_name, users.email as user_email, users.name AS user_name, timesheet_cells.date, timesheet_cells.hours_worked
                                        FROM timesheet_cells
                                        JOIN timesheet_lines ON timesheet_cells.timesheet_line_id = timesheet_lines.id
                                        JOIN tasks ON timesheet_lines.task_id = tasks.id
                                        JOIN timesheets ON timesheet_lines.timesheet_id = timesheets.id
                                        JOIN users ON timesheets.user_id = users.id
                                        JOIN users_tasks ON tasks.id = users_tasks.task_id AND users_tasks.user_id = users.id
                                        JOIN projects ON tasks.project_id = projects.id
                                        WHERE timesheet_cells.hours_worked > 0
                                        AND projects.id = ?");
        $stmt->execute([$projectId]);
        $rows = $stmt->fetchAll();

        $projectProgress = [];
        foreach ($rows as $row) {
            $project = new ViewProjectProgressDTO($row["task_id"], $row["task_name"], $row["user_name"], $row["user_email"], new DateTime($row["date"]), $row["hours_worked"]);
            $projectProgress[] = $project;
        }

        return $projectProgress;
    }
}
