<?php
session_start();
require '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $stmt = $pdo->prepare("SELECT * FROM admin WHERE username=? AND password=?");
    $stmt->execute([$username, $password]);

    if ($stmt->rowCount() === 1) {
        $_SESSION['admin'] = $username;
        header('Location: ../dashboard.php');
        exit;
    } else {
        $error = "Invalid login.";
    }
}
?>

<form method="POST">
    <h2>Login</h2>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <input name="username" placeholder="Username" required><br>
    <input name="password" type="password" placeholder="Password" required><br>
    <button type="submit">Login</button>
</form>
