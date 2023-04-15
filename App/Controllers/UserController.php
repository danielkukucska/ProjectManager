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
        $user = $_SESSION["user"];
        $this->view("user/index", ["user" => $user]);
    }

    public function signUp()
    {
        $this->view("user/sign-up");
    }

    public function store()
    {
        $this->userService->signUp($_POST["name"], $_POST["email"], $_POST["password"]);
        header("Location: sign-in");
        exit();
    }

    public function signIn()
    {
        $this->view("user/sign-in");
    }

    public function signOut()
    {
        session_destroy();
        header("Location: /ProjectManager/auth/sign-in");
        exit();
    }

    public function changePassword()
    {
        $userId = $_SESSION["user"]->getId();
        $this->view("user/change-password", ["userId" => $userId]);
    }

    public function authenticate()
    {
        $user = $this->userService->signIn($_POST["email"], $_POST["password"]);
        $_SESSION["user"] = $user;
        header("Location: /ProjectManager/auth");
        exit();
    }

    public function update($userId)
    {
        //todo secure roles and authorization
        switch ($_POST["action"]) {
            case "change-password":
                $this->userService->updatePassword($_POST["email"], $_POST["currentPassword"], $_POST["newPassword"]);
                header("Location: /Projectmanager/auth");
                exit();
                break;
            case "promote":
                $this->userService->promoteUser($_POST["userId"], $_SESSION["user"]->getId());
                break;
            case "demote":
                $this->userService->demoteUser($_POST["userId"], $_SESSION["user"]->getId());
                break;
            default:
                throw new Error("Invalid update action");
        }
    }
}
