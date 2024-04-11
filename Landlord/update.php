<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>

    <!-- Include SweetAlert2 library in the header -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

<?php
$servername = "localhost"; // Change this to your database server hostname
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$dbname = "accommodation"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize input data
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $property_id = sanitize_input($_POST["property_id"]);
    $property_name = sanitize_input($_POST["property_name"]);
    $property_location = sanitize_input($_POST["property_location"]);
    $monthly_rental_amount = sanitize_input($_POST["monthly_rental_amount"]);
    $owner_name = sanitize_input($_POST["owner_name"]);
    $phone_number = sanitize_input($_POST["phone_number"]);
    $building_type = sanitize_input($_POST["building_type"]);
    $agreement_type = sanitize_input($_POST["agreement_type"]);
    $deposit_amount = sanitize_input($_POST["deposit_amount"]);
    $bedrooms = sanitize_input($_POST["bedrooms"]);
    $bathrooms = sanitize_input($_POST["bathrooms"]);
    $carpet_area = sanitize_input($_POST["carpet_area"]);
    $furniture = sanitize_input($_POST["furniture"]);
    $kitchen = sanitize_input($_POST["kitchen"]);
    $security_guards = sanitize_input($_POST["security_guards"]);
    $power_backup = sanitize_input($_POST["power_backup"]);
    $property_desc = sanitize_input($_POST["property_desc"]);
    $property_image_url = isset($_POST["property_image_url"]) ? sanitize_input($_POST["property_image_url"]) : "";

    // Update the property details in the database
    $sql = "UPDATE property_list SET property_name=?, property_location=?, monthly_rental_amount=?, owner_name=?, phone_number=?, building_type=?, agreement_type=?, deposit_amount=?, bedrooms=?, bathrooms=?, carpet_area=?, furniture=?, kitchen=?, security_guards=?, power_backup=?, property_desc=?, property_image_url=? WHERE property_id=?";
    $stmt = $conn->prepare($sql);

    // Ensure the number of placeholders and bind variables match
    $stmt->bind_param("ssssssssiiissssssi", $property_name, $property_location, $monthly_rental_amount, $owner_name, $phone_number, $building_type, $agreement_type, $deposit_amount, $bedrooms, $bathrooms, $carpet_area, $furniture, $kitchen, $security_guards, $power_backup, $property_desc, $property_image_url, $property_id);

    if ($stmt->execute()) {
        echo "<script>
        // Show SweetAlert
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: 'Your property has been updated successfully.',
            showConfirmButton: false,
            timer: 2000 // Auto close after 2 seconds
        }).then(function() {
            // Redirect to another page
            window.location.href = 'update_ad.php';
        });
        </script>";
    } else {
        echo "<script>
        // Show SweetAlert
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Your property has not been updated successfully.',
            showConfirmButton: false,
            timer: 2000 // Auto close after 2 seconds
        }).then(function() {
            // Redirect to another page
            window.location.href = 'update_ad.php';
        });
        </script>";
    }
}

// Close the database connection
$conn->close();
?>

</body>
</html>
