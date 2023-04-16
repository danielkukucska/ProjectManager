<?php
class TimesheetService
{
    private TimesheetRepository $timesheetRepository;
    private TimesheetLineRepository $timesheetLineRepository;
    private TimesheetCellRepository $timesheetCellRepository;
    private UserTaskRepository $userTaskRepository;
    private TaskRepository $taskRepository;
    private ProjectRepository $projectRepository;

    public function __construct(
        TimesheetRepository $timesheetRepository,
        TimesheetLineRepository $timesheetLineRepository,
        TimesheetCellRepository $timesheetCellRepository,
        UserTaskRepository $userTaskRepository,
        TaskRepository $taskRepository,
        ProjectRepository $projectRepository,
    ) {
        $this->timesheetRepository = $timesheetRepository;
        $this->timesheetLineRepository = $timesheetLineRepository;
        $this->timesheetCellRepository = $timesheetCellRepository;
        $this->userTaskRepository = $userTaskRepository;
        $this->taskRepository = $taskRepository;
        $this->projectRepository = $projectRepository;
    }

    public function getById(int $timesheetId)
    {
        $timesheet = $this->timesheetRepository->getById($timesheetId);

        if ($timesheet->getUserId() != $_SESSION["user"]->getId()) {
            return null;
        }

        $timesheetLines = $this->timesheetLineRepository->getAllByTimesheetId($timesheet->getId());
        $timesheetLineDTOs = [];

        foreach ($timesheetLines as $timesheetLine) {
            $timesheetCells = $this->timesheetCellRepository->getAllByTimesheetLineId($timesheetLine->getId());
            $timesheetCellDTOs = [];
            $task = $this->taskRepository->getById($timesheetLine->getTaskId());
            $project = $this->projectRepository->getById($task->getProjectId());

            foreach ($timesheetCells as $timesheetCell) {
                $timesheetCellDTOs[] = new ViewTimesheetCellDTO($timesheetCell);
            }

            $timesheetLineDTOs[] = new ViewTimesheetLineDTO($timesheetLine, $timesheetCellDTOs, $project->getName(), $task->getName());
        }
        return new ViewTimesheetDTO($timesheet, $timesheetLineDTOs);
    }

    public function getAllByUserId(int $userId)
    {
        $timesheets = $this->timesheetRepository->getAllByUserId($userId);
        $timesheetDTOs = [];

        foreach ($timesheets as $timesheet) {
            $timesheetDTOs[] = new ViewTimesheetListItemDTO($timesheet);
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

    public function getUserTasks()
    {
        $userTasks = $this->userTaskRepository->getAllByUserId($_SESSION["user"]->getId());
        $taskDTOs = [];

        foreach ($userTasks as $userTask) {
            $task = $this->taskRepository->getById($userTask->getTaskId());
            //nyehh
            $taskDTOs[] = new ViewTaskDTO($task, []);
        }

        return $taskDTOs;
    }

    public function createTimesheetLine(CreateTimesheetLineDTO $createTimesheetLineDTO)
    {
        $timesheet = $this->timesheetRepository->getById($createTimesheetLineDTO->getTimesheetid());
        //TODO error if not found
        if ($timesheet == null) {
            return null;
        }

        $timesheetLine = new TimesheetLine(
            null,
            $createTimesheetLineDTO->getTimesheetId(),
            $createTimesheetLineDTO->getTaskId(),
        );

        //TODO check if there is any saved for that task 
        $this->timesheetLineRepository->save($timesheetLine);

        $this->createTimesheetCell(new CreateTimesheetCellDTO($timesheetLine->getId(), 0, $timesheet->getStartDate()->modify("monday this week")));
        $this->createTimesheetCell(new CreateTimesheetCellDTO($timesheetLine->getId(), 0, $timesheet->getStartDate()->modify("tuesday this week")));
        $this->createTimesheetCell(new CreateTimesheetCellDTO($timesheetLine->getId(), 0, $timesheet->getStartDate()->modify("wednesday this week")));
        $this->createTimesheetCell(new CreateTimesheetCellDTO($timesheetLine->getId(), 0, $timesheet->getStartDate()->modify("thursday this week")));
        $this->createTimesheetCell(new CreateTimesheetCellDTO($timesheetLine->getId(), 0, $timesheet->getStartDate()->modify("friday this week")));
        $this->createTimesheetCell(new CreateTimesheetCellDTO($timesheetLine->getId(), 0, $timesheet->getStartDate()->modify("saturday this week")));
        $this->createTimesheetCell(new CreateTimesheetCellDTO($timesheetLine->getId(), 0, $timesheet->getStartDate()->modify("sunday this week")));
    }

    public function createTimesheetCell(CreateTimesheetCellDTO $createTimesheetCellDTO)
    {
        $timesheetCell = new TimesheetCell(
            null,
            $createTimesheetCellDTO->getTimesheetLineId(),
            $createTimesheetCellDTO->getHoursWorked(),
            $createTimesheetCellDTO->getDate(),
        );

        //TODO check if there is any saved for that date? 
        //Or the cells should be generated when a timesheet line is created for the week
        $this->timesheetCellRepository->save($timesheetCell);

        return new ViewTimesheetCellDTO($timesheetCell);
    }

    public function updateTimesheetLine(array $updateTimesheetCellDTOs)
    {

        foreach ($updateTimesheetCellDTOs as $updateTimesheetCellDTO) {
            $timesheetCell = $this->timesheetCellRepository->getById($updateTimesheetCellDTO->getId());
            $this->timesheetCellRepository->save(new TimesheetCell(
                $timesheetCell->getId(),
                $timesheetCell->getTimesheetLineId(),
                $updateTimesheetCellDTO->getHoursWorked(),
                $timesheetCell->getDate()
            ));
        }
    }
}
