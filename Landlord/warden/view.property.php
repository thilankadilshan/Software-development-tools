<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accommodation</title>
    <link href="assests/favicon.png" rel="icon">
    <link href="assests/apple-touch-icon.png" rel="apple-touch-icon">
    <script src="https://kit.fontawesome.com/f0e01b6c2e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/warden.css">

    <style>

        .logo1 {
            width: auto;
            height: 70px;
        }

    </style>

</head>

<body>


<?php include ("partials/nav.php"); ?>


    <section class="view-property">
        <div class="details">
            <div class="thumb">
                <div class="big-image">

<?php

    // Database Connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "accommodation";

    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Query the Database
$property_id = $_GET['id']; 

$sql = "SELECT * FROM property_list WHERE property_id = $property_id";
$result = $conn->query($sql);

// Fetch the Data
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Assign Data to Variables
    $property_name = $row["property_name"];
    $property_location = $row["property_location"];
    $monthly_rental_amount = $row["monthly_rental_amount"];
    $owner_name = $row["owner_name"];
    $phone_number = $row["phone_number"];
    $building_type = $row["building_type"];
    $agreement_type = $row["agreement_type"];
    $property_desc = $row["property_desc"];
    $property_image_url = $row["property_image_url"];

} else {
    echo "No property found";
}

// Close the database connection
$conn->close();
?>

<?php
// Define your database connection details
$servername = "localhost"; // Change this to your MySQL server hostname
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$dbname = "accommodation"; // Change this to your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch property details from the database (assuming the table name is 'properties')
$sql = "SELECT property_image_url, property_name, property_location, monthly_rental_amount, owner_name, phone_number, building_type, agreement_type FROM property_list WHERE property_id = ?"; 
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $property_id); 
$stmt->execute();
$result = $stmt->get_result();

// Initialize variables to store fetched values
$property_image_url = $property_name = $property_location = $monthly_rental_amount = $owner_name = $phone_number = $building_type = $agreement_type = "";

if ($result->num_rows > 0) {
    // Fetch data
    $row = $result->fetch_assoc();
    $property_image_url = $row["property_image_url"];
    $property_name = $row["property_name"];
    $property_location = $row["property_location"];
    $monthly_rental_amount = $row["monthly_rental_amount"];
    $owner_name = $row["owner_name"];
    $phone_number = $row["phone_number"];
    $building_type = $row["building_type"];
    $agreement_type = $row["agreement_type"];
}

// Close connection
$stmt->close();
$conn->close();
?>

<section class="view-property">
    <div class="details">
        <div class="thumb">
        <!-- Main Image -->
        <img src="<?php echo htmlspecialchars('../'.$row["property_image_url"]); ?>" alt="<?php echo htmlspecialchars($row["property_name"]); ?>">

        <!-- Additional small images can be added dynamically here -->
        </div>

        <h3 class="name"><?php echo $property_name; ?></h3>
        <p class="location"><a href="<?php echo $property_location; ?>" target="_blank"><i class="fas fa-map-marker-alt"></i><span><?php echo $property_location; ?></span></a></p>
        <div class="info">
            <p><i class="fas fa-tag"></i><span><?php echo $monthly_rental_amount; ?></span></p>
            <p><i class="fas fa-user"></i><span><?php echo $owner_name; ?></span></p>
            <p><i class="fas fa-phone"></i><a href="tel:<?php echo $phone_number; ?>"><?php echo $phone_number; ?></a></p>
            <p><i class="fas fa-building"></i><span><?php echo $building_type; ?></span></p>
            <p><i class="fas fa-house"></i><span><?php echo $agreement_type; ?></span></p>
        </div>
    </div>
</section>


        <h3 class="title">details</h3>
        <div class="flex">

<?php

// Define your database connection details
$servername = "localhost"; // Change this to your MySQL server hostname
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$dbname = "accommodation"; // Change this to your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch property details from the database (assuming the table name is 'property_details')
$sql = "SELECT deposit_amount, bedrooms, bathrooms, carpet_area, furniture, kitchen, security_guards, power_backup FROM property_list WHERE property_id = ?"; // Change 'property_details' to your actual table name
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $property_id); // Assuming $property_id holds the ID of the property you want to fetch details for
$stmt->execute();
$result = $stmt->get_result();

// Initialize variables to store fetched values
$deposit_amount = $bedrooms = $bathrooms = $carpet_area = $furniture = $kitchen = $security_guards = $power_backup = "";

if ($result->num_rows > 0) {
    // Fetch data
    $row = $result->fetch_assoc();
    $deposit_amount = $row["deposit_amount"];
    $bedrooms = $row["bedrooms"];
    $bathrooms = $row["bathrooms"];
    $carpet_area = $row["carpet_area"];
    $furniture = $row["furniture"];
    $kitchen = $row["kitchen"];
    $security_guards = $row["security_guards"];
    $power_backup = $row["power_backup"];
}

// Close connection
$stmt->close();
$conn->close();

// Define property details array
$property_details = array(
    array("label" => "Deposit Amount", "value" => $deposit_amount),
    array("label" => "Bedrooms", "value" => $bedrooms),
    array("label" => "Bathrooms", "value" => $bathrooms),
    array("label" => "Carpet Area", "value" => $carpet_area . " sq.ft"),
    array("label" => "Furniture", "value" => $furniture),
    array("label" => "Kitchen", "value" => $kitchen),
    array("label" => "Security Guards", "value" => $security_guards),
    array("label" => "Power Backup", "value" => $power_backup),
);

// Output property details
foreach ($property_details as $detail) {
    echo '<div class="box">';
    echo '<p><i>' . $detail["label"] . ' :</i><span>' . $detail["value"] . '</span></p>';
    echo '</div>';
}
?>

</div>
</div>


<div class="box">

<!-- Add property facilities dynamically -->

</div>
        </div>
        <div class="view-property">
    <div class="details">
        <h3 class="title">Description</h3>
        <p class="description"><?php echo $property_desc; ?></p>
    </div>
</div>


</section>

<?php include ("partials/footer.php"); ?>

    
 
 <!-- view property section ends -->



    <script src="js/script.js"></script>

</body>
</html>