<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $stmt = $pdo->prepare("INSERT INTO notes (user_id, title, content) VALUES (?, ?, ?)");
    if ($stmt->execute([$_SESSION['user_id'], $title, $content])) {
        header("Location: index.php");
    } else {
        echo "Error: Could not add note.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Note - Notes App</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <section class="add-note">
        <form method="POST">
            <h1>Add Note</h1>
            <input type="text" name="title" placeholder="Title" required>
            <textarea name="content" placeholder="Content" required></textarea>
            <button type="submit">Add Note</button>
            <a href="index.php">Cancel</a>
        </form>
    </section>
</body>
</html>
