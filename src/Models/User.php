<?php
require_once __DIR__ . "/Utils/ValidationUtils.php";

class User
{
    protected $pdo;
    protected $validator;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
        $this->validator = new ValidationUtils($pdo);
    }

    public function createUser($email, $name, $password)
    {
        if (!$this->validator->isEmailUnique($email)) {
            throw new Exception("Email already exists.");
        }
        if (!$this->validator->isUsernameUnique($name)) {
            throw new Exception("Username already exists.");
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (uuid, email, name, password, date) VALUES (UUID(), ?, ?, ?, NOW())";
        $stmt = $this->pdo->prepare($sql);
        if ($stmt->execute([$email, $name, $hashedPassword])) {
            return true;
        } else {
            throw new Exception("Failed to create user.");
        }
    }
}
