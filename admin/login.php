<?php
session_start();
include '../koneksi.php';
if (isset($_SESSION['admin'])) {
    header('Location: dashboard.php');
    exit();
}
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $result = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password' LIMIT 1");
    if ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['admin'] = $row['username'];
        $session_id = session_id();
        mysqli_query($conn, "UPDATE user SET session_admin='$session_id' WHERE id=" . $row['id']);
        header('Location: dashboard.php');
        exit();
    } else {
        $error = 'Username atau password salah!';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login-container">
        <h2>Login Admin</h2>
        <?php if ($error) echo '<p class="error">'.$error.'</p>'; ?>
        <form method="post">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
