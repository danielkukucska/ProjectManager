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

    public function listUsers()
    {
        $users = $this->userService->getAll();
        $this->view("user/users-list", ["users" => $users]);
    }

    public function show(int $userId)
    {
        $user = $this->userService->getById($userId);
        $this->view("user/view", ["user" => $user]);
    }

    public function update(int $userId)
    {
        switch ($_POST["action"]) {
            case "change-password":
                try {
                    $this->userService->updatePassword($_POST["email"], $_POST["currentPassword"], $_POST["newPassword"]);
                    header("Location: /Projectmanager/auth");
                } catch (Exception $e) {
                    if ($e instanceof  NotAuthenticatedException) {
                        $this->view("user/change-password", ["userId" => $userId, "error" => "Unauthorized."]);
                    } else {
                        throw new InternalServerException();
                    }
                }
                exit();
            case "promote":
                $this->userService->promoteUser($userId);
                $this->show($userId);
                break;
            case "demote":
                $this->userService->demoteUser($userId);
                $this->show($userId);
                break;
            default:
                throw new InvalidArgumentException("Invalid update action");
        }
    }
}
