<?php
class TaskController extends Controller
{
    private TaskService $taskService;

    public function __construct()
    {
        $this->taskService = $this->init(["TaskRepository", "UserTaskRepository", "UserRepository"], "TaskService");
    }

    public function index($projectId)
    {
        $tasks = $this->taskService->getAllByProjectId($projectId);
        print_r($tasks);
        $this->view("task/index", ["tasks" => $tasks]);
    }

    public function show($id)
    {
        $task = $this->taskService->getById($id);
        if ($task === null) {
            echo "Task not found";
        } else {

            echo "TASK: " . print_r($task) . "<br>";
        }
        $this->view("task/view", ["task" => $task]);
    }

    public function create()
    {
        $this->view("task/create");
    }

    public function store()
    {

        // $data = $_POST;
        $data = new CreateTaskDTO("Test", "Test", 1, "Test Status");
        // $data = new CreateTaskDTO($_POST["name"], $_POST["description"], $_POST["startDate"], $_POST["endDate"], $_POST["ownerId"]);
        $task = $this->taskService->create($data);
        echo print_r($task);
        // redirect to the task"s show page
        header("Location: tasks/" . $task->getId());
        exit();
    }

    public function edit($id)
    {
        $task = $this->taskService->getById($id);
        // render a view with a form to edit the task
    }

    public function update($id)
    {
        $data = $_POST;
        // $this->taskService->update($id, $data);
        // redirect to the task"s show page
    }

    public function destroy($id)
    {
        throw new Error("Not implemented");
        //$this->taskService->deleteTask($id);
        // redirect to the index page
    }
}
