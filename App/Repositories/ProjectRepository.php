<?php
class ProjectRepository
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getById(int $id): ?Project
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

    public function save(Project $project): void
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

    public function delete(Project $project): void
    {
        $stmt = $this->db->prepare("DELETE FROM projects WHERE id = ?");
        $stmt->execute([$project->getId()]);
    }
}
