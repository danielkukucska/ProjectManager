<?php
class UserRepository
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAll()
    {
        $stmt = $this->db->prepare("SELECT * FROM users");
        $stmt->execute();
        $rows = $stmt->fetchAll();

        $users = [];
        foreach ($rows as $row) {
            $user = new User($row["id"], $row["name"], $row["email"], $row["password"], $row["role"]);
            $users[] = $user;
        }

        return $users;
    }

    public function getById(int $id)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch();

        if ($row) {
            return new User($row["id"], $row["name"], $row["email"], $row["password"], $row["role"]);
        } else {
            return null;
        }
    }

    public function getByEmail(string $email)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $row = $stmt->fetch();

        if ($row) {
            return new User($row["id"], $row["name"], $row["email"], $row["password"], $row["role"]);
        } else {
            return null;
        }
    }

    public function save(User $user)
    {
        if ($user->getId()) {
            $stmt = $this->db->prepare("UPDATE users SET name = ?, email = ?, password = ? WHERE id = ?");
            $stmt->execute([$user->getName(), $user->getEmail(), $user->getPassword(), $user->getId()]);
        } else {
            $stmt = $this->db->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
            $stmt->execute([$user->getName(), $user->getEmail(), $user->getPassword()]);

            $user->setId($this->db->lastInsertId());
        }
    }

    public function delete(User $user)
    {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = ?");
        $stmt->execute([$user->getId()]);
    }
}
