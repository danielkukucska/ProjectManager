<?php
class TimesheetServices
{
    private TimesheetRepository $timesheetRepository;
    private TimesheetLineRepository $timesheetLineRepository;
    private TimesheetCellRepository $timesheetCellRepository;


    public function __construct(
        TimesheetRepository $timesheetRepository,
        TimesheetLineRepository $timesheetLineRepository,
        TimesheetCellRepository $timesheetCellRepository
    ) {
        $this->$timesheetRepository = $timesheetRepository;
        $this->$timesheetLineRepository = $timesheetLineRepository;
        $this->$timesheetCellRepository = $timesheetCellRepository;
    }

    public function getById(int $id)
    {
        throw new Exception("Not needed in the app");
    }

    public function getAllByUserId(int $userId)
    {
        $timesheets = $this->timesheetRepository->getAllByUserId($userId);
        $timesheetDTOs = [];

        foreach ($timesheets as $timesheet) {
            $timesheetLines = $this->timesheetLineRepository->getAllByTimesheetId($timesheet->getId());
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
            $timesheetDTOs[] = new ViewTimesheetDTO($timesheet, $timesheetLineDTOs);
        }

        return $timesheetDTOs;
    }

    public function create(CreateTimesheetDTO $createTimesheetDTO)
    {
        $timesheet = new Timesheet(
            null,
            $createTimesheetDTO->getUserId(),
            $createTimesheetDTO->getStartDate(),
            $createTimesheetDTO->getEndDate(),
        );

        //TODO check if there is any created for that date for user
        $this->timesheetRepository->save($timesheet);

        return new ViewTimesheetDTO($timesheet, []);
    }
}
