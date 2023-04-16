<?php
class UpdateTimesheetCellDTO
{
    private int $id;
    private int $hoursWorked;

    public function __construct(int $id, int $hoursWorked)
    {
        $this->id = $id;
        $this->hoursWorked = $hoursWorked;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getHoursWorked()
    {
        return $this->hoursWorked;
    }
}
