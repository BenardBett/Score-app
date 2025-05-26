
<?php
session_start();
require 'db.php';
$error = '';
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $stmt = $pdo->prepare("SELECT * FROM judges WHERE username = ?");
    $stmt->execute([$username]);
    $judge = $stmt->fetch();
    if ($judge && password_verify($password, $judge["password"])) {
        $_SESSION["judge_id"] = $judge["id"];
        header("Location: submit_score.php");
        exit;
    } else {
        $error = "Invalid login.";
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Judge Login</title><link rel="stylesheet" href="style.css"></head>
<body>
<h2>Judge Login</h2>
<form method="post">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Login</button>
</form>
<p style="color:red;"><?= $error ?></p>
</body>
</html>