<?php

session_start();

if (isset($_SESSION['success_message'])) {
    echo '<div class="alert alert-success">' . $_SESSION['success_message'] . '</div>';
    unset($_SESSION['success_message']);
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "accommodation";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$full_name = $_POST['full_name'];
$email_address = $_POST['email_address'];
$phone_number = $_POST['phone_number'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$sql = "INSERT INTO contact_us (full_name, email_address, phone_number, subject, message) VALUES ('$full_name', '$email_address', '$phone_number', '$subject', '$message')";

if ($conn->query($sql) === TRUE) {
    // Set success message and redirect to index.php
    $_SESSION['success_message'] = 'Your message has been sent successfully!';
    header('Location: index.php');
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>