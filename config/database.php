<?php

//ตั้งค่าที่ phpMyAdmin ส่วน Privileges
$host = 'localhost';
$dbname = 'jctdatabase';
$user = 'root';
$password = '';

//จัดการ mySQL ด้วย PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);

    //PDO::ATTR_ERRMODE ตั้งค่าให้ PDO รายงานข้อผิดพลาดจากการทำงานกับฐานข้อมูล
    //PDO::ERRMODE_EXCEPTION ตั้งค่านี้ให้ PDO ช่วย throw ข้อผิดพลาด เพื่อ catch
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
