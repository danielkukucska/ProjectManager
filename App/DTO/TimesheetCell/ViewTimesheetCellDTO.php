<?php
class ViewTimesheetCellDTO
{
    private int $id;
    private int $timesheetLineId;
    private int $hoursWorked;
    private DateTime $date;

    public function __construct(TimesheetCell $timesheetCell)
    {
        $this->id = $timesheetCell->getId();
        $this->timesheetLineId = $timesheetCell->getTimesheetLineId();
        $this->hoursWorked = $timesheetCell->getHoursWorked();
        $this->date = $timesheetCell->getDate();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTimesheetLineId()
    {
        return $this->timesheetLineId;
    }

    public function getHours()
    {
        return $this->hoursWorked;
    }

    public function getDate()
    {
        return $this->date;
    }
}
