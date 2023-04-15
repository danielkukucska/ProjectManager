<?php
class UserController extends Controller
{
    private UserService $userService;

    public function __construct()
    {
        $this->userService = $this->init(["UserRepository"], "UserService");
    }

    public function index()
    {
        //show logged in user
        $this->view("user/index");
    }

    public function create()
    {
        //sign-up form
        $this->view("user/create");
    }

    public function store()
    {
        // $data = $_POST;
        $this->userService->registerUser($_POST["name"], $_POST["email"], $_POST["password"]);
        header("Location: auth/");
        exit();
    }

    public function login()
    {
        // $user = $this->userService->getById($id);
        // render a view with a form to edit the project
        $this->view("user/update");
    }

    public function update()
    {
        $action = $_POST["action"];
        //authenticate user
        //check if a password update
        switch ($action) {
            case "update password":
                $this->userService->updatePassword("", "", "");
                break;
            case "promote":
                $this->userService->promoteUser(1, 1);
                break;
            case "demote":
                $this->userService->demoteUser(1, 1);
                break;

            default:
                //return 404
                break;
        }
    }
}
