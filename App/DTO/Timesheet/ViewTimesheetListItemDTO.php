<?php
class ViewTimesheetListItemDTO
{
    private int $id;
    private int $userId;
    private DateTime $startDate;
    private DateTime $endDate;

    public function __construct(Timesheet $timesheet)
    {
        $this->id = $timesheet->getId();
        $this->userId = $timesheet->getUserId();
        $this->startDate = $timesheet->getStartDate();
        $this->endDate = $timesheet->getEndDate();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getStartDate()
    {
        return $this->startDate;
    }

    public function getEndDate()
    {
        return $this->endDate;
    }
}
