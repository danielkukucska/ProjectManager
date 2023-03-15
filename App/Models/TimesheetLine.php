<?php
class TimesheetLine
{
    private ?int $id;
    private int $timesheetId;
    private int $taskId;

    public function __construct(?int $id, int $timesheetId, int $taskId)
    {
        $this->id = $id;
        $this->timesheetId = $timesheetId;
        $this->taskId = $taskId;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getTimesheetId()
    {
        return $this->timesheetId;
    }

    public function setTimesheetId(int $timesheetId)
    {
        $this->timesheetId = $timesheetId;
    }

    public function getTaskId()
    {
        return $this->taskId;
    }

    public function setTaskId(int $taskId)
    {
        $this->taskId = $taskId;
    }
}
