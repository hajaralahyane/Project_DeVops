<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Ma Todo List</title>
</head>
<body>
    <div class="container">
        <h1>Gestion de Tâches</h1>
        
        <form action="add_task.php" method="POST">
            <input type="text" name="title" placeholder="Nouvelle tâche..." required>
            <button type="submit">Ajouter</button>
        </form>

        <ul>
            <?php
            $stmt = $pdo->query("SELECT * FROM tasks ORDER BY id DESC");
            while ($row = $stmt->fetch()) {
                $statusClass = $row['status'] ? 'completed' : '';
                echo "<li>
                        <span class='$statusClass'>" . htmlspecialchars($row['title']) . "</span>
                        <div class='actions'>
                            <a href='update_task.php?id={$row['id']}'>✔</a>
                            <a href='edit_task.php?id={$row['id']}'>✏️</a>
                            <a href='delete_task.php?id={$row['id']}' onclick='return confirm(\"Supprimer ?\")'>❌</a>
                        </div>
                      </li>";
            }
            ?>
        </ul>
    </div>
</body>
</html>