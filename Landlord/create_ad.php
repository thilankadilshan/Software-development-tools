<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Ad</title>
    <link href="assests/icon.png" rel="icon">


<!-- Include SweetAlert2 library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Include Font Awesome version 5 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-c7+0AAz7/n8mcJSXWO4JMqevgiMiCm+3sZLoflFOJSpBoys+Xky8n4HPQCw1XGoa9mrINvIzI7PrfXGxvH3hiQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Include Font Awesome version 6 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Include custom styles -->
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
            border-radius: 5px;
            background-color: #f4f4f4;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            display: grid;
            gap: 20px;
        }
        input[type="text"],
        input[type="time"] {
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


<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "accommodation";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Define target directory for image uploads
    $target_dir = "assests/warden/";

    // Prepare data for insertion
    $property_name = isset($_POST["property_name"]) ? $_POST["property_name"] : "";
    $property_location = isset($_POST["location"]) ? $_POST["location"] : ""; 
    $monthly_rental_amount = isset($_POST["monthly_rental_amount"]) ? $_POST["monthly_rental_amount"] : "";
    $owner_name = isset($_POST["owner_name"]) ? $_POST["owner_name"] : "";
    $phone_number = isset($_POST["phone_number"]) ? $_POST["phone_number"] : "";
    $building_type = isset($_POST["building_type"]) ? $_POST["building_type"] : "";
    $agreement_type = isset($_POST["agreement_type"]) ? $_POST["agreement_type"] : "";
    $deposit_amount = isset($_POST["deposit_amount"]) ? $_POST["deposit_amount"] : "";
    $bedrooms = isset($_POST["bedrooms"]) ? $_POST["bedrooms"] : "";
    $bathrooms = isset($_POST["bathrooms"]) ? $_POST["bathrooms"] : "";
    $carpet_area = isset($_POST["carpet_area"]) ? $_POST["carpet_area"] : "";
    $furniture = isset($_POST["furniture"]) ? $_POST["furniture"] : "";
    $kitchen = isset($_POST["kitchen"]) ? $_POST["kitchen"] : "";
    $security_guards = isset($_POST["security_guards"]) ? $_POST["security_guards"] : "";
    $power_backup = isset($_POST["power_backup"]) ? $_POST["power_backup"] : "";
    $property_desc = isset($_POST["property_desc"]) ? $_POST["property_desc"] : "";
    $property_image_url = isset($_POST["property_image_url"]) ? $_POST["property_image_url"] : "";


    // Upload images
    $property_image_urls = isset($_FILES["property_images"]) ? $_FILES["property_images"]["name"] : array();
    $image_urls = array();
    
    if (!empty($property_image_urls)) {
        foreach ($property_image_urls as $key => $image_name) {
            $temp = $_FILES["property_images"]["tmp_name"][$key];
            $target_file = $target_dir . basename($image_name);
            move_uploaded_file($temp, $target_file);
            $image_urls[] = $target_file;
        }
    }

    // Combine image URLs into a single string separated by commas
    $property_image_url = implode(",", $image_urls);

    // Insert data into database
    $sql = "INSERT INTO property_list (property_name, property_location, monthly_rental_amount, owner_name, phone_number, building_type, agreement_type, deposit_amount, bedrooms, bathrooms, carpet_area, furniture, kitchen, security_guards, power_backup, property_desc, property_image_url)
            VALUES ('$property_name', '$property_location', '$monthly_rental_amount', '$owner_name', '$phone_number', '$building_type', '$agreement_type', '$deposit_amount', '$bedrooms', '$bathrooms', '$carpet_area', '$furniture', '$kitchen', '$security_guards', '$power_backup', '$property_desc', '$property_image_url')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Your changes have been successfully saved.",
            showConfirmButton: false,
            timer: 1500
          });</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>


<?php include('partials/nav.php'); ?>




    <div class="container">
        <h2>Create Your Ad</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data" style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px; box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);">

        

<div style="display: flex; flex-wrap: wrap; justify-content: space-between;">
    <div style="flex: 0 0 calc(50% - 10px); margin-bottom: 20px;">
        <label for="property_name" style="font-weight: bold;">
            <i class="fas fa-pencil-alt"></i> Property Name
        </label>
        <input type="text" id="property_name" name="property_name" required style="padding: 10px; width: 100%; border-radius: 5px; border: 1px solid #ccc;">
    </div>


    
    <div style="flex: 0 0 calc(50% - 10px); margin-bottom: 20px;">
    <label for="location" style="font-weight: bold;">
        <i class="fas fa-map-marker-alt"></i> Location
    </label>
    <input type="text" id="location" name="location" required style="padding: 10px; width: 100%; border-radius: 5px; border: 1px solid #ccc;">
    <button type="button" onclick="getLocation()" style="padding: 10px; border-radius: 5px; border: 1px solid #ccc; background-color: #309ea2; color: white;">Get Current Location</button>
</div>



<div style="flex: 0 0 calc(50% - 10px); margin-bottom: 20px;">
    <label for="monthly_rental_amount" style="font-weight: bold;">
        <i class="fas fa-dollar-sign"></i> Monthly Rental Amount
    </label>
    <input type="number" id="monthly_rental_amount" name="monthly_rental_amount" required style="padding: 10px; width: 100%; border-radius: 5px; border: 1px solid #ccc;">
</div>




<div style="flex: 0 0 calc(50% - 10px); margin-bottom: 20px;">
    <label for="owner_name" style="font-weight: bold;">
        <i class="fas fa-user"></i> Owner Name
    </label>
    <input type="text" id="owner_name" name="owner_name" required style="padding: 10px; width: 100%; border-radius: 5px; border: 1px solid #ccc;">
</div>



<div style="flex: 0 0 calc(50% - 10px); margin-bottom: 20px;">
    <label for="phone_number" style="font-weight: bold;">
        <i class="fas fa-phone"></i> Phone Number
    </label>
    <input type="tel" id="phone_number" name="phone_number" required style="padding: 10px; width: 100%; border-radius: 5px; border: 1px solid #ccc;">
</div>


<div style="flex: 0 0 calc(50% - 10px); margin-bottom: 20px;">
    <label for="building_type" style="font-weight: bold;">
        <i class="fas fa-building"></i> Building Type
    </label>
    <input type="text" id="building_type" name="building_type" required style="padding: 10px; width: 100%; border-radius: 5px; border: 1px solid #ccc;">
</div>



<div style="flex: 0 0 calc(50% - 10px); margin-bottom: 20px;">
    <label for="agreement_type" style="font-weight: bold;">
        <i class="fas fa-building"></i> Agreement Type
    </label>
    <input type="text" id="agreement_type" name="agreement_type" required style="padding: 10px; width: 100%; border-radius: 5px; border: 1px solid #ccc;">
</div>



<div style="flex: 0 0 calc(50% - 10px); margin-bottom: 20px;">
    <label for="deposit_amount" style="font-weight: bold;">
        <i class="fas fa-money-bill-wave"></i> Deposit Amount
    </label>
    <input type="number" id="deposit_amount" name="deposit_amount" required style="padding: 10px; width: 100%; border-radius: 5px; border: 1px solid #ccc;">
</div>



<div style="flex: 0 0 calc(50% - 10px); margin-bottom: 20px;">
    <label for="bedrooms" style="font-weight: bold;">
        <i class="fas fa-bed"></i> Bedrooms
    </label>
    <input type="number" id="bedrooms" name="bedrooms" required style="padding: 10px; width: 100%; border-radius: 5px; border: 1px solid #ccc;">
</div>



<div style="flex: 0 0 calc(50% - 10px); margin-bottom: 20px;">
    <label for="bathrooms" style="font-weight: bold;">
        <i class="fas fa-bath"></i> Bathrooms
    </label>
    <input type="number" id="bathrooms" name="bathrooms" required style="padding: 10px; width: 100%; border-radius: 5px; border: 1px solid #ccc;">
</div>



<div style="flex: 0 0 calc(50% - 10px); margin-bottom: 20px;">
    <label for="carpet_area" style="font-weight: bold;">
        <i class="fas fa-ruler"></i> Carpet Area (sqft)
    </label>
    <input type="number" id="carpet_area" name="carpet_area" required style="padding: 10px; width: 100%; border-radius: 5px; border: 1px solid #ccc;">
</div>



<div style="flex: 0 0 calc(50% - 10px); margin-bottom: 20px;">
    <label for="furniture" style="font-weight: bold;">
        <i class="fas fa-chair"></i> Furniture
    </label>
    <select id="furniture" name="furniture" required style="padding: 10px; width: 100%; border-radius: 5px; border: 1px solid #ccc;">
        <option value="" selected>Select</option>
        <option value="Yes">&#10004; With Furniture</option>
        <option value="No">&#10008; Without Furniture</option>
    </select>
</div>



<div style="flex: 0 0 calc(50% - 10px); margin-bottom: 20px;">
    <label for="kitchen" style="font-weight: bold;">
        <i class="fas fa-utensils"></i> Kitchen
    </label>
    <select id="kitchen" name="kitchen" required style="padding: 10px; width: 100%; border-radius: 5px; border: 1px solid #ccc;">
        <option value="" selected>Select</option>
        <option value="Yes">&#10004; With Kitchen</option>
        <option value="No">&#10008; Without Kitchen</option>
    </select>
</div>



<div style="flex: 0 0 calc(50% - 10px); margin-bottom: 20px;">
    <label for="security_guards" style="font-weight: bold;">
        <i class="fas fa-shield-alt"></i> Security Guards
    </label>
    <select id="security_guards" name="security_guards" required style="padding: 10px; width: 100%; border-radius: 5px; border: 1px solid #ccc;">
        <option value="" selected>Select</option>
        <option value="Yes">&#10004; With Security Guards</option>
        <option value="No">&#10008; Without Security Guards</option>
    </select>
</div>



<div style="flex: 0 0 calc(50% - 10px); margin-bottom: 20px;">
    <label for="power_backup" style="font-weight: bold;">
        <i class="fas fa-bolt"></i> Power Backup
    </label>
    <select id="power_backup" name="power_backup" required style="padding: 10px; width: 100%; border-radius: 5px; border: 1px solid #ccc;">
        <option value="" selected>Select</option>
        <option value="Yes">&#10004; With Power Backup</option>
        <option value="No">&#10008; Without Power Backup</option>
    </select>
</div>



<div style="flex: 0 0 calc(50% - 10px); margin-bottom: 20px;">
    <label for="property_desc" style="font-weight: bold;">
        <i class="fas fa-align-left"></i> Other deatils
    </label>
    <textarea id="property_desc" name="property_desc" required style="padding: 10px; width: 100%; border-radius: 5px; border: 1px solid #ccc;"></textarea>
</div>



<div style="display: flex; align-items: center; margin-bottom: 20px;">
    <label for="property_images" style="font-weight: bold;">
        <i class="far fa-images"></i> Property Images
    </label>
    <div style="flex: 1; margin-left: 10px;">
    <input type="file" id="property_images_url" name="property_images[]" accept="image/*" multiple required onchange="previewImage(event)" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
    </div>
</div>

<div style="text-align: center;">
    <img id="imagePreview" src="#" alt="Property Image Preview" style="max-width: 100%; border-radius: 10px; display: none;">
</div>

<br>

<input type="submit" value="Post property" style="background-color: #309ea2; color: white; padding: 15px 30px; border: none; border-radius: 5px; cursor: pointer; display: block; margin: 0 auto;">

</form>
    </div>




<script>
document.getElementById('property_images_url').addEventListener('change', function() {
    var reader = new FileReader();
    reader.onload = function(e) {
        document.getElementById('imagePreview').src = e.target.result;
        document.getElementById('imagePreview').style.display = 'block';
    }
    reader.readAsDataURL(this.files[0]);
});
</script>

    

    <script>
    // Function to preview the image before uploading
    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById('imagePreview').src = e.target.result;
                document.getElementById('imagePreview').style.display = 'block';
            }

            reader.readAsDataURL(input.files[0]); 
        }
    }

    // Trigger image preview when a file is selected
    document.getElementById('property_image').addEventListener('change', function() {
        previewImage(this);
    });
</script>



<!-- Include custom script -->
<script src="js/script.js"></script>

<!-- Include SweetAlert2 library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



</body>

</html>
