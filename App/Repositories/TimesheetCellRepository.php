<?php

class TimesheetCellRepository
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM timesheet_cells WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch();

        if ($row) {
            return new TimesheetCell(
                $row["id"],
                $row["timesheet_line_id"],
                $row["hours_worked"],
                new DateTime($row["date"])
            );
        } else {
            return null;
        }
    }

    public function getAllByTimesheetLineId($timesheetLineId)
    {
        $stmt = $this->db->prepare("SELECT * FROM timesheet_cells WHERE timesheet_line_id = ?");
        $stmt->execute([$timesheetLineId]);

        $cells = [];
        while ($row = $stmt->fetch()) {
            $cells[] = new TimesheetCell(
                $row["id"],
                $row["timesheet_line_id"],
                $row["hours_worked"],
                new DateTime($row["date"])
            );
        }

        return $cells;
    }

    public function save(TimesheetCell $cell)
    {
        if ($cell->getId()) {
            $stmt = $this->db->prepare("UPDATE timesheet_cells SET timesheet_line_id = ?, date = ?, hours_worked = ? WHERE id = ?");
            $stmt->execute([$cell->getTimesheetLineId(), $cell->getDate()->format("Y-m-d"), $cell->getHoursWorked(), $cell->getId()]);
        } else {
            $stmt = $this->db->prepare("INSERT INTO timesheet_cells (timesheet_line_id, date, hours_worked) VALUES (?, ?, ?)");
            $stmt->execute([$cell->getTimesheetLineId(), $cell->getDate()->format("Y-m-d"), $cell->getHoursWorked()]);

            $cell->setId($this->db->lastInsertId());
        }
    }

    public function delete(TimesheetCell $cell)
    {
        $stmt = $this->db->prepare("DELETE FROM timesheet_cells WHERE id = ?");
        $stmt->execute([$cell->getId()]);
    }
}
