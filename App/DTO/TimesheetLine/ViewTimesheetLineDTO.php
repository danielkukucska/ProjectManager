<?php
class ViewTimesheetLineDTO
{
    private int $id;
    private int $timesheetId;
    private int $taskId;
    private array $timesheetCells;
    private string $projectName;
    private string $taskName;

    public function __construct(TimesheetLine $timesheetLine, array $timesheetCells, string $projectName, string $taskName)
    {
        $this->id = $timesheetLine->getId();
        $this->timesheetId = $timesheetLine->getTimesheetId();
        $this->taskId = $timesheetLine->getTaskId();
        $this->timesheetCells = $timesheetCells;
        $this->projectName = $projectName;
        $this->taskName = $taskName;
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

    public function getProjectName()
    {
        return $this->projectName;
    }

    public function getTaskName()
    {
        return $this->taskName;
    }
}
