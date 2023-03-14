<?php

class TimesheetRepository
{
    private $db;
    private $timesheetLineRepository;

    public function __construct($db, TimesheetLineRepository $timesheetLineRepository)
    {
        $this->db = $db;
        $this->timesheetLineRepository = $timesheetLineRepository;
    }

    public function getById(int $id): ?Timesheet
    {
        $stmt = $this->db->prepare("SELECT * FROM timesheets WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch();

        if ($row) {
            $lines = $this->timesheetLineRepository->getByTimesheetId($id);
            return new Timesheet($row['id'], $row['user_id'], $row['start_date'], $row['end_date'], $lines);
        } else {
            return null;
        }
    }

    public function save(Timesheet $timesheet): void
    {

        if ($timesheet->getId()) {
            $stmt = $this->db->prepare("UPDATE timesheets SET user_id = ?, start_date = ?, end_date = ? WHERE id = ?");
            $stmt->execute([$timesheet->getUserId(), $timesheet->getStartDate(), $timesheet->getEndDate(), $timesheet->getId()]);
        } else {
            $stmt = $this->db->prepare("INSERT INTO timesheets (user_id, start_date,end_date) VALUES (?, ?, ?)");
            $stmt->execute([$timesheet->getUserId(), $timesheet->getStartDate(), $timesheet->getEndDate()]);

            $timesheet->setId($this->db->lastInsertId());
        }
    }

    public function delete(Timesheet $timesheet): void
    {
        $stmt = $this->db->prepare("DELETE FROM timesheets WHERE id = ?");
        $stmt->execute([$timesheet->getId()]);
    }
}
