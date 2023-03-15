<?php
class ViewTimesheetLineDTO
{
    private int $id;
    private int $timesheetId;
    private int $taskId;
    private array $timesheetCells;

    public function __construct(TimesheetLine $timesheetLine, array $timesheetCells)
    {
        $this->id = $timesheetLine->getId();
        $this->timesheetId = $timesheetLine->getTimesheetId();
        $this->taskId = $timesheetLine->getTaskId();
        $this->timesheetCells = $timesheetCells;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTimesheetId()
    {
        return $this->timesheetId;
    }

    public function getTaskId()
    {
        return $this->taskId;
    }

    public function getTimesheetCells()
    {
        return $this->timesheetCells;
    }
}
