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
        $rows = $stmt->fetch();

        $projects = [];
        foreach ($rows as $row) {
            $project = new Project($row['id'], $row['name'], $row['description'], $row['start_date'], $row['end_date'], $row['owner_id']);
            $projects[] = $project;
        }

        return $projects;
    }

    public function getByOwnerId(int $ownerId)
    {
        $stmt = $this->db->prepare("SELECT * FROM projects WHERE owner_id = ?");
        $stmt->execute([$ownerId]);
        $rows = $stmt->fetch();

        $projects = [];
        foreach ($rows as $row) {
            $project = new Project($row['id'], $row['name'], $row['description'], $row['start_date'], $row['end_date'], $row['owner_id']);
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
            return new Project($row['id'], $row['name'], $row['description'], $row['start_date'], $row['end_date'], $row['owner_id']);
        } else {
            return null;
        }
    }

    public function save(Project $project)
    {
        if ($project->getId()) {
            $stmt = $this->db->prepare("UPDATE projects SET name = ?, description = ?, start_date = ?, end_date = ? WHERE id = ?");
            $stmt->execute([$project->getName(), $project->getDescription(), $project->getStartDate(), $project->getEndDate(), $project->getId()]);
        } else {
            $stmt = $this->db->prepare("INSERT INTO projects (name, description, start_date, end_date) VALUES (?, ?, ?, ?)");
            $stmt->execute([$project->getName(), $project->getDescription(), $project->getStartDate(), $project->getEndDate()]);
            $project->setId((int) $this->db->lastInsertId());
        }
    }

    public function delete(Project $project)
    {
        $stmt = $this->db->prepare("DELETE FROM projects WHERE id = ?");
        $stmt->execute([$project->getId()]);
    }
}
