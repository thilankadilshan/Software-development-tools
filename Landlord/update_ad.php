<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Ad</title>
    <link href="assests/icon.png" rel="icon">

    <!-- Include necessary CSS and JavaScript libraries -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-c7+0AAz7/n8mcJSXWO4JMqevgiMiCm+3sZLoflFOJSpBoys+Xky8n4HPQCw1XGoa9mrINvIzI7PrfXGxvH3hiQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Include your custom CSS -->
    <link href="css/styles.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #d5d0d0;
            background-size: cover;
        }
        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f4f4f4;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            display: grid;
            gap: 30px;
        }
        input[type="text"],
        input[type="time"],
        input[type="date"],
        input[type="number"],
        select,
        textarea {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            width: 100%;
        }
        input[type="file"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            width: 100%;
        }
        input[type="submit"] {
            background-color: #333;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>

</head>
<body>

<?php include ('partials/nav.php') ?>

<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

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

// Initialize variables
$property_id = $property_name = $property_location = $monthly_rental_amount = $owner_name = $phone_number = $building_type = $agreement_type = $deposit_amount = $bedrooms = $bathrooms = $carpet_area = $furniture = $kitchen = $security_guards = $power_backup = $property_desc = $property_image_url = "";

// Function to sanitize input data
function sanitize_input($data)
{
    if ($data != null) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    return "";
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize property ID
    if (isset($_POST["property_id"])) {
        $property_id = sanitize_input($_POST["property_id"]);

        // Fetch event details from database based on property ID
        $sql = "SELECT * FROM property_list WHERE property_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $property_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $property = $result->fetch_assoc();
            $property_id = $property["property_id"];
            $property_name = $property["property_name"];
            $property_location = $property["property_location"];
            $monthly_rental_amount = $property["monthly_rental_amount"];
            $owner_name = $property["owner_name"];
            $phone_number = $property["phone_number"];
            $building_type = $property["building_type"];
            $agreement_type = $property["agreement_type"];
            $deposit_amount = $property["deposit_amount"];
            $bedrooms = $property["bedrooms"];
            $bathrooms = $property["bathrooms"];
            $carpet_area = $property["carpet_area"];
            $furniture = $property["furniture"];
            $kitchen = $property["kitchen"];
            $security_guards = $property["security_guards"];
            $power_backup = $property["power_backup"];
            $property_desc = $property["property_desc"];
            $property_image_url = $property["property_image_url"];
        } else {
            echo "<p>No ad found with provided ID: $property_id</p>";
        }
    }

   // Check if a file is selected for upload
if (isset($_FILES['property_image']) && $_FILES['property_image']['error'] === UPLOAD_ERR_OK) {
    $file_tmp_name = $_FILES['property_image']['tmp_name'];
    $file_name = $_FILES['property_image']['name'];
    $file_size = $_FILES['property_image']['size'];
    $file_type = $_FILES['property_image']['type'];

    // Validate file type (optional)
    $allowed_types = array('image/jpeg', 'image/png', 'image/gif');
    if (!in_array($file_type, $allowed_types)) {
        echo "<p>Error: Unsupported file type. Only JPG, PNG, and GIF files are allowed.</p>";
        exit;
    }

    // Validate file size (optional)
    $max_file_size = 5 * 1024 * 1024; // 5 MB
    if ($file_size > $max_file_size) {
        echo "<p>Error: File size exceeds the maximum limit (5 MB).</p>";
        exit;
    }

    // Move the uploaded file to a permanent location
    $target_dir = "./assests/warden/"; 
    $target_file = $target_dir . basename($file_name);
    if (move_uploaded_file($file_tmp_name, $target_file)) {
        // Update the property image URL in the database
        $property_image_url = $target_file;

        // Update the property details in the database
        $sql = "UPDATE property_list SET property_name=?, property_location=?, monthly_rental_amount=?, owner_name=?, building_type=?, agreement_type=?, deposit_amount=?, bedrooms=?, bathrooms=?, carpet_area=?, furniture=?, kitchen=?, security_guards=?, power_backup=?, property_desc=?, property_image_url=? WHERE property_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssiiisssssssi", $property_name, $property_location, $monthly_rental_amount, $owner_name, $building_type, $agreement_type, $deposit_amount, $bedrooms, $bathrooms, $carpet_area, $furniture, $kitchen, $security_guards, $power_backup, $property_desc, $property_image_url, $property_id);

        if ($stmt->execute()) {
            // Property details updated successfully
            echo "<p>Property details updated successfully.</p>";
        } else {
            // Error updating property details
            echo "<p>Error updating property details: " . $stmt->error . "</p>";
        }
    } else {
        // Error moving uploaded file
        echo "<p>Error: Failed to move uploaded file.</p>";
    }
}          
}
?>


<div class="container">
    <h2>Update Your Ad</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="property_id">Enter Property ID:</label>
        <input type="text" id="property_id" name="property_id" value="<?php echo $property_id; ?>" required>
        <input type="submit" value="Search Property">
    </form>
    

    <?php if($property_id !== "" && $property_name !== "") { ?>
        <form action="update.php" method="post" enctype="multipart/form-data">

            <!-- Hidden field to store property ID -->
            <input type="hidden" name="property_id" value="<?php echo $property_id; ?>">

            <!-- Other input fields for updating property details -->
            <label for="property_name">Property Name</label>
            <input type="text" id="property_name" name="property_name" value="<?php echo $property_name; ?>" required>

            <!-- Other input fields for updating property details -->
            <label for="property_location">Property Location</label>
            <input type="text" id="property_location" name="property_location" value="<?php echo $property_location; ?>" required>

            <!-- Other input fields for updating monthly rental amount -->
            <label for="monthly_rental_amount">Monthly Rental Amount</label>
            <input type="number" id="monthly_rental_amount" name="monthly_rental_amount" value="<?php echo $monthly_rental_amount; ?>" required>

            <!-- Other input fields for updating owner details -->
            <label for="owner_name">Owner Name</label>
            <input type="text" id="owner_name" name="owner_name" value="<?php echo $owner_name; ?>" required>

            <!-- Other input fields for updating phone number -->
            <label for="phone_number">Phone Number</label>
            <input type="number" id="phone_number" name="phone_number" value="<?php echo $phone_number; ?>" required>

            <!-- Other input fields for updating building type -->
            <label for="building_type">Building Type</label>
            <input type="text" id="building_type" name="building_type" value="<?php echo $building_type; ?>" required>

            <!-- Other input fields for updating agreement type -->
            <label for="agreement_type">Agreement Type</label>
            <input type="text" id="agreement_type" name="agreement_type" value="<?php echo $agreement_type; ?>" required>

            <!-- Other input fields for updating deposit amount -->
            <label for="deposit_amount">Deposit Amount</label>
            <input type="number" id="deposit_amount" name="deposit_amount" value="<?php echo $deposit_amount; ?>" required>

            <!-- Other input fields for updating bedroom details -->
            <label for="bedrooms">Bedrooms</label>
            <input type="number" id="bedrooms" name="bedrooms" value="<?php echo $bedrooms; ?>" required>

            <!-- Other input fields for updating bathroom details -->
            <label for="bathrooms">Bathrooms</label>
            <input type="number" id="bathrooms" name="bathrooms" value="<?php echo $bathrooms; ?>" required>

            <!-- Other input fields for updating carpet area details -->
            <label for="carpet_area">Carpet Area</label>
            <input type="number" id="carpet_area" name="carpet_area" value="<?php echo $carpet_area; ?>" required>

            <!-- Other input fields for updating furniture details -->
            <label for="furniture">Furniture</label>
            <input type="text" id="furniture" name="furniture" value="<?php echo $furniture; ?>" required>

            <!-- Other input fields for updating kitchen details -->
            <label for="kitchen">Kitchen</label>
            <input type="text" id="kitchen" name="kitchen" value="<?php echo $kitchen; ?>" required>

            <!-- Other input fields for updating security guards details -->
            <label for="security_guards">Security Guards</label>
            <input type="text" id="security_guards" name="security_guards" value="<?php echo $security_guards; ?>" required>

            <!-- Other input fields for updating power backup details -->
            <label for="power_backup">Power Backup</label>
            <input type="text" id="power_backup" name="power_backup" value="<?php echo $power_backup; ?>" required>

            <!-- Other input fields for updating property description -->
            <label for="property_desc">Property Description</label>
            <textarea id="property_desc" name="property_desc" required><?php echo $property_desc; ?></textarea>

            <!-- Other input fields for updating property image URL -->
            <label for="property_image">Property Image</label>
            <input type="file" id="property_image" name="property_image" accept="image/*" onchange="previewImage(event)">
            <img id="imagePreview" src="<?php echo $property_image_url; ?>" alt="Image Preview" style="max-width: 200px; display: <?php echo empty($property_image_url) ? 'none' : 'block'; ?>;">

            <input type="submit" value="Update Property" style="background-color: #309ea2; color: white; padding: 15px 30px; border: none; border-radius: 5px; cursor: pointer; display: block; margin: 0 auto;">
        </form>
    <?php } ?>
</div>


<?php include ('partials/footer.php') ?>


<script src="js/script.js"></script>

<script>
// Function to preview the image before uploading
function previewImage(property) {
    var input = event.target;
    var reader = new FileReader();
    reader.onload = function() {
        var imgElement = document.getElementById('imagePreview');
        imgElement.src = reader.result;
        imgElement.style.display = 'block';
    };
    reader.readAsDataURL(input.files[0]);
}
</script>

</body>
</html>
