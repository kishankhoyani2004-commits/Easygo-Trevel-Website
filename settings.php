<?php
session_start();
$username = $_SESSION['user'] ?? "Guest User";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Easy Go | Settings</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:"Segoe UI", Arial, sans-serif;
}

body{
    background:url("images/bg.jpg") center/cover no-repeat fixed;
    padding:40px 0;
}

/* MAIN WRAPPER */
.settings-wrapper{
    width:92%;
    max-width:850px;
    margin:auto;
    background:rgba(255,255,255,0.25);
    padding:30px;
    border-radius:26px;
    backdrop-filter:blur(18px);
    border:1px solid rgba(255,255,255,0.4);
    box-shadow:0 15px 40px rgba(0,0,0,0.25);
    animation:fade 0.6s ease;
}

@keyframes fade{from{opacity:0;}to{opacity:1;}}

.page-title{
    font-size:30px;
    font-weight:800;
    color:#ff5722;
    text-align:center;
    margin-bottom:25px;
}

/* SETTING BLOCK */
.setting-box{
    background:rgba(255,255,255,0.35);
    padding:18px;
    border-radius:20px;
    backdrop-filter:blur(10px);
    border:1px solid rgba(255,255,255,0.4);
    margin-bottom:18px;
    box-shadow:0 8px 20px rgba(0,0,0,0.2);
    transition:0.25s;
}

.setting-box:hover{
    transform:translateY(-5px);
    background:rgba(255,255,255,0.55);
}

.setting-title{
    display:flex;
    align-items:center;
    font-size:20px;
    font-weight:600;
    color:#ff5722;
    margin-bottom:10px;
    gap:12px;
}

.setting-title i{
    font-size:22px;
}

/* INPUT STYLE */
.setting-box input,
.setting-box select{
    width:100%;
    padding:10px;
    border-radius:12px;
    border:1px solid rgba(0,0,0,0.2);
    background:rgba(255,255,255,0.85);
    margin-top:6px;
}

/* TOGGLE SWITCH */
.switch{
    position:relative;
    width:50px;
    height:26px;
}
.switch input{display:none;}

.slider{
    position:absolute;
    cursor:pointer;
    top:0; left:0;
    right:0; bottom:0;
    background:#ccc;
    border-radius:30px;
    transition:.3s;
}

.slider:before{
    position:absolute;
    content:"";
    width:22px;
    height:22px;
    left:3px;
    bottom:2px;
    background:white;
    border-radius:50%;
    transition:.3s;
}

input:checked + .slider{
    background:#ff5722;
}

input:checked + .slider:before{
    transform:translateX(24px);
}

/* SAVE BUTTON */
.save-btn{
    width:100%;
    padding:14px;
    background:#ff5722;
    color:white;
    font-size:17px;
    border:none;
    border-radius:16px;
    font-weight:700;
    cursor:pointer;
    margin-top:25px;
    box-shadow:0 10px 25px rgba(0,0,0,0.3);
    transition:0.25s;
}

.save-btn:hover{
    background:#e64a19;
    transform:scale(1.03);
}
</style>
</head>

<body>

<div class="settings-wrapper">

    <h1 class="page-title">⚙ Settings</h1>

    <!-- ACCOUNT SETTINGS -->
    <div class="setting-box">
        <div class="setting-title"><i class="fa-solid fa-user-gear"></i>Account Information</div>
        <label>Full Name</label>
        <input type="text" value="<?= $username ?>">

        <label style="margin-top:10px;">Email</label>
        <input type="email" value="user@gmail.com">
    </div>

    <!-- SECURITY -->
    <div class="setting-box">
        <div class="setting-title"><i class="fa-solid fa-lock"></i>Security</div>
        <label>Change Password</label>
        <input type="password" placeholder="New Password">

        <label style="margin-top:10px;">Two-Step Verification</label>
        <label class="switch">
            <input type="checkbox">
        </label>
    </div>

    <!-- NOTIFICATIONS -->
    <div class="setting-box">
        <div class="setting-title"><i class="fa-solid fa-bell"></i>Notifications</div>

        <label>Email Alerts</label>
        <label class="switch">
            <input type="checkbox" checked>
        </label>

        <label style="margin-top:12px;">Booking Updates</label>
        <label class="switch">
            <input type="checkbox" checked>
        </label>
    </div>

    <!-- APPEARANCE -->
    <div class="setting-box">
        <div class="setting-title"><i class="fa-solid fa-moon"></i>Appearance</div>

        <label>Theme</label>
        <select>
            <option>Light</option>
            <option>Dark</option>
            <option>System Default</option>
        </select>
    </div>

    <!-- PRIVACY -->
    <div class="setting-box">
        <div class="setting-title"><i class="fa-solid fa-shield-halved"></i>Privacy</div>

        <label>Show Profile to Public</label>
        <label class="switch">
            <input type="checkbox">
        </label>
    </div>

    <button class="save-btn">Save Settings</button>

</div>
<script>
let fabOpen = false;

document.getElementById("fabMain").onclick = () => {
    fabOpen = !fabOpen;

    document.getElementById("fabBlurOverlay").style.display = fabOpen ? "block" : "none";

    document.getElementById("fabMenu").classList.toggle("show", fabOpen);
};
</script>

</body>
</html>
