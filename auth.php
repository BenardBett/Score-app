<?php
session_start();
if (!isset($_SESSION['judge_id'])) {
    header('Location: login.php');
    exit();
}
?>
