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
            throw new Exception("A user with this email already exists");
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

        throw new Exception("Not authenticated.");
    }

    public function updatePassword(string $email, string $currentPassword, string $newPassword)
    {
        $user = $this->userRepository->getByEmail($email);

        if (!$user) {
            throw new Exception("User not found");
        }

        if (!password_verify($currentPassword, $user->getPassword())) {
            throw new Exception("Current password is incorrect");
        }

        $user->setPassword(password_hash($newPassword, PASSWORD_DEFAULT));

        $this->userRepository->save($user);
    }

    public function promoteUser(int $userId, string $requestorUserId)
    {
        $requestorUser = $this->userRepository->getById($requestorUserId);

        if (!$requestorUser) {
            throw new Exception("User not found");
        }

        if ($requestorUser->getRole() !== "admin") {
            throw new Exception("Only admins can promote");
        }

        $user = $this->userRepository->getById($userId);

        $user->setRole("admin");

        $this->userRepository->save($user);
    }

    public function demoteUser(int $userId, string $requestorUserId)
    {
        if ($userId === $requestorUserId) {
            throw new Exception("Can't demote yourself");
        }

        $requestorUser = $this->userRepository->getById($requestorUserId);

        if (!$requestorUser) {
            throw new Exception("User not found");
        }

        if ($requestorUser->getRole() !== "admin") {
            throw new Exception("Only admins can demote");
        }

        $user = $this->userRepository->getById($userId);

        $user->setRole("regular");

        $this->userRepository->save($user);
    }
}
