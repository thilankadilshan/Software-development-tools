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


<!-- listings section starts  -->

<section class="listings">

    <h1 class="heading">All Listings</h1>
 
    <div class="box-container">
 
    <?php
// Your database connection code here
$servername = "localhost";
$username = "root";
$password = "";
$database = "accommodation";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch listings from the database
$sql = "SELECT * FROM property_list";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        // Generate HTML for each listing dynamically using PHP variables
?>
        <div class="box">
            <div class="admin">
                <h3><?php echo substr($row["owner_name"], 0, 1); ?></h3>
                <div>
                    <p><?php echo $row["owner_name"]; ?></p>
                </div>
            </div>
            <div class="thumb">
                            <p class="total-images"><i class="far fa-image"></i><span>4</span></p>
                            <p class="type"><span><?php echo $row["building_type"]; ?></span>
                            <span><?php echo $row["agreement_type"]; ?></span></p>
                            <img src="<?php echo htmlspecialchars('../'.$row["property_image_url"]); ?>" alt="<?php echo htmlspecialchars($row["property_name"]); ?>">
                        </div>
            <h3 class="name"><?php echo $row["property_name"]; ?></h3>
            <p class="location"><a href="<?php echo $row["property_location"]; ?>" target="_blank"><i class="fas fa-map-marker-alt"></i><span><?php echo $row["property_location"]; ?></span></a></p>
            <div class="flex">
                <p><i class="fas fa-bed"></i><span><?php echo $row["bedrooms"]; ?></span></p>
                <p><i class="fas fa-bath"></i><span><?php echo $row["bathrooms"]; ?></span></p>
                <p><i class="fas fa-maximize"></i><span><?php echo $row["carpet_area"]; ?>sqft</span></p>
            </div>
            <a href="view.property.php?id=<?php echo $row["property_id"]; ?>" class="btn">view property</a>
        </div>
        
        <?php
        }
      } else {
    echo "0 results";
   }
   // Close your database connection here
   $conn->close();
   
   ?>



    </div>
 
 
 </section>
 
 <!-- listings section ends -->


 <br><br><br><br><br><br><br><br><br><br><br><br>

<?php include ("partials/footer.php"); ?>

    

    <script src="script.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" async defer></script>

</body>
</html>