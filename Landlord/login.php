<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Login</title>
    <link href="assests/icon.png" rel="icon">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');

        .form-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #cbcaca;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin-top: 130px;
            margin-bottom: 30px;
        }
        
        .form-container h3 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        
        .form-container input[type="email"],
        .form-container input[type="tel"],
        .form-container input[type="password"],
        .form-container input[type="text"],
        .form-container input[type="submit"] {
            width: calc(100% - 20px); 
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        
        .form-container input[type="submit"] {
            background-color: #3085a2;
            color: white;
            cursor: pointer;
        }
        
        .form-container input[type="submit"]:hover {
            background-color: #306678;
        }
        
        .form-container p {
            text-align: center;
            margin-top: 10px;
        }
        
        .form-container p a {
            color: #007bff;
            text-decoration: none;
        }
        
        .form-container p a:hover {
            text-decoration: underline;
        }

    </style>

</head>

<body>


<section class="form-container">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="loginForm">
        <h3>welcome!</h3>
        <input type="email" name="email" required maxlength="50" placeholder="enter your email" class="box">
        <input type="password" name="password" required maxlength="20" placeholder="enter your password" class="box">
        <p>Don't have an account? <a href="register.php">Register now</a></p>
        <p><a href="../index.php">back to home</a></p>
        <input type="submit" value="login now" name="submit" class="btn">
    </form>

    <?php
    session_start();
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $conn = mysqli_connect("localhost", "root", "", "accommodation");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM landlord_account WHERE email='$email' AND password='$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            $_SESSION['loggedin'] = true;
            header("Location: index.php");
            exit;
        } else {
            echo '<script>
            window.onload = function() {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Invalid username or password!",
                });
            }
            </script>';
        }
    }
    mysqli_close($conn);
    ?>


</section>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>
