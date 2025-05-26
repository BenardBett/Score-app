<?php
session_start();
require 'db.php';

if (!isset($_SESSION['judge_id'])) {
    die("Unauthorized.");
}

$participant_id = $_POST['participant_id'];
$score = $_POST['score'];
$judge_id = $_SESSION['judge_id'];

$stmt = $pdo->prepare("INSERT INTO scores (participant_id, judge_id, score) VALUES (?, ?, ?)");
$stmt->execute([$participant_id, $judge_id, $score]);

echo "Score submitted successfully.";
?>
