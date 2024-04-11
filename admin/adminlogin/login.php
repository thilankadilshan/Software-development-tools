<?php
session_start();
require_once 'config.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin_users WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['admin_id'] = $result->fetch_assoc()['id'];
        header('Location: ../index.php');
    } else {
        $error_message = "Invalid email or password.";
    }

    $stmt->close();
    $conn->close();
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="login.php" method="post">
        <h1>Admin Login</h1>
        <div class="error"><?php if(isset($error_message)) { echo $error_message; } ?></div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <input type="submit" name="login" value="Login">
    </form>
</body>
</html>
