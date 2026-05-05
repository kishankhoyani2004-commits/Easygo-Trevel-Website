<?php
session_start();

$username = isset($_SESSION['user']['email']) 
    ? $_SESSION['user']['email'] 
    : "Guest User";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Easy Go | Profile</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family: "Segoe UI", Arial, sans-serif;
}

/* ===================== BACKGROUND ===================== */
body{
    background: url("images/bg.jpg") center/cover no-repeat fixed;
    padding: 40px 0;
}

/* ===================== MAIN WRAPPER ===================== */
.profile-wrapper{
    width: 92%;
    max-width: 900px;
    margin: auto;
    background: rgba(255,255,255,0.25);
    border-radius: 26px;
    padding: 35px;
    backdrop-filter: blur(18px);
    border: 1px solid rgba(255,255,255,0.4);
    box-shadow: 0 15px 40px rgba(0,0,0,0.25);
    animation: fadeUp 0.6s ease;
}

/* Fade animation */
@keyframes fadeUp {
    from{opacity:0; transform: translateY(20px);}
    to{opacity:1; transform: translateY(0);}
}

/* ===================== PROFILE HEADER ===================== */
.profile-header{
    text-align:center;
    margin-bottom: 25px;
}

.profile-header img{
    width: 120px;
    height: 120px;
    border-radius: 50%;
    object-fit: cover;
    border: 4px solid rgba(255,255,255,0.5);
    box-shadow: 0 6px 18px rgba(0,0,0,0.35);
}

.username{
    margin-top: 12px;
    font-size: 26px;
    font-weight: 800;
    color: #ff5722;
}

/* ===================== STATS CARDS ===================== */
.stats-section{
    display: flex;
    gap: 15px;
    margin: 25px 0;
    flex-wrap: wrap;
}

.stat-card{
    flex: 1;
    min-width: 130px;
    background: rgba(255,255,255,0.35);
    backdrop-filter: blur(14px);
    padding: 18px;
    border-radius: 18px;
    text-align:center;
    border: 1px solid rgba(255,255,255,0.4);
    box-shadow: 0 10px 25px rgba(0,0,0,0.20);
    transition: 0.25s;
}

.stat-card:hover{
    transform: translateY(-5px) scale(1.03);
    background: rgba(255,255,255,0.55);
}

.stat-card i{
    font-size: 30px;
    margin-bottom: 8px;
    color: #ff7043;
}

.stat-card h3{
    font-size: 22px;
    font-weight: 700;
    color: #ff5722;
}

.stat-card p{
    font-size:14px;
    color:#000;
}

/* ===================== PROFILE DETAILS ===================== */
.details-box{
    margin-top: 20px;
    padding: 18px;
    background: rgba(255,255,255,0.35);
    backdrop-filter: blur(12px);
    border-radius: 18px;
    border: 1px solid rgba(255,255,255,0.4);
    box-shadow: 0 10px 25px rgba(0,0,0,0.3);
}

.details-box h2{
    color:#ff5722;
    margin-bottom:15px;
}

.detail-row{
    margin-bottom:12px;
}

.detail-row label{
    font-size: 14px;
    font-weight:600;
    color:#333;
}

.detail-row input{
    width:100%;
    padding:10px;
    border-radius:12px;
    border:1px solid rgba(0,0,0,0.2);
    margin-top:5px;
    background: rgba(255,255,255,0.85);
}

/* ===================== LOGOUT BUTTON ===================== */
.logout-btn{
    width:100%;
    padding:12px;
    background:#ff5722;
    color:white;
    border:none;
    border-radius:14px;
    font-size:17px;
    font-weight:600;
    margin-top:25px;
    cursor:pointer;
    box-shadow: 0 8px 20px rgba(0,0,0,0.3);
    transition: 0.25s;
}

.logout-btn:hover{
    background:#e64a19;
    transform: scale(1.03);
}

/* ===================== BOOKING HISTORY ===================== */
.booking-box{
    margin-top: 25px;
    padding: 20px;
    background: rgba(255,255,255,0.30);
    border-radius: 20px;
    backdrop-filter: blur(12px);
    border: 1px solid rgba(255,255,255,0.4);
    box-shadow: 0 10px 30px rgba(0,0,0,0.25);
}

.booking-box h2{
    color: #ff5722;
    margin-bottom: 12px;
    font-size: 22px;
}

.booking-item{
    padding: 12px 10px;
    background: rgba(255,255,255,0.6);
    border-radius: 12px;
    margin-bottom:10px;
    border:1px solid rgba(0,0,0,0.1);
}

.booking-item strong{
    color:#ff7043;
}

</style>
</head>
<body>

<div class="profile-wrapper">

    <!-- PROFILE HEADER -->
    <div class="profile-header">
        <img src="images/user.jpg" alt="User">
        <h2 class="username"><?= htmlspecialchars($username) ?></h2>
    </div>

    <!-- STATS -->
    <div class="stats-section">
        <div class="stat-card">
            <i class="fa-solid fa-hotel"></i>
            <h3>12</h3>
            <p>Hotels Booked</p>
        </div>

        <div class="stat-card">
            <i class="fa-solid fa-heart"></i>
            <h3>8</h3>
            <p>Wishlist Items</p>
        </div>

        <div class="stat-card">
            <i class="fa-solid fa-plane"></i>
            <h3>5</h3>
            <p>Trips Completed</p>
        </div>
    </div>

    <!-- DETAILS -->
    <div class="details-box">
        <h2>Your Details</h2>

        <div class="detail-row">
            <label>Full Name</label>
            <input type="text" value="<?= htmlspecialchars($username) ?>">
        </div>

        <div class="detail-row">
            <label>Email Address</label>
            <input type="email" value="user@gmail.com">
        </div>

        <div class="detail-row">
            <label>Phone</label>
            <input type="text" value="+91 9876543210">
        </div>

        <div class="detail-row">
            <label>Change Password</label>
            <input type="password" placeholder="New Password">
        </div>
    </div>

    <!-- BOOKING HISTORY -->
    <div class="booking-box">
        <h2>Recent Bookings</h2>

        <div class="booking-item">
            <strong>Hotel Sentral</strong> – 2 Nights – ₹4500  
        </div>

        <div class="booking-item">
            <strong>Rosewood Stay</strong> – 3 Nights – ₹6100  
        </div>

        <div class="booking-item">
            <strong>City Comfort Inn</strong> – 1 Night – ₹2200  
        </div>

    </div>

    <!-- LOGOUT BUTTON -->
    <button class="logout-btn" onclick="window.location.href='logout.php'">
        Logout
    </button>

</div>

</body>
</html>
