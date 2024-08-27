<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

include 'db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM notes WHERE id = ? AND user_id = ?");
$stmt->execute([$id, $_SESSION['user_id']]);
$note = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $stmt = $pdo->prepare("UPDATE notes SET title = ?, content = ? WHERE id = ? AND user_id = ?");
    if ($stmt->execute([$title, $content, $id, $_SESSION['user_id']])) {
        header("Location: index.php");
    } else {
        echo "Error: Could not update note.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Note - Notes App</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <section class="edit-note">
        <form method="POST">
            <h1>Edit Note</h1>
            <input type="text" name="title" value="<?php echo htmlspecialchars($note['title']); ?>" required>
            <textarea name="content" required><?php echo htmlspecialchars($note['content']); ?></textarea>
            <button type="submit">Update Note</button>
            <a href="index.php">Cancel</a>
        </form>
    </section>
</body>
</html>
