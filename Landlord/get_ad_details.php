<?php
// Assuming your database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "accommodation";

// Retrieve property ID from the AJAX request
$eventId = $_GET['property_id'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve property details from the database
$sql = "SELECT property_name, event_time, event_venue FROM events_list WHERE event_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $eventId);
$stmt->execute();
$stmt->bind_result($eventName, $eventTime, $eventVenue);

// Fetch event details
if ($stmt->fetch()) {
    // Construct JSON response
    $response = array(
        'event_name' => $eventName,
        'event_time' => $eventTime,
        'event_venue' => $eventVenue
    );

    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // If event ID is not found, return an empty response
    echo json_encode(array());
}

// Close connections
$stmt->close();
$conn->close();
?>
