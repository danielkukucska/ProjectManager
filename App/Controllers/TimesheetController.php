<?php
class TimesheetController extends Controller
{
    private TimesheetService $timesheetService;

    public function __construct()
    {
        $this->timesheetService = $this->init(["TimesheetRepository", "TimesheetLineRepository", "TimesheetCellRepository"], "TimesheetService");
    }

    public function index()
    {
        //TODO auth and get user ID
        $timesheets = $this->timesheetService->getAllByUserId(1);
        $this->view("timesheet/index", ["timesheets" => $timesheets]);
    }

    public function show($timesheetId)
    {
        $timesheet = $this->timesheetService->getById($timesheetId);
        if ($timesheet === null) {
            echo "Timesheet not found";
        } else {

            echo "TASK: " . print_r($timesheet) . "<br>";
        }
        $this->view("timesheet/view", ["timesheet" => $timesheet]);
    }

    public function create()
    {
        $this->view("timesheet/create");
    }

    public function store()
    {

        // $data = $_POST;
        $data = new CreateTimesheetDTO(1, new DateTime(), new DateTime());
        // $data = new CreateTimesheetDTO($_POST["name"], $_POST["description"], $_POST["startDate"], $_POST["endDate"], $_POST["ownerId"]);
        $timesheet = $this->timesheetService->create($data);
        echo print_r($timesheet);
        // redirect to the timesheet"s show page
        header("Location: timesheets/" . $timesheet->getId());
        exit();
    }

    public function edit($timesheetId)
    {
        $timesheet = $this->timesheetService->getById($timesheetId);
        // render a view with a form to edit the timesheet
    }

    public function update($timesheetId)
    {
        $data = $_POST;
        // $this->timesheetService->update($id, $data);
        // redirect to the timesheet"s show page
    }

    public function destroy($timesheetId)
    {
        throw new Error("Not implemented");
        //$this->timesheetService->deleteTimesheet($id);
        // redirect to the index page
    }
}
