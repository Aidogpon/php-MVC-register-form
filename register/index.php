<?php

// ตรวจสอบว่ามี POST request หรือไม่
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require_once __DIR__ . "/../config/database.php";
    require_once __DIR__ . "/../src/Controllers/UserController.php";

    $userController = new UserController($pdo);

    // ส่งข้อมูลไปให้ method register ของ UserController
    try {
        $response = $userController->register($_POST);
        $successMessage = $response;
    } catch (Exception $e) {
        $errorMessage = $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>

<body>
    <h2>Register</h2>

    <!-- แสดงข้อความสำเร็จและข้อผิดพลาด -->
    <?php if (!empty($successMessage)) : ?>
        <p style="color: green;"><?= htmlspecialchars($successMessage) ?></p>
    <?php elseif (!empty($errorMessage)) : ?>
        <p style="color: red;"><?= htmlspecialchars($errorMessage) ?></p>
    <?php endif; ?>

    <form action="register.php" method="post">
        Email: <input type="email" name="email" required><br>
        Name: <input type="text" name="name" required><br>
        Password: <input type="password" name="password" required><br>
        <input type="submit" value="Register">
    </form>
    <script src="js/validation.js"></script>
</body>

</html>