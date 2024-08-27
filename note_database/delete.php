<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

include 'db.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM notes WHERE id = ? AND user_id = ?");
if ($stmt->execute([$id, $_SESSION['user_id']])) {
    header("Location: index.php");
} else {
    echo "Error: Could not delete note.";
}
?>
