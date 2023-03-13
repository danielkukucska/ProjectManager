<?php
class Timesheet
{
    private int $id;
    private int $userId;
    private DateTime $startDate;
    private DateTime $endDate;
    private array $timesheetLines;

    public function __construct(int $id, int $userId, DateTime $startDate, DateTime $endDate, array $timesheetLines = [])
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->timesheetLines = $timesheetLines;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getStartDate(): DateTime
    {
        return $this->startDate;
    }

    public function setStartDate(DateTime $startDate): void
    {
        $this->startDate = $startDate;
    }

    public function getEndDate(): DateTime
    {
        return $this->endDate;
    }

    public function setEndDate(DateTime $endDate): void
    {
        $this->endDate = $endDate;
    }

    public function getTimesheetLines(): array
    {
        return $this->timesheetLines;
    }

    public function addTimesheetLine(TimesheetLine $timesheetLine): void
    {
        $this->timesheetLines[] = $timesheetLine;
    }

    public function removeTimesheetLine($timesheetLineId)
    {
        foreach ($this->timesheetLines as $key => $timesheetLine) {
            if ($timesheetLine->getId() == $timesheetLineId) {
                unset($this->timesheetLines[$key]);
                return true;
            }
        }
        return false;
    }
}
