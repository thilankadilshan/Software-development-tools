<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="assests/icon.png" rel="icon">
    <link href="assests/apple-touch-icon.png" rel="apple-touch-icon">
    <script src="https://kit.fontawesome.com/f0e01b6c2e.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script> <!-- Fixed script source -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css"> <!-- Fixed CSS source -->

    <style>
        .form-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ccc;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin-top: 130px;
            margin-bottom: 30px;
            font-family: 'Poppins', sans-serif;
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

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Perform validation and database insertion
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['pass'];
        $c_password = $_POST['c_pass'];

        // Hash the password before storing it in the database
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Database connection
        $servername = "localhost";
        $username = "root";
        $password_db = "";
        $dbname = "accommodation";

        // Create connection
        $conn = new mysqli($servername, $username, $password_db, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Insert user data into the database
        $sql = "INSERT INTO landlord_account (name, phone, email, password) VALUES ('$name', '$phone', '$email', '$hashed_password')";

        if ($conn->query($sql) === TRUE) {
            // Registration successful
            echo '<script>
                Swal.fire({
                    icon: "success",
                    title: "Registration Successful!",
                    text: "You can now login.",
                    timer: 1500,
                    showConfirmButton: false
                }).then(function() {
                    window.location.href = "login.php";
                });
            </script>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    ?>

    <!-- register section starts  -->
    <section class="form-container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h3>create an account!</h3>
            <input type="text" name="name" required maxlength="50" placeholder="enter your name" class="box">
            <input type="tel" name="phone" required maxlength="15" placeholder="enter your phone number" class="box">
            <input type="email" name="email" required maxlength="50" placeholder="enter your email" class="box">
            <input type="password" name="pass" required maxlength="20" placeholder="enter your password" class="box">
            <input type="password" name="c_pass" required maxlength="20" placeholder="confirm your password" class="box">
            <p>already have an account? <a href="login.php">login now</a></p>
            <input type="submit" value="register now" name="submit" class="btn">
        </form>
    </section>
    <!-- register section ends -->

    <script src="js/script.js"></script>

</body>

</html>
