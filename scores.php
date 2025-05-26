<?php
session_start();
if (!isset($_SESSION['judge_logged_in'])) {
    header('Location: login.php');
    exit();
}
require 'db.php';

// Fetch participants
$stmt = $pdo->query("SELECT * FROM participants");
$participants = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Submit Scores</h2>
<form action="submit_score.php" method="post">
    <label for="participant_id">Participant:</label>
    <select name="participant_id" required>
        <?php foreach ($participants as $participant): ?>
            <option value="<?= $participant['id'] ?>"><?= htmlspecialchars($participant['name']) ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <label for="score">Score (0 - 100):</label>
    <input type="number" name="score" min="0" max="100" required><br><br>

    <button type="submit">Submit Score</button>
</form>
