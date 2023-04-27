<?php
class TimesheetCellServices
{
    private TimesheetCellRepository $timesheetCellRepository;

    public function __construct(TimesheetCellRepository $timesheetCellRepository)
    {
        $this->$timesheetCellRepository = $timesheetCellRepository;
    }

    public function getByTimesheetLineId(int $timesheetLineId)
    {
        $timesheetCells = $this->timesheetCellRepository->getAllByTimesheetLineId($timesheetLineId);
        $timesheetCellDTOs = [];

        foreach ($timesheetCells as $timesheetCell) {
            $timesheetCellDTOs[] = new ViewTimesheetCellDTO($timesheetCell);
        }

        return $timesheetCellDTOs;
    }

    public function create(CreateTimesheetCellDTO $createTimesheetCellDTO)
    {
        $timesheetCell = new TimesheetCell(
            null,
            $createTimesheetCellDTO->getTimesheetLineId(),
            $createTimesheetCellDTO->getHoursWorked(),
            $createTimesheetCellDTO->getDate(),
        );

        $this->timesheetCellRepository->save($timesheetCell);

        return new ViewTimesheetCellDTO($timesheetCell);
    }

    public function update(int $id, UpdateTimesheetCellDTO $updateTimesheetCellDTO)
    {
        $timesheetCell = $this->timesheetCellRepository->getById($id);

        if (!$timesheetCell) {
            throw new NotFoundException("Task not found");
        }

        $timesheetCell->setHoursWorked($updateTimesheetCellDTO->getHoursWorked());

        $this->timesheetCellRepository->save($timesheetCell);

        return new ViewTimesheetCellDTO($timesheetCell);
    }
}
