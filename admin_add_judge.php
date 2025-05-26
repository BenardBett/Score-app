<?php
require 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    if ($username && $password) {
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO judges (username, password) VALUES (?, ?)");
        $stmt->execute([$username, $hashed]);
        $message = "Judge added.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Judge</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Add Judge</h2>
<form method="post">
    <input type="text" name="username" placeholder="Judge Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Add</button>
</form>
<?= $message ?? '' ?>
</body>
</html>