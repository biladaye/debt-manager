<?php
$host = 'localhost';
$db = 'debt_manager';
$user = 'root';
$pass = ''; // your MySQL password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
} catch (PDOException $e) {
    die("DB Connection failed: " . $e->getMessage());
}
?>