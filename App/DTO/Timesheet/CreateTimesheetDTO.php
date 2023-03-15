<?php
class CreateTimesheetDTO
{
    private int $userId;
    private DateTime $startDate;
    private DateTime $endDate;

    public function __construct(int $userId, DateTime $startDate, DateTime $endDate)
    {
        $this->userId = $userId;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getStartDate()
    {
        return $this->startDate;
    }

    //Calculate on backend instead?
    public function getEndDate()
    {
        return $this->endDate;
    }
}
