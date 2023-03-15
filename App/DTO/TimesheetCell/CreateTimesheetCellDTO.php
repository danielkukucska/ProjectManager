<?php
class CreateTimesheetCellDTO
{
    private int $timesheetLineId;
    private int $hoursWorked;
    private DateTime $date;

    public function __construct(int $timesheetLineId, int $hoursWorked, DateTime $date)
    {
        $this->timesheetLineId = $timesheetLineId;
        $this->hoursWorked = $hoursWorked;
        $this->date = $date;
    }

    public function getTimesheetLineId()
    {
        return $this->timesheetLineId;
    }

    public function getHoursWorked()
    {
        return $this->hoursWorked;
    }

    public function getDate()
    {
        return $this->date;
    }
}
