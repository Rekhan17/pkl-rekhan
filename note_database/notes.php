<?php
session_start();
require 'db.php';

// Pastikan user sudah login
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];

// Tambah catatan
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_note'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $stmt = $pdo->prepare('INSERT INTO notes (user_id, title, content) VALUES (?, ?, ?)');
    if ($stmt->execute([$user_id, $title, $content])) {
        header('Location: notes.php');
        exit();
    } else {
        echo "Error: Could not add note.";
    }
}

// Edit catatan
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_note'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    $stmt = $pdo->prepare('UPDATE notes SET title = ?, content = ? WHERE id = ? AND user_id = ?');
    if ($stmt->execute([$title, $content, $id, $user_id])) {
        header('Location: notes.php');
        exit();
    } else {
        echo "Error: Could not update note.";
    }
}

// Hapus catatan
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_note'])) {
    $id = $_POST['id'];

    $stmt = $pdo->prepare('DELETE FROM notes WHERE id = ? AND user_id = ?');
    if ($stmt->execute([$id, $user_id])) {
        header('Location: notes.php');
        exit();
    } else {
        echo "Error: Could not delete note.";
    }
}

// Fetch all notes for the user
$stmt = $pdo->prepare('SELECT * FROM notes WHERE user_id = ? ORDER BY created_at DESC');
$stmt->execute([$user_id]);
$notes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Notes</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Your Notes</h1>

    <h2>Add Note</h2>
    <form method="POST">
        <input type="text" name="title" placeholder="Note Title" required>
        <textarea name="content" placeholder="Note Content" required></textarea>
        <button type="submit" name="add_note">Add Note</button>
    </form>

    <h2>Existing Notes</h2>
    <ul>
        <?php foreach ($notes as $note): ?>
            <li>
                <h3><?php echo htmlspecialchars($note['title']); ?></h3>
                <p><?php echo htmlspecialchars($note['content']); ?></p>

                <form method="POST" style="display:inline;">
                    <input type="hidden" name="id" value="<?php echo $note['id']; ?>">
                    <input type="text" name="title" value="<?php echo htmlspecialchars($note['title']); ?>" required>
                    <textarea name="content" required><?php echo htmlspecialchars($note['content']); ?></textarea>
                    <button type="submit" name="edit_note">Edit</button>
                </form>

                <form method="POST" style="display:inline;">
                    <input type="hidden" name="id" value="<?php echo $note['id']; ?>">
                    <button type="submit" name="delete_note">Delete</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
