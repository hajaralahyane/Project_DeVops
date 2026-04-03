<?php
include 'db.php';
$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM tasks WHERE id = ?");
$stmt->execute([$id]);
$task = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("UPDATE tasks SET title = ? WHERE id = ?");
    $stmt->execute([$_POST['title'], $id]);
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Modifier une tâche - Todo App</title>
</head>
<body class="edit-page">
    <div class="container edit-form-container">
        <h1>Modifier la tâche</h1>
        
        <form method="POST">
            <input type="text" name="title" value="<?= htmlspecialchars($task['title']) ?>" placeholder="Modifier la tâche" required>
            <button type="submit" class="accent-button">Enregistrer</button>
        </form>
        
        <div class="actions">
            <a href="index.php" class="back-link">← Retourner à la liste</a>
        </div>
    </div>
</body>
</html>