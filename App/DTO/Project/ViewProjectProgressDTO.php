<?php
class ViewProjectProgressDTO
{
    private int $taskId;
    private string $taskName;
    private string $userName;
    private string $userEmail;
    private DateTime $date;
    private int $hoursWorked;

    public function __construct(int $taskId, string $taskName, string $userName, string $userEmail, DateTime $date, int $hoursWorked)
    {
        $this->taskId = $taskId;
        $this->taskName = $taskName;
        $this->userName = $userName;
        $this->userEmail = $userEmail;
        $this->date = $date;
        $this->hoursWorked = $hoursWorked;
    }

    public function getTaskId()
    {
        return $this->taskId;
    }

    public function getTaskName()
    {
        return $this->taskName;
    }
    public function getUserName()
    {
        return $this->userName;
    }
    public function getUserEmail()
    {
        return $this->userEmail;
    }
    public function getDate()
    {
        return $this->date;
    }
    public function getHoursWorked()
    {
        return $this->hoursWorked;
    }
}
