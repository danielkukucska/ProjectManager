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
        try {
            $this->userService->signUp($_POST["name"], $_POST["email"], $_POST["password"]);
            header("Location: sign-in");
            exit();
        } catch (Exception $e) {
            if ($e instanceof  InvalidArgumentException) {
                $this->view("user/sign-up", ["error" => $e->getMessage()]);
            } else {
                throw new InternalServerException();
            }
        }
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

        try {
            $user = $this->userService->signIn($_POST["email"], $_POST["password"]);
            $_SESSION["user"] = $user;
            header("Location: /ProjectManager/auth");
            exit();
        } catch (Exception $e) {
            if ($e instanceof  NotAuthenticatedException) {
                $this->view("user/sign-in", ["error" => "Invalid credentials"]);
            } else {
                throw new InternalServerException();
            }
        }
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
                        $this->view("user/change-password", ["userId" => $userId, "error" => "Invalid password."]);
                    } else {
                        throw new InternalServerException();
                    }
                }
                exit();
            case "promote":
                try {
                    $this->userService->promoteUser($userId);
                    $this->show($userId);
                } catch (Exception $e) {
                    $user = $this->userService->getById($userId);
                    $this->view("user/view", ["user" => $user, "error" => $e->getMessage()]);
                }
                break;
            case "demote":
                try {
                    $this->userService->demoteUser($userId);
                    $this->show($userId);
                } catch (Exception $e) {
                    $user = $this->userService->getById($userId);
                    $this->view("user/view", ["user" => $user, "error" => $e->getMessage()]);
                }
                break;
            default:
                throw new InvalidArgumentException("Invalid update action");
        }
    }
}
