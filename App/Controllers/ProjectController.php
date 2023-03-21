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
        echo $_SERVER['REQUEST_METHOD'];
        $projects = $this->projectService->getAll();
        $this->view("project/index", ["projects" => $projects]);
        // render a view to display the projects
    }

    public function show($id)
    {
        $project = $this->projectService->getById($id);
        echo print_r($project);
        // render a view to display the project
    }

    public function create()
    {
        // Render a view with a form to create a new project
        include(dirname(__FILE__) . '/../Views/Project/create.php');
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
        //     return $response->withJson(['error' => 'Unauthorized'], 401);
        // }

        // // Check authorization
        // if (!$this->projectService->canCreateProject($user)) {
        //     return $response->withJson(['error' => 'Forbidden'], 403);
        // }

        // $data = $_POST;
        $data = new CreateProjectDTO("Test", "Test", new DateTime(), new DateTime(), 1);
        // $data = new CreateProjectDTO($_POST["name"], $_POST["description"], $_POST["startDate"], $_POST["endDate"], $_POST["ownerId"]);
        $project = $this->projectService->create($data);
        echo print_r($project);
        // redirect to the project's show page
        header("Location: projects/" . $project->getId());
        exit();
    }

    public function edit($id)
    {
        $project = $this->projectService->getById($id);
        // render a view with a form to edit the project
    }

    public function update($id)
    {
        $data = $_POST;
        // $this->projectService->update($id, $data);
        // redirect to the project's show page
    }

    public function destroy($id)
    {
        throw new Error("Not implemented");
        //$this->projectService->deleteProject($id);
        // redirect to the index page
    }
}
