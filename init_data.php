<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require 'db.php';

$password = password_hash('judge123', PASSWORD_DEFAULT);
$stmt = $pdo->prepare("INSERT INTO judges (username, password, display_name) VALUES (?, ?, ?)");
$stmt->execute(['judge1', $password, 'Judge One']);

echo "Judge inserted successfully.";
?>

