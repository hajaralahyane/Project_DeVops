<?php
include 'db.php';
if (isset($_GET['id'])) {
    $stmt = $pdo->prepare("UPDATE tasks SET status = NOT status WHERE id = ?");
    $stmt->execute([$_GET['id']]);
}
header("Location: index.php");
?>