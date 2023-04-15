<?php
class TaskController extends Controller
{
    private TaskService $taskService;

    public function __construct()
    {
        $this->taskService = $this->init(["TaskRepository", "UserTaskRepository", "UserRepository", "ProjectRepository"], "TaskService");
    }

    public function index($projectId)
    {
        $tasks = $this->taskService->getAllByProjectId($projectId);
        $project = $this->taskService->getProject($projectId);
        $this->view("task/index", ["project" => $project, "tasks" => $tasks]);
    }

    public function show($projectId, $taskId)
    {
        $project = $this->taskService->getProject($projectId);
        $task = $this->taskService->getById($taskId);
        $this->view("task/view", ["project" => $project, "task" => $task]);
    }

    public function create($projectId)
    {
        $project = $this->taskService->getProject($projectId);
        $this->view("task/create", ["project" => $project]);
    }

    public function store($projectId)
    {
        $createTaskDTO = new CreateTaskDTO($_POST["name"], $_POST["description"], $projectId);
        $task = $this->taskService->create($createTaskDTO);
        echo print_r($task);
        header("Location: tasks/" . $task->getId());
        exit();
    }

    public function edit($projectId, $taskId)
    {
        $project = $this->taskService->getProject($projectId);
        $task = $this->taskService->getById($taskId);
        $this->view("task/update", ["project" => $project, "task" => $task]);
    }

    public function update($projectId, $taskId)
    {
        $updateTaskDTO = new UpdateTaskDTO($projectId, $_POST["name"], $_POST["description"],  $_POST["status"]);
        $task = $this->taskService->update($taskId, $updateTaskDTO);
        header("Location: " . $task->getId());
        exit();
    }

    public function destroy($id)
    {
        throw new Error("Not implemented");
        //$this->taskService->deleteTask($id);
        // redirect to the index page
    }
}
