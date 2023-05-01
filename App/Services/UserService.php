<?php
class UserService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function signUp(string $name, string $email, string $password)
    {
        $existingUser = $this->userRepository->getByEmail($email);
        if ($existingUser) {
            throw new InvalidArgumentException("A user with this email already exists");
        }

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $user = new User(null, $name, $email, $passwordHash, "regular");
        $this->userRepository->save($user);
    }

    public function signIn(string $email, string $password)
    {
        $user = $this->userRepository->getByEmail($email);

        if ($user && password_verify($password, $user->getPassword())) {
            return new ViewUserDTO($user);
        }

        throw new NotAuthenticatedException("Not authenticated.");
    }

    public function updatePassword(string $email, string $currentPassword, string $newPassword)
    {
        $user = $this->userRepository->getByEmail($email);

        if (!$user) {
            throw new NotAuthenticatedException("User not found");
        }

        if (!password_verify($currentPassword, $user->getPassword())) {
            throw new NotAuthenticatedException("Current password is incorrect");
        }

        $user->setPassword(password_hash($newPassword, PASSWORD_DEFAULT));

        $this->userRepository->save($user);
    }

    public function getAll()
    {
        if ($_SESSION["user"]->getRole() != "admin") {
            throw new UnauthorizedException();
        }

        $users = $this->userRepository->getAll();
        $userDTOs = [];

        foreach ($users as $user) {
            $userDTOs[] = new ViewUserDTO($user);
        }

        return $userDTOs;
    }

    public function getById(int $id)
    {
        $user = $this->userRepository->getById($id);

        if (!$user) {
            throw new NotFoundException("User not found.");
        }

        return new ViewUserDTO($user);
    }

    public function promoteUser(int $userId)
    {
        $requestorUser = $this->userRepository->getById($_SESSION["user"]->getId());

        if (!$requestorUser) {
            throw new NotFoundException("User not found");
        }

        if ($requestorUser->getRole() !== "admin") {
            throw new UnauthorizedException("Only admins can promote");
        }

        $user = $this->userRepository->getById($userId);

        $user->setRole("admin");

        $this->userRepository->save($user);
    }

    public function demoteUser(int $userId)
    {
        $requestorUserId = $_SESSION["user"]->getId();

        if ($userId === $requestorUserId) {
            throw new UnauthorizedException("Can't demote yourself");
        }

        $requestorUser = $this->userRepository->getById($requestorUserId);

        if (!$requestorUser) {
            throw new UnauthorizedException("User not found");
        }

        if ($requestorUser->getRole() !== "admin") {
            throw new UnauthorizedException("Only admins can demote");
        }

        $user = $this->userRepository->getById($userId);

        $user->setRole("regular");

        $this->userRepository->save($user);
    }
}
