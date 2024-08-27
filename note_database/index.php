<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

include 'db.php';

$stmt = $pdo->prepare("SELECT * FROM notes WHERE user_id = ?");
$stmt->execute([$_SESSION['user_id']]);
$notes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Notes App</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <section class="home">
        <header>
            <h1>My Notes</h1>
            <p><?php echo $_SESSION['email'];?></p>
            <form method="POST" action="logout.php">
                <button type="submit" name="logout">Logout</button>
            </form>
        </header>
        <a href="add.php">Add Note</a>
        <div class="notes">
            <?php foreach ($notes as $note): ?>
                <div class="note">
                    <h3><?php echo htmlspecialchars($note['title']); ?></h3>
                    <p><?php echo htmlspecialchars($note['content']); ?></p>
                    <a href="edit.php?id=<?php echo $note['id']; ?>">Edit</a>
                    <a href="delete.php?id=<?php echo $note['id']; ?>">Delete</a>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</body>
</html>
