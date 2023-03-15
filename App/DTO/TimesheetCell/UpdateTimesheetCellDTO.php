<?php
class UpdateTimesheetCellDTO
{
    private int $hoursWorked;

    public function __construct(int $hoursWorked)
    {
        $this->hoursWorked = $hoursWorked;
    }

    public function getHoursWorked()
    {
        return $this->hoursWorked;
    }
}
