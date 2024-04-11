<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="dashboard">
        <h1>Admin Dashboard</h1>
        <div class="options">
            <button onclick="location.href='../student/login/signup.php'">Create Student Account</button>
            <button onclick="location.href='../Landlord/register.php'">Create Landlord Account</button>
            <button onclick="location.href='../Landlord/warden/warden.register.php'">Create Warden Account</button>
            <button onclick="location.href='update_hostel_details.html'">Update Hostel Details</button>
            <button onclick="location.href='delete_hostels.html'">Delete Hostels</button>
            <button onclick="location.href='approve_hostels.html'">Approve Hostels</button>
        </div>
    </div>
</body>
</html>
