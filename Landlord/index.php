<!DOCTYPE html>

<?php
// Start the session
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accommodation</title>
    <link href="assests/icon.png" rel="icon">


<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- Font Awesome CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!-- Google Fonts - Poppins -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">

<!-- Custom styles -->
<link href="css/styles.css" rel="stylesheet">


</head>

<body>

<?php include 'partials/nav.php'; ?>


<?php

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "accommodation";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Function to fetch counts
function getCount($table, $connection) {
    $query = "SELECT COUNT(*) AS count FROM $table";
    $result = $connection->query($query);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['count'];
    } else {
        return 0;
    }
}

// Fetch counts
$adCount = getCount('property_list', $connection);
//$requestsCount = getCount('requests_list', $connection);
//$bookingCount = getCount('bookings_list', $connection);

// Close connection
$connection->close();
?>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                <i class="fas fa-ad card-icon"></i>
                    <h5 class="card-title">Ads on live</h5>
                    <p class="card-text">Total Ads: <?php echo $adCount ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <i class="fas fa-comment card-icon"></i>
                    <h5 class="card-title">Requests</h5>
                    <p class="card-text">Total Requests: 5</p>
                </div>
            </div>
        </div>
        

    </div>
</div>

<br><br><br><br>


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
            <a href="landlord.login.php">Sign in</a>
            <a href="#">Help</a>
        </div>

        <div class="col install">
            <h4>Install App</h4>
            <p>From App Store Or Google Play</p>
            <div class="row">
                <img src="partials/footer.img/apps122.png" alt="app" height="30px" width="200px">
            </div>
            <p>Secured Payment Gateways</p>
            <img src="partials/footer.img/payment11.png" alt="pay" height="100px" width="200">
        </div>
        <div class="copyright">
        <p>&copy; 2024 Group (#). All rights reserved.</p>
    </div>

    </footer>



<script src="https://kit.fontawesome.com/a076d05399.js"></script>


<script>
      
    function logout() {
        // Display confirmation dialog using SweetAlert
        Swal.fire({
            title: 'Are you sure?',
            text: "You will be logged out!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#228B22',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, logout'
        }).then((result) => {
            if (result.isConfirmed) {
                // If user confirms logout, redirect to logout.php
                window.location.href = "logout.php";
            }
        });
    }
</script>


</body>
</html>
