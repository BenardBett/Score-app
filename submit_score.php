<?php
session_start();
require 'db.php';
if (!isset($_SESSION['judge_id'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $participant_id = $_POST['participant_id'];
    $score = $_POST['score'];
    $judge_id = $_SESSION['judge_id'];
    $stmt = $pdo->prepare("INSERT INTO scores (judge_id, participant_id, score) VALUES (?, ?, ?)");
    $stmt->execute([$judge_id, $participant_id, $score]);
    $message = "Score submitted.";
}
$participants = $pdo->query("SELECT * FROM participants")->fetchAll();
?>
<html><head><link rel="stylesheet" href="style.css"></head><body>
<h2>Submit Score</h2>
<?php if (isset($message)) echo "<p>$message</p>"; ?>
<form method="POST">
  Participant: <select name="participant_id">
    <?php foreach ($participants as $p): ?>
      <option value="<?= $p['id'] ?>"><?= $p['name'] ?></option>
    <?php endforeach; ?>
  </select><br>
  Score: <input type="number" name="score" min="0" max="100" required><br>
  <button type="submit">Submit</button>
</form>
<p><a href="logout.php">Logout</a></p>
</body></html>