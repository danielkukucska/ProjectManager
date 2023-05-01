<?php
class ViewTimesheetDTO
{
    private int $id;
    private int $userId;
    private DateTime $startDate;
    private DateTime $endDate;
    private array $timesheetLines;

    public function __construct(Timesheet $timesheet, array $timesheetLines)
    {
        $this->id = $timesheet->getId();
        $this->userId = $timesheet->getUserId();
        $this->startDate = $timesheet->getStartDate();
        $this->endDate = $timesheet->getEndDate();
        $this->timesheetLines = $timesheetLines;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getStartDate()
    {
        return $this->startDate;
    }

    public function getEndDate()
    {
        return $this->endDate;
    }

    public function getTimesheetLines()
    {
        return $this->timesheetLines;
    }
}
