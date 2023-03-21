<?php

class TimesheetLineRepository
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getById(int $id)
    {
        $stmt = $this->db->prepare("SELECT * FROM timesheet_lines WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch();

        if ($row) {
            return new TimesheetLine($row["id"], $row["timesheet_id"], $row["task_id"], $row["hours"]);
        } else {
            return null;
        }
    }

    public function getAllByTimesheetId(int $timesheetId)
    {
        $stmt = $this->db->prepare("SELECT * FROM timesheet_lines WHERE timesheet_id = ?");
        $stmt->execute([$timesheetId]);
        $rows = $stmt->fetchAll();

        $timesheetLines = [];

        foreach ($rows as $row) {
            $timesheetLines[] = new TimesheetLine($row["id"], $row["timesheet_id"], $row["task_id"], $row["hours"]);
        }

        return $timesheetLines;
    }

    public function save(TimesheetLine $timesheetLine)
    {
        if ($timesheetLine->getId()) {
            $stmt = $this->db->prepare("UPDATE timesheet_lines SET timesheet_id = ?, task_id = ? WHERE id = ?");
            $stmt->execute([$timesheetLine->getTimesheetId(), $timesheetLine->getTaskId(), $timesheetLine->getId()]);
        } else {
            $stmt = $this->db->prepare("INSERT INTO timesheet_lines (timesheet_id, task_id) VALUES (?, ?)");
            $stmt->execute([$timesheetLine->getTimesheetId(), $timesheetLine->getTaskId()]);

            $timesheetLine->setId($this->db->lastInsertId());
        }
    }

    public function delete(TimesheetLine $timesheetLine)
    {
        $stmt = $this->db->prepare("DELETE FROM timesheet_lines WHERE id = ?");
        $stmt->execute([$timesheetLine->getId()]);
    }
}
