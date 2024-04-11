<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accommodation</title>
    <link href="assests/Icon.png" rel="icon">
    <link href="assests/apple-touch-icon.png" rel="apple-touch-icon">
    <script src="https://kit.fontawesome.com/f0e01b6c2e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/landlord.css">

    <style>
        .logo1 {
            width: auto;
            height: 70px;
        }
    </style>

</head>

<body>

    <section id="header">
        <a href="#"><img src="assests/logo1.png" class="logo1" alt=""></a>
        <div>
            <ul id="navbar">
                <li><a class="actve" href="index.php">Home</a></li>
                <li><a href="#">Contact us</a></li>
                <li><a href="#">About us</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">Log In</a>
                    <ul class="dropdown-menu">
                      <li><a href="landlord.login.php">Landlords</a></li>
                      <li><a href="#">Warden</a></li>
                      <li><a href="#">Students</a></li>
                      <li><a href="#">Admin</a></li>
                    </ul>
                  </li>
                <a href="#" id="close"><i class="fa-solid fa-x"></i></a>
            </ul>
        </div>
        <div id="mobile">
            <i id="bar" class="fas fa-outdent"></i>
        </div>
    </section>



  <!-- register section starts  -->

<section class="form-container">

    <form action="register.connect.php" method="post">
       <h3>create an account!</h3>
       <input type="text" name="name" required maxlength="50" placeholder="enter your name" class="box">
       <input type="tel" name="phone" required maxlength="15" placeholder="enter your phone number" class="box">
       <input type="email" name="email" required maxlength="50" placeholder="enter your email" class="box">
       <input type="password" name="pass" required maxlength="20" placeholder="enter your password" class="box">
       <input type="password" name="c_pass" required maxlength="20" placeholder="confirm your password" class="box">
       <p>already have an account? <a href="landlord.login.php">login now</a></p>
       <input type="submit" value="register now" name="submit" class="btn">
    </form>
 
 </section>
 
 <!-- register section ends -->



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
                <img src="assests/apps122.png" alt="app" height="30px" width="200px">
            </div>
            <p>Secured Payment Gateways</p>
            <img src="assests/payment11.png" alt="pay" height="100px" width="200">
        </div>

    </footer>

    <script src="js/script.js"></script>

</body>
</html>