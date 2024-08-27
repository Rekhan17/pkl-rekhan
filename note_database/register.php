<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if ($password === $cpassword) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $pdo->prepare("INSERT INTO user (firstname, lastname, email, password) VALUES (?, ?, ?, ?)");
        if ($stmt->execute([$firstname, $lastname, $email, $hashed_password])) {
            header("Location: login.php");
        } else {
            echo "Error: Could not register.";
        }
    } else {
        echo "Passwords do not match.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Register</title>
</head>
<body>
    <section class="register">
        <form method="POST">
            <h1>Register</h1>
            <input type="text" name="firstname" placeholder="First Name" required>
            <input type="text" name="lastname" placeholder="Last Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="cpassword" placeholder="Confirm Password" required>
            <button type="submit">Register</button>
            <a href="login.php">Login</a>
        </form>
    </section>
</body>
</html>
