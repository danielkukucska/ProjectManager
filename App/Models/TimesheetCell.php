<?php
class TimesheetCell
{
    private int $id;
    private int $timesheetLineId;
    private int $hoursWorked;
    private DateTime $date;

    public function __construct(int $id, int $timesheetLineId, int $hoursWorked, DateTime $date)
    {
        $this->id = $id;
        $this->timesheetLineId = $timesheetLineId;
        $this->hoursWorked = $hoursWorked;
        $this->date = $date;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getTimesheetLineId()
    {
        return $this->timesheetLineId;
    }

    public function getHours()
    {
        return $this->hoursWorked;
    }

    public function setHours(int $hoursWorked)
    {
        $this->hoursWorked = $hoursWorked;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate(DateTime $date)
    {
        $this->date = $date;
    }
}
