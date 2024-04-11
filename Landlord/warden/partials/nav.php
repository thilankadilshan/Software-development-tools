<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accommodation</title>
    <link href="assests/favicon.png" rel="icon">
    <link href="assests/apple-touch-icon.png" rel="apple-touch-icon">
    <link rel="stylesheet" href="css/warden.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://kit.fontawesome.com/f0e01b6c2e.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
        .logo1 {
            width: auto;
            height: 70px;
        }

        #map {
            height: 500px;
            width: 100%;
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
            </ul>
        </div>
        <div>
            <a href="#" onclick="logout()" style="position: absolute; top: 30px; right: 50px; text-decoration: none; font-size: 16px; font-weight: bold; color: #333; padding: 5px 10px; background-color: #309ea2; border-radius: 5px;"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
        <div id="mobile">
            <i id="bar" class="fas fa-outdent"></i>
        </div>
    </section>

    <br><br><br><br>



    <script>
        function logout() {
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
                    window.location.href = "logout.php";
                }
            });
        }
    </script>

</body>
</html>