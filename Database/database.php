<?php
// db_connection.php

$dsn = 'mysql:host=localhost;dbname=real_estate;charset=utf8mb4';
$db_user = 'root';
$db_password = '';

try {
    $pdo = new PDO($dsn, $db_user, $db_password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Database connection failed: ' . $e->getMessage());
}
?>
