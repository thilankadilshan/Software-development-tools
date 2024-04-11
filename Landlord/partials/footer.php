<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>footer section</title>
</head>

<style>

.clearfifx{
    float: none;
    clear: both;
}

footer{
    position: relative;
    bottom: auto;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    background: #eff9ff;
    padding: 70px 0;
}

footer .col{
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    margin-bottom: 20px;
    color: #222;
}


footer .logo{
    padding: -1000px;
    
}

footer h4{
    font-size: 14px;
    padding-bottom: 20px;
}

footer p{
    font-size: 13px;
    margin:0 0 8px 0;
}

footer a{
    font-size: 13px;
    text-decoration: none;
    color: #222;
    margin-bottom: 10px;
}

footer .Follow{
    margin-top: 20px;
}

footer .Follow i{
    color: #465b52;
    padding-right: 4px;
    cursor: pointer;
}

footer .install img{
    margin: 10px 0 15px 0;
}

footer .Follow i:hover,
footer a:hover{
    color: #e30d0d;
}

footer .copyright{
    width: 100%;
    text-align: center;
}

footer .copyright p{
    color: #ff0000;
}

</style>

<body>

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

    </footer>



    
</body>
</html>