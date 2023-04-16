<?php
class CreateTimesheetLineDTO
{
    private int $timesheetId;
    private int $taskId;

    public function __construct(int $timesheetId, int $taskId)
    {
        $this->timesheetId = $timesheetId;
        $this->taskId = $taskId;
    }

    public function getTimesheetId()
    {
        return $this->timesheetId;
    }

    public function getTaskId()
    {
        return $this->taskId;
    }
}
