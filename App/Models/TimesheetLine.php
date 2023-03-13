<?php
class TimesheetLine
{
    private int $id;
    private array $timesheetCells;

    public function __construct(int $id, array $timesheetCells)
    {
        $this->id = $id;
        $this->timesheetCells = $timesheetCells;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTimesheetCells(): array
    {
        return $this->timesheetCells;
    }

    public function addTimesheetCell(TimesheetCell $timesheetCell): void
    {
        $this->timesheetCells[] = $timesheetCell;
    }

    public function removeTimesheetCell($timesheetCellId)
    {
        foreach ($this->timesheetCells as $key => $timesheetCell) {
            if ($timesheetCell->getId() == $timesheetCellId) {
                unset($this->timesheetCells[$key]);
                return true;
            }
        }
        return false;
    }
}
