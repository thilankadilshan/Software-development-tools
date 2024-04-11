<?php
// Establishing a connection to the database
$servername = "localhost"; // Your MySQL server name
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "accommodation"; // Your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieving form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $property_name = $_POST["property_name"];
    $property_id = $_POST["property_id"];
    $property_location = $_POST["property_location"];

    // Inserting data into the database
    
    // Constructing SQL query
    $sql = "INSERT INTO property_list (property_name, property_id, property_location)
            VALUES ('$property_name', '$property_id', '$property_location')";

    // Executing SQL query
    if ($conn->query($sql) === TRUE) {
        $response = "New record created successfully";
        echo "<script>
                window.onload = function() {
                    Swal.fire('Success!', '$response', 'success');
                };
              </script>";
    } else {
        $error_message = "Error: " . $sql . "<br>" . $conn->error;
        echo "<script>
                window.onload = function() {
                    Swal.fire('Error!', '$error_message', 'error');
                };
              </script>";
    }
}

// Closing the database connection
$conn->close();
?>
