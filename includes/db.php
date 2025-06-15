<?php
// /includes/db.php

$host = 'localhost';
$dbname = 'ProjetPHPBD';
$user = 'root'; //  اسم مستخدم قاعدة البيانات الافتراضي
$pass = ''; // كلمة مرور قاعدة البيانات الافتراضية

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}
?>