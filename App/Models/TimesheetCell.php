<?php
class TimesheetCell
{
    private int $id;
    private int $taskId;
    private int $hoursWorked;
    private DateTime $date;

    public function __construct(int $id, int $taskId, int $hoursWorked, DateTime $date)
    {
        $this->id = $id;
        $this->taskId = $taskId;
        $this->hoursWorked = $hoursWorked;
        $this->date = $date;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTaskId(): int
    {
        return $this->taskId;
    }

    public function getHoursWorked(): int
    {
        return $this->hoursWorked;
    }

    public function setHoursWorked(int $hoursWorked): void
    {
        $this->hoursWorked = $hoursWorked;
    }

    public function getDate(): DateTime
    {
        return $this->date;
    }

    public function setDate(DateTime $date): void
    {
        $this->date = $date;
    }
}
