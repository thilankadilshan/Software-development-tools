<?php


$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "accommodation"; 


$conn = new mysqli('localhost','root','','accommodation');


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = sanitize_input($_POST["name"]);
    $phone = sanitize_input($_POST["phone"]);
    $email = sanitize_input($_POST["email"]);
    $password = sanitize_input($_POST["pass"]);
    
    
    $sql = "INSERT INTO landlord_account (name, phone, email, password) VALUES ('$name', '$phone', '$email', '$password')";
    
    if ($conn->query($sql) === TRUE) {
        
        header("Location: landlord.login.php"); 
        exit(); 
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


$conn->close();
?>