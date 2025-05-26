<?php
require 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    if ($name) {
        $stmt = $pdo->prepare("INSERT INTO participants (name) VALUES (?)");
        $stmt->execute([$name]);
        $message = "Participant added.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Participant</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Add Participant</h2>
<form method="post">
    <input type="text" name="name" placeholder="Participant Name" required>
    <button type="submit">Add</button>
</form>
<?= $message ?? '' ?>
</body>
</html>