<?php
class TimesheetLineServices
{
    private TimesheetLineRepository $timesheetLineRepository;
    private TimesheetCellRepository $timesheetCellRepository;

    public function __construct(TimesheetLineRepository $timesheetLineRepository, TimesheetCellRepository $timesheetCellRepository)
    {
        $this->$timesheetLineRepository = $timesheetLineRepository;
        $this->$timesheetCellRepository = $timesheetCellRepository;
    }

    public function getById(int $id)
    {
        throw new Exception("Not needed in the app");
    }

    public function getByTimesheetId(int $timesheetId)
    {
        $timesheetLines = $this->timesheetLineRepository->getAllByTimesheetId($timesheetId);
        $timesheetLineDTOs = [];

        //Should this be moved to repository?
        foreach ($timesheetLines as $timesheetLine) {
            $timesheetCells = $this->timesheetCellRepository->getAllByTimesheetLineId($timesheetLine->getId());
            $timesheetCellDTOs = [];

            foreach ($timesheetCells as $timesheetCell) {
                $timesheetCellDTOs[] = new ViewTimesheetCellDTO($timesheetCell);
            }

            $timesheetLineDTOs[] = new ViewTimesheetLineDTO($timesheetLine, $timesheetCellDTOs);
        }

        return $timesheetLineDTOs;
    }

    public function create(CreateTimesheetLineDTO $createTimesheetLineDTO)
    {
        $timesheetLine = new TimesheetLine(
            null,
            $createTimesheetLineDTO->getTimesheetId(),
            $createTimesheetLineDTO->getTaskId(),
        );

        //TODO check if there is any saved for that task 
        $this->timesheetLineRepository->save($timesheetLine);

        //TODO create all cells for the week?
        return new ViewTimesheetLineDTO($timesheetLine, []);
    }
}
