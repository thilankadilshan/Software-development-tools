<?php
session_start();
require_once 'config.php';

if (isset($_POST['submit'])) {
    $student_id = $_POST['student_id'];
    $password = $_POST['password'];

    // Validate input
    if (empty($student_id) || empty($password)) {
        $_SESSION['error'] = "All fields are required";
        header('location: login.php');
        exit;
    }

    // Check if student_id exists
    $stmt = $conn->prepare("SELECT * FROM students WHERE student_id = ?");
    $stmt->bind_param("s", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 0) {
        $_SESSION['error'] = "Student ID not found";
        header('location: login.php');
        exit;
    }

    $row = $result->fetch_assoc();
    $db_password = $row['password'];

    // Verify password
    if (!password_verify($password, $db_password)) {
        $_SESSION['error'] = "Incorrect password";
        header('location: login.php');
        exit;
    }

    // Set session variables
    $_SESSION['student_id'] = $student_id;
    $_SESSION['full_name'] = $row['full_name'];
    $_SESSION['gender'] = $row['gender'];

    // Redirect to dashboard
    header('location: ../index.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger">
                <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="student_id">Student ID:</label>
                <input type="text" name="student_id" id="student_id" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>
</body>
</html>