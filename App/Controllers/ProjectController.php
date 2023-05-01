<?php
class ProjectController extends Controller
{
    private ProjectService $projectService;

    public function __construct()
    {
        $this->projectService = $this->init(["ProjectRepository", "UserRepository"], "ProjectService");
    }

    public function index()
    {
        $projects = $this->projectService->getAll();
        $this->view("project/index", ["projects" => $projects]);
    }

    public function show($projectId)
    {
        $project = $this->projectService->getById($projectId);
        $this->view("project/view", ["project" => $project]);
    }

    public function create()
    {
        $users = $this->projectService->getUsers();
        $this->view("project/create", ["users" => $users]);
    }

    public function store()
    {
        $data = new CreateProjectDTO($_POST["name"], $_POST["description"], new DateTime($_POST["startDate"]), new DateTime($_POST["endDate"]), $_POST["ownerId"]);
        $project = $this->projectService->create($data);
        header("Location: projects/" . $project->getId());
        exit();
    }

    public function edit($projectId)
    {
        $project = $this->projectService->getById($projectId);
        $users = $this->projectService->getUsers();
        $this->view("project/update", ["project" => $project, "users" => $users]);
    }

    public function update($projectId)
    {
        $data = new UpdateProjectDTO($_POST["name"], $_POST["description"], new DateTime($_POST["startDate"]), new DateTime($_POST["endDate"]), $_POST["ownerId"]);
        $project = $this->projectService->update($projectId, $data);
        header("Location: " . $project->getId());
        exit();
    }

    public function delete($projectId)
    {
        $project = $this->projectService->getById($projectId);
        $this->view("project/delete", ["project" => $project]);
    }

    public function destroy($projectId)
    {
        $this->projectService->delete($projectId);
        header("Location: /ProjectManager/projects/" . $projectId);
        exit();
    }

    public function downloadProgress($projectId)
    {
        $this->projectService->downloadProgress($projectId);
    }
}
