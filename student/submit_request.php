<?php
// Include database connection
include 'db_connection.php';

// Collect form data
$student_name = $_POST['student_name'];
$student_email = $_POST['student_email'];
$student_phone = $_POST['student_phone'];
$property_id = $_POST['property_id'];
$monthly_rental_amount = $_POST['monthly_rental_amount'];
$deposit_amount = $_POST['deposit_amount'];
$property_location = $_POST['property_location'];
$property_desc = $_POST['property_desc'];
$property_image_url = $_POST['property_image_url'];

// SQL query to insert data into database
$sql = "INSERT INTO request_list (student_name, student_email, student_phone, property_id, monthly_rental_amount, deposit_amount, property_location, property_desc, property_image_url) 
        VALUES ('$student_name', '$student_email', '$student_phone', '$property_id', '$monthly_rental_amount', '$deposit_amount', '$property_location', '$property_desc', '$property_image_url')";

// Execute query
if ($conn->query($sql) === TRUE) {
    echo "Request submitted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close database connection
$conn->close();
?>
