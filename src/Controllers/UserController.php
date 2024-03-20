<?php
require_once __DIR__ . "/../Models/User.php";
class UserController
{
    private $userModel;

    public function __construct($pdo)
    {
        $this->userModel = new User($pdo);
    }
    public function register(array $data)
    {
        try {
            // ตรวจสอบว่าข้อมูลจำเป็นถูกกรอกมาครบถ้วนหรือไม่
            if (empty($data['email']) || empty($data['name']) || empty($data['password'])) {
                throw new Exception("Please fill in all required fields.");
            }
            // ส่งข้อมูลไปให้ Models เพื่อลงทะเบียนผู้ใช้
            $this->userModel->createUser($data['email'], $data['name'], $data['password']);

            return "Registration successful.";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
