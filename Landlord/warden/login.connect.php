<?php


$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "accommodation"; 


$conn = new mysqli('localhost','root','','accommodation');


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


function sanitizeInput($input) {
    global $conn;
    return mysqli_real_escape_string($conn, htmlspecialchars(strip_tags($input)));
}


function loginUser($email, $password) {
    global $conn;
    $email = sanitizeInput($email);
    $password = sanitizeInput($password);
    
    $query = "SELECT * FROM warden_account WHERE email='$email' AND password='$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
       
        return true;
    } else {
        
        return false;
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['pass'];

        if (loginUser($email, $password)) {
            
            echo "<script>alert('Login successful!');</script>";
            header("Location: index.php");
        } else {
            
            $errorMessage = "Invalid email or password.";
            echo "<script>alert('$errorMessage');</script>";
            echo "<script>window.location.href = 'warden.login.php';</script>";
            
        }
    }
}

?>
