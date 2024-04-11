<?php
session_start();
require_once 'config.php'; // include database configuration file

if (isset($_POST['submit'])) {
    $full_name = $_POST['full_name'];
    $student_id = $_POST['student_id'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // hashing password
    $gender = $_POST['gender'];

    $sql = "INSERT INTO students (full_name, student_id, password, gender) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $full_name, $student_id, $password, $gender);

    if ($stmt->execute()) {
        $_SESSION['success'] = "New account created successfully";
        header('location: login.php'); // redirect to login page
    } else {
        $_SESSION['error'] = "Error: " . $stmt->error;
        header('location: signup.php'); // redirect back to signup page
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Student Sign Up</h2>
        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success">
                <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
            </div>
        <?php endif; ?>
        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger">
                <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>
        <form action="signup.php" method="post">
            <div class="form-group">
                <label for="full_name">Full Name:</label>
                <input type="text" name="full_name" id="full_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="student_id">Student ID:</label>
                <input type="text" name="student_id" id="student_id" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select name="gender" id="gender" class="form-control" required>
                    <option value="">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary">Sign Up</button>
            </div>
        </form>
    </div>
</body>
</html>