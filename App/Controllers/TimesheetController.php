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
        print_r($timesheets);
        $this->view("timesheet/index", ["timesheets" => $timesheets]);
    }

    public function show($id)
    {
        $timesheet = $this->timesheetService->getById($id);
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

    public function edit($id)
    {
        $timesheet = $this->timesheetService->getById($id);
        // render a view with a form to edit the timesheet
    }

    public function update($id)
    {
        $data = $_POST;
        // $this->timesheetService->update($id, $data);
        // redirect to the timesheet"s show page
    }

    public function destroy($id)
    {
        throw new Error("Not implemented");
        //$this->timesheetService->deleteTimesheet($id);
        // redirect to the index page
    }
}
