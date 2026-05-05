<?php
session_start();
include "db_connect.php";

/* ✅ Check login */
if (!isset($_SESSION['user']) || !is_array($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

/* ✅ Check POST data */
if (!isset($_POST['airline']) || !isset($_POST['price'])) {
    header("Location: home.php");
    exit();
}

$user = $_SESSION['user'];
$user_email = $user['email'];
$airline = $_POST['airline'];
$price = $_POST['price'];

$query = "INSERT INTO bookings (user, airline, price, booking_date)
          VALUES ('$user_email', '$airline', '$price', NOW())";

mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Booking Successful | Easy Go</title>
<style>
body{
    min-height:100vh;
    background:url('images/bg.jpg') center/cover no-repeat fixed;
    display:flex;
    align-items:center;
    justify-content:center;
    font-family:"Segoe UI", Arial, sans-serif;
}

.success-card{
    width:420px;
    background:rgba(255,255,255,0.18);
    backdrop-filter:blur(20px);
    border-radius:24px;
    padding:40px;
    text-align:center;
    box-shadow:0 25px 55px rgba(0,0,0,0.4);
    color:white;
}

.success-card h2{
    color:#ff7a1a;
    margin-bottom:15px;
}

.success-card p{
    margin-bottom:20px;
    color:white;
}

.success-card a{
    display:inline-block;
    padding:10px 25px;
    background:#ff6a00;
    color:white;
    text-decoration:none;
    border-radius:12px;
    font-weight:600;
}
</style>
</head>
<body>

<div class="success-card">
    <h2>🎉 Booking Successful!</h2>
    <p>Your flight has been confirmed.</p>
    <a href="home.php">Go to Dashboard</a>
</div>

</body>
</html>