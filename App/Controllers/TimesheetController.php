<?php
class TimesheetController extends Controller
{
    private TimesheetService $timesheetService;

    public function __construct()
    {
        $this->timesheetService = $this->init(
            [
                "TimesheetRepository",
                "TimesheetLineRepository",
                "TimesheetCellRepository",
                "UserTaskRepository",
                "TaskRepository",
                "ProjectRepository"
            ],
            "TimesheetService"
        );
    }

    public function index()
    {
        $timesheets = $this->timesheetService->getAllByUserId($_SESSION["user"]->getId());
        $this->view("timesheet/index", ["timesheets" => $timesheets]);
    }

    public function show($timesheetId)
    {
        $timesheet = $this->timesheetService->getById($timesheetId);
        if ($timesheet === null) {
            echo "Timesheet not found";
        } else {

            $this->view("timesheet/view", ["timesheet" => $timesheet]);
        }
    }

    public function create()
    {
        $this->view("timesheet/create");
    }

    public function store()
    {
        $selectedDate =  strtotime($_POST["selectedDate"]);
        $startDate = date('Y-m-d', strtotime('monday this week', $selectedDate));
        $endDate = date('Y-m-d', strtotime('sunday this week', $selectedDate));
        $data = new CreateTimesheetDTO($_SESSION["user"]->getId(), new DateTime($startDate), new DateTime($endDate));
        $timesheet = $this->timesheetService->create($data);
        header("Location: timesheets/" . $timesheet->getId() . "/edit");
        exit();
    }

    public function edit($timesheetId)
    {
        $timesheet = $this->timesheetService->getById($timesheetId);
        $tasks = $this->timesheetService->getUserTasks($timesheetId);
        // echo print_r($tasks);
        // return;
        if ($timesheet === null) {
            echo "Timesheet not found";
        } else {
            $this->view("timesheet/update", ["timesheet" => $timesheet, "tasks" => $tasks]);
        }
    }

    public function update($timesheetId)
    {
        $data = $_POST;
        // $this->timesheetService->update($id, $data);
        // redirect to the timesheet"s show page
    }

    public function createTimesheetLine($timesheetId)
    {
        $data = new CreateTimesheetLineDTO($timesheetId, $_POST["taskId"]);
        $this->timesheetService->createTimesheetLine($data);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }

    public function updateTimesheetLine($timesheetId)
    {
        $data = [];
        foreach ($_POST as $id => $hoursWorked) {
            $timesheetCell = new UpdateTimesheetCellDTO($id, $hoursWorked);
            $data[] = $timesheetCell;
        }
        $this->timesheetService->updateTimesheetLine($data);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }

    public function destroy($timesheetId)
    {
        throw new Error("Not implemented");
        //$this->timesheetService->deleteTimesheet($id);
        // redirect to the index page
    }
}
