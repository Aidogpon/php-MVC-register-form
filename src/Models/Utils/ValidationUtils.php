<?php
class ValidationUtils
{
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    // ตรวจสอบอีเมลกับชื่อที่ไม่ซ้ำกัน
    public function isEmailUnique($email)
    {
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->rowCount() === 0;
    }
    public function isUsernameUnique($name)
    {
        $sql = "SELECT * FROM users WHERE name = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$name]);
        return $stmt->rowCount() === 0;
    }
}
