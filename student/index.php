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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styles.css">


    <style>
        .logo1 {
            width: auto;
            height: 70px;
        }
    </style>

</head>

<body>


<body>

    <section id="header">
        <a href="#"><img src="assests/logo1.png" class="logo1" alt=""></a>
        <div>
            <ul id="navbar">
                <li><a class="actve" href="#">Home</a></li>
                <li><a href="#" id="contactLink">Contact us</a></li>
                <li><a href="#">About us</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">Log In</a>
                    <ul class="dropdown-menu">
                      <li><a href="Landlord/login.php">Landlords</a></li>
                      <li><a href="Landlord/warden/warden.login.php">Warden</a></li>
                      <li><a href="student/login/login.php">Students</a></li>
                      <li><a href="admin/adminlogin/login.php">Admin</a></li>
                    </ul>
                  </li>
                <a href="#" id="close"><i class="fa-solid fa-x"></i></a>
            </ul>
        </div>
        <div id="mobile">
            <i id="bar" class="fas fa-outdent"></i>
        </div>
    </section>

    <div class="slider">
        <div class="slide">
          <img src="assests/img1.jpg" alt="Image 1">
          <div class="text">
            <h2>Student accommodation</h2>
            <p>All the best deals for NSBM Students</p>
          </div>
        </div>
        <div class="slide">
          <img src="assests/img2.jpg" alt="Image 2">
          <div class="text">
            <h2>Hostels for backpackers</h2>
            <p>Safe and cheap student hotels</p>
          </div>
        </div>
        <div class="slide">
          <img src="assests/img3.jpg" alt="Image 3">
          <div class="text">
            <h2>Tried and trusted by millions.</h2>
            <p>Search over 100 hostels</p>
          </div>
        </div>
        <div class="dots">
          <span class="dot active"></span>
          <span class="dot"></span>
          <span class="dot"></span>
        </div>
      </div>

      <br><br><br><br>
      <div class="map-container"> <!-- Container for the map with border -->
        <h2 class="map-title">Map</h2> <!-- Map title -->
        <div id="map"></div> <!-- Map container -->
    </div>

    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 10,
                center: {lat: 0, lng: 0}
            });

            var bounds = new google.maps.LatLngBounds(); // Create bounds object

            <?php
            // Connect to MySQL database
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "accommodation"; // Change to your database name

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Select all fields from the table
            $sql = "SELECT * FROM property_list";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    // Extract latitude and longitude from property_location field
                    preg_match('/Latitude: ([^,]+), Longitude: ([^ ]+)/', $row['property_location'], $matches);
                    $latitude = $matches[1];
                    $longitude = $matches[2];
                    $name = $row['property_name'];
                    $price = $row['monthly_rental_amount'];
                    $owner = $row['owner_name'];
                    $phone = $row['phone_number'];
                    $agreement = $row['agreement_type'];
                    $deposit = $row['deposit_amount'];
                    $bedrooms = $row['bedrooms'];
                    $bathrooms = $row['bathrooms'];
                    $carpet = $row['carpet_area'];
                    $furniture = $row['furniture'];
                    $kitchen = $row['kitchen'];
                    $security = $row['security_guards'];
                    $power = $row['power_backup'];
                    $desc = $row['property_desc'];
                    $image = "Landlord/" . $row['property_image_url'];

                    // Format HTML content for info window
                    $infoContent = "<div class='info-window'>";
                    $infoContent .= "<h3>" . $name . "</h3>";
                    $infoContent .= "<div class='info-photo'><img src='" . $image . "' alt='Property Photo'></div>"; // Property Photo
                    $infoContent .= "<div class='info-description'>";
                    $infoContent .= "<p><strong>1. Monthly Rental Amount:</strong> $" . $price . "</p>";
                    $infoContent .= "<p><strong>2. Owner Name:</strong> " . $owner . "</p>";
                    $infoContent .= "<p><strong>3. Phone Number:</strong> " . $phone . "</p>";
                    $infoContent .= "<p><strong>4. Agreement Type:</strong> " . $agreement . "</p>";
                    $infoContent .= "<p><strong>5. Deposit Amount:</strong> $" . $deposit . "</p>";
                    $infoContent .= "<p><strong>6. Bedrooms:</strong> " . $bedrooms . "</p>";
                    $infoContent .= "<p><strong>7. Bathrooms:</strong> " . $bathrooms . "</p>";
                    $infoContent .= "<p><strong>8. Carpet Area:</strong> " . $carpet . "</p>";
                    $infoContent .= "<p><strong>9. Furniture:</strong> " . $furniture . "</p>";
                    $infoContent .= "<p><strong>10. Kitchen:</strong> " . $kitchen . "</p>";
                    $infoContent .= "<p><strong>11. Security Guards:</strong> " . $security . "</p>";
                    $infoContent .= "<p><strong>12. Power Backup:</strong> " . $power . "</p>";
                    $infoContent .= "<p><strong>13. Property Description:</strong> " . $desc . "</p>";
                    $infoContent .= "</div>";
                    $infoContent .= "<button class='contact-button'>Contact Landlord</button>"; // Contact Landlord button
                    $infoContent .= "</div>";

                    // JavaScript for adding marker and info window
                    echo "var marker" . $row['property_id'] . " = new google.maps.Marker({";
                    echo "position: {lat: " . $latitude . ", lng: " . $longitude . "},";
                    echo "map: map,";
                    echo "title: '" . $name . "'";
                    echo "});";

                    echo "var infowindow" . $row['property_id'] . " = new google.maps.InfoWindow({";
                    echo "content: '" . addslashes($infoContent) . "'";
                    echo "});";

                    echo "marker" . $row['property_id'] . ".addListener('click', function() {";
                    echo "infowindow" . $row['property_id'] . ".open(map, marker" . $row['property_id'] . ");";
                    echo "});";

                    // Extend bounds to include marker position
                    echo "bounds.extend(new google.maps.LatLng(" . $latitude . ", " . $longitude . "));";
                }
            } else {
                echo "No results found";
            }

            // Fit map to bounds
            echo "map.fitBounds(bounds);";

            $conn->close();
            ?>
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyARJJjpT3WmqJtKLMW7R5Wcbecn0XoVZQ8&callback=initMap" async defer></script>



<!-- listings section starts  -->

<section class="listings">

    <h1 class="heading">Latest Listings</h1>

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
            while ($row = $result->fetch_assoc()) {
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
                        <img src="<?php echo htmlspecialchars('Landlord/'.$row["property_image_url"]); ?>" alt="<?php echo htmlspecialchars($row["property_name"]); ?>">
                    </div>

                    <h3 class="name"><?php echo $row["property_name"]; ?></h3>
                    <p class="location"><a href="<?php echo $row["property_location"]; ?>" target="_blank"><i class="fas fa-map-marker-alt"></i><span><?php echo $row["property_location"]; ?></span></a></p>
                    <div class="flex">
                        <p><i class="fas fa-bed"></i><span><?php echo $row["bedrooms"]; ?></span></p>
                        <p><i class="fas fa-bath"></i><span><?php echo $row["bathrooms"]; ?></span></p>
                        <p><i class="fas fa-maximize"></i><span><?php echo $row["carpet_area"]; ?></span></p>
                    </div>
                    <a href="view.property.php?id=<?php echo $row["property_id"]; ?>" class="btn">View Property</a>
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

    <div style="margin-top: 2rem; text-align:center;">
        <a href="listing.php" class="inline-btn special-btn">view all</a>
    </div>

</section>

<!-- listings section ends -->


<br><br><br><br><br><br><br><br><br><br><br><br>

      <h2>Contact Us</h2> 

    <div class="container">
      
        <div class="left">
            <img src="assests/contact.jpg" alt="Contact Us" class="image">
        </div>
        <div class="right">
            
            <form action="submit.php" method="post">
                <label for="full_name">Full Name:</label>
                <input type="text" id="full_name" name="full_name" required>

                <label for="email_address">Email Address:</label>
                <input type="email" id="email_address" name="email_address" required>

                <label for="phone_number">Phone Number:</label>
                <input type="tel" id="phone_number" name="phone_number" required>

                <label for="subject">Subject:</label>
                <input type="text" id="subject" name="subject" required>

                <label for="message">Message:</label>
                <textarea id="message" name="message" required></textarea>


                <input type="submit" value="Submit">
                
            </form>
        </div>
      
      </div>
      <br><br><br><br>

      <section id="about-us">
    <div class="container">
        <div class="about-content">
            <h2 class="about-heading">About Us</h2>
            <p class="about-text">Welcome to our accommodation service tailored for NSBM Green University students. Our mission is to provide comfortable and convenient living spaces to enhance your academic journey.</p>
            <p class="about-text">At NSBM Accommodation, we understand the importance of a supportive environment for your studies. Our properties are designed to foster a sense of community and offer amenities to support your lifestyle.</p>
            <p class="about-text">Whether you're a new student looking for your first home away from home or a returning student seeking upgraded accommodations, we're here to help you find the perfect place to live.</p>
        </div>
    </div>
</section>

    
    <footer class="section-p1">
        <div class="col">
            <h4>Contact</h4>
            <p><strong>Address</strong>Pitipana North Homagama</p>
            <p><strong>Hours</strong> 09:00 To 17:00 - Mon to Sun </p>
            <p><strong>Contact</strong> +94 769637703</p>
            <div class="Follow">
                <h4>Follow Us</h4>
                <div class="icon">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-pinterest-p"></i>
                    <i class="fab fa-youtube"></i>
                </div>
            </div>
        </div>
        <div class="col">
            <h4>About</h4>
            <a href="#">About Us</a>
            <a href="#">Privecy Policy</a>
            <a href="#">Terms & Conditions</a>
            <a href="#">Contact Us</a>
        </div>
        <div class="col">
            <h4>My Account</h4>
            <a href="#">Sign in</a>
            <a href="#">Help</a>
        </div>

        <div class="col install">
            <h4>Install App</h4>
            <p>From App Store Or Google Play</p>
            <div class="row">
                <img src="assests/apps122.png" alt="app" height="30px" width="200px">
            </div>
            <p>Secured Payment Gateways</p>
            <img src="assests/payment11.png" alt="pay" height="100px" width="200">
        </div>

    </footer>
    <script>
    document.getElementById('contactLink').addEventListener('click', function(event) {
      event.preventDefault(); // Prevents the default link behavior

      // Scroll to the container element
      document.querySelector('.container').scrollIntoView({
        behavior: 'smooth' // You can change this to 'auto' for instant scrolling
      });
    });
  </script>

    <script src="script.js"></script>

</body>
</html>