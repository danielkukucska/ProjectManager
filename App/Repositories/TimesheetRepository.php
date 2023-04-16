<?php

class TimesheetRepository
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAllByUserId(int $userId)
    {
        $stmt = $this->db->prepare("SELECT * FROM timesheets WHERE user_id = ?");
        $stmt->execute([$userId]);
        $rows = $stmt->fetchAll();

        $timesheets = [];
        foreach ($rows as $row) {
            $timesheet = new Timesheet($row["id"], $row["user_id"], new DateTime($row["start_date"]), new DateTime($row["end_date"]));
            $timesheets[] = $timesheet;
        }

        return $timesheets;
    }

    public function getById(int $id)
    {
        $stmt = $this->db->prepare("SELECT * FROM timesheets WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch();

        if ($row) {
            return new Timesheet($row["id"], $row["user_id"], new DateTime($row["start_date"]), new DateTime($row["end_date"]));
        } else {
            return null;
        }
    }

    public function save(Timesheet $timesheet)
    {
        if ($timesheet->getId()) {
            $stmt = $this->db->prepare("UPDATE timesheets SET user_id = ?, start_date = ?, end_date = ? WHERE id = ?");
            $stmt->execute([$timesheet->getUserId(), $timesheet->getStartDate()->format("Y-m-d"), $timesheet->getEndDate()->format("Y-m-d"), $timesheet->getId()]);
        } else {
            $stmt = $this->db->prepare("INSERT INTO timesheets (user_id, start_date,end_date) VALUES (?, ?, ?)");
            $stmt->execute([$timesheet->getUserId(), $timesheet->getStartDate()->format("Y-m-d"), $timesheet->getEndDate()->format("Y-m-d")]);

            $timesheet->setId($this->db->lastInsertId());
        }
    }

    public function delete(Timesheet $timesheet)
    {
        $stmt = $this->db->prepare("DELETE FROM timesheets WHERE id = ?");
        $stmt->execute([$timesheet->getId()]);
    }
}
