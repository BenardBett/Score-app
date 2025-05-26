<?php
require 'db.php';
$stmt = $pdo->query("SELECT p.name, AVG(s.score) AS avg_score FROM participants p LEFT JOIN scores s ON p.id = s.participant_id GROUP BY p.id ORDER BY avg_score DESC");
$results = $stmt->fetchAll();
?>
<html><head><link rel="stylesheet" href="style.css"></head><body>
<h2>Scoreboard</h2>
<table border="1">
  <tr><th>Participant</th><th>Average Score</th></tr>
  <?php foreach ($results as $row): ?>
    <tr><td><?= $row['name'] ?></td><td><?= round($row['avg_score'], 2) ?></td></tr>
  <?php endforeach; ?>
</table>
</body></html>