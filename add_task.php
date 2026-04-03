<?php
include 'db.php';
if (isset($_POST['title'])) {
    $title = $_POST['title'];
    $stmt = $pdo->prepare("INSERT INTO tasks (title) VALUES (?)");
    $stmt->execute([$title]);
}
header("Location: index.php");
?>