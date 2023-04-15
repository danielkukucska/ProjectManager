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
        // Validate input
        // $validation = $this->projectService->validateCreateInput($_POST);
        // if ($validation->failed()) {
        //     return $response->withJson($validation->getErrors(), 400);
        // }

        // // Authenticate user
        // $user = $this->projectService->authenticateUser($request);
        // if (!$user) {
        //     return $response->withJson(["error" => "Unauthorized"], 401);
        // }

        // // Check authorization
        // if (!$this->projectService->canCreateProject($user)) {
        //     return $response->withJson(["error" => "Forbidden"], 403);
        // }

        // $data = $_POST;
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

    public function destroy($projectId)
    {
        throw new Error("Not implemented");
        //$this->projectService->deleteProject($id);
        // redirect to the index page
    }
}
