<?php

class TimesheetCellRepository
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getById($id): ?TimesheetCell
    {
        $stmt = $this->db->prepare("SELECT * FROM timesheet_cells WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch();

        if ($row) {
            return new TimesheetCell(
                $row['id'],
                $row['timesheet_line_id'],
                $row['date'],
                $row['hours']
            );
        } else {
            return null;
        }
    }

    public function getAllByTimesheetLineId($timesheetLineId): array
    {
        $stmt = $this->db->prepare("SELECT * FROM timesheet_cells WHERE timesheet_line_id = ?");
        $stmt->execute([$timesheetLineId]);

        $cells = [];
        while ($row = $stmt->fetch()) {
            $cells[] = new TimesheetCell(
                $row['id'],
                $row['timesheet_line_id'],
                $row['date'],
                $row['hours']
            );
        }

        return $cells;
    }

    public function save(TimesheetCell $cell): void
    {
        if ($cell->getId()) {
            $stmt = $this->db->prepare("UPDATE timesheet_cells SET timesheet_line_id = ?, date = ?, hours = ? WHERE id = ?");
            $stmt->execute([$cell->getTimesheetLineId(), $cell->getDate(), $cell->getHours(), $cell->getId()]);
        } else {
            $stmt = $this->db->prepare("INSERT INTO timesheet_cells (timesheet_line_id, date, hours) VALUES (?, ?, ?)");
            $stmt->execute([$cell->getTimesheetLineId(), $cell->getDate(), $cell->getHours()]);

            $cell->setId($this->db->lastInsertId());
        }
    }

    public function delete(TimesheetCell $cell): void
    {
        $stmt = $this->db->prepare("DELETE FROM timesheet_cells WHERE id = ?");
        $stmt->execute([$cell->getId()]);
    }
}
