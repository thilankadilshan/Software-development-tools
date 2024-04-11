<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$database = "accommodation";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['name'];
    $password = $_POST['password'];

    // SQL injection prevention
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // Query to fetch user from database
    $sql = "SELECT * FROM landlord_account WHERE name='$email' AND pwd='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // User authenticated, redirect to dashboard or some other page
        header("Location: index.php");
        exit();
    } else {
        // Authentication failed, display error message
        echo "Invalid username or password";
    }
}
?>
