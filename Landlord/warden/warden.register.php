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


<!-- register section starts  -->

<section class="form-container">

    <form action="register.connect.php" method="post">
       <h3>create an account!</h3>
       <input type="text" name="name" required maxlength="50" placeholder="enter your name" class="box">
       <input type="tel" name="phone" required maxlength="15" placeholder="enter your phone number" class="box">
       <input type="email" name="email" required maxlength="50" placeholder="enter your email" class="box">
       <input type="password" name="pass" required maxlength="20" placeholder="enter your password" class="box">
       <input type="password" name="c_pass" required maxlength="20" placeholder="confirm your password" class="box">
       <p>already have an account? <a href="warden.login.php">login now</a></p>
       <input type="submit" value="register now" name="submit" class="btn">
    </form>
 
 </section>
 
 <!-- register section ends -->
 


    <script src="js/script.js"></script>

</body>
</html>
