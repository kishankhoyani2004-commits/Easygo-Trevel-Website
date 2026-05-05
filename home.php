<?php
session_start();
include("db_connect.php");

$streak = 0;
$points = 0;

if(isset($_SESSION['user'])){
    $user_email = $_SESSION['user']['email'];
    $user_id = $_SESSION['user']['id'];

    $res = mysqli_query($conn, "SELECT streak_days, points FROM user_streak WHERE user_email='$user_email'");

    if($res){
        $row = mysqli_fetch_assoc($res);
        if($row){
            $streak = $row['streak_days'];
            $points = $row['points'];
        }
    }
}

$bronze_progress = min(($streak/10)*100,100);
$silver_progress = min(($streak/20)*100,100);
$gold_progress = min(($streak/30)*100,100);

$rewardMessage = "";

if($streak == 10){
    $rewardMessage = "🥉 Bronze Reward Unlocked! +50 Points";
}
elseif($streak == 20){
    $rewardMessage = "🥈 Silver Reward Unlocked! +100 Points";
}
elseif($streak == 30){
    $rewardMessage = "🥇 Gold Reward Unlocked! +200 Points + 10% Discount";
}
?>

<?php include("reward_logic.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Easy Go | Upgraded</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
    .autocomplete-box{
    position:relative;
    width:100%;
}

.suggestions{
    position:absolute;
    top:100%;
    left:0;
    width:100%;
    max-height:220px;
    overflow-y:auto;
    backdrop-filter:blur(18px);
    background:rgba(255,255,255,0.55);
    border-radius:15px;
    border:1px solid rgba(255,255,255,0.55);
    box-shadow:0 12px 35px rgba(0,0,0,0.28);
    display:none;
    z-index:2000;
}

.suggestions div{
    padding:12px;
    cursor:pointer;
    font-weight:500;
}

.suggestions div:hover{
    background:rgba(255,255,255,0.75);
}
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family: "Segoe UI", Arial, sans-serif;
}

body{
    background:url('images/bg.jpg');
    background-size:cover;
    background-position:center;
    background-attachment:fixed;
    transition:0.3s;
    color:#000;
}

/* NAVBAR */
.nav-transparent{
    width:100%;
    height:75px;
    display:flex;
    align-items:center;
    justify-content:space-between;
    padding:0 30px;
    position:fixed;
    top:0;
    left:0;
    z-index:1000;
    background:rgba(255,255,255,0.15);
    backdrop-filter: blur(10px);
    box-shadow:0 3px 15px rgba(0,0,0,0.2);
}

.nav-left{
    font-size:26px;
    font-weight:900;
    color:#ff5722;
}

.nav-right{
    display:flex;
    align-items:center;
    gap:25px;
    font-size:20px;
    cursor:pointer;
}

/* SIGNUP LOGIN BUTTONS */
.auth-buttons{
    display:flex;
    gap:12px;
}

.auth-buttons button{
    padding:6px 14px;
    border-radius:8px;
    border:none;
    cursor:pointer;
    font-size:14px;
    font-weight:600;
}

.login-btn{
    background:white;
    border:1px solid #ccc;
}

.signup-btn{
    background:#ff5722;
    color:white;
}

/* NOTIFICATION BOX */
.notification-wrapper{
    position:relative;
    display:inline-block;
}

.notification-box{
    position:absolute;
    top:120%;      /* below bell */
    right:0;       /* align right */
    width:260px;
    background:white;
    border-radius:10px;
    box-shadow:0 5px 25px rgba(0,0,0,0.25);
    padding:15px;
    display:none;
    z-index:2000;
}

.notification-box h4{
    margin-bottom:10px;
}

.notification-item{
    padding:8px 0;
    border-bottom:1px solid #eee;
    font-size:14px;
}

/* HERO */
.hero{
    margin-top:75px;
    width:100%;
    height:calc(100vh - 75px);
    display:flex;
    justify-content:center;
    align-items:center;
    position:relative;
    background:url('images/bg.jpg');
    background-size:cover;
    background-position:center center;
    background-repeat:no-repeat;
    background-attachment:fixed;
}

/* LEFT PANEL */
.left-panel{
    position:absolute;
    left:calc(50% - 550px - 2%);
    top:50%;
    transform:translateY(-50%);
    display:flex;
    flex-direction:column;
    gap:10px;
    z-index:500;
}

.option-box{
    width:160px;
    height:60px;
    background:rgba(255,255,255,0.55);
    backdrop-filter:blur(18px);
    border:1px solid rgba(255,255,255,0.55);
    box-shadow:0 12px 35px rgba(0,0,0,0.28);
    border-radius:15px;
    display:flex;
    align-items:center;
    justify-content:center;
    gap:8px;
    cursor:pointer;
    font-weight:600;
    font-size:16px;
    transition:0.3s;
    position:relative;
}

.option-box:hover{
    transform:scale(1.10);
    background:rgba(255,255,255,0.70);
    box-shadow:0 16px 40px rgba(0,0,0,0.35);
}

.packages-submenu{
    width:160px;
    background:rgba(255,255,255,0.55);
    backdrop-filter:blur(18px);
    border-radius:15px;
    border:1px solid rgba(255,255,255,0.55);
    box-shadow:0 12px 35px rgba(0,0,0,0.28);
    display:none;
    flex-direction:column;
    overflow:hidden;
    animation:fadeIn 0.25s ease;
    position:absolute;
    left:-175px;
    top:0;
    z-index:600;
}

.sub-item{
    padding:12px;
    cursor:pointer;
    font-weight:600;
    border-bottom:1px solid rgba(255,255,255,0.3);
}

.sub-item:last-child{
    border-bottom:none;
}

.sub-item:hover{
    background:rgba(255,255,255,0.75);
}

/* CARD */
.card{
    width:900px;
    background:rgba(255,255,255,0.20);
    padding:35px;
    border-radius:20px;
    backdrop-filter:blur(15px);
    box-shadow:0 10px 35px rgba(0,0,0,0.3);
}

.card h2{
    text-align:center;
    margin-bottom:20px;
    font-size:28px;
}

.form-row{
    display:flex;
    gap:20px;
    margin-bottom:20px;
    position:relative;
}

input, select, .traveller-box{
    flex:1;
    padding:14px;
    border-radius:12px;
    border:1px solid rgba(255,255,255,0.6);
    background:rgba(255,255,255,0.85);
    backdrop-filter:blur(10px);
    font-size:15px;
    transition:0.25s ease;
}

input:focus, select:focus{
    outline:none;
    border:1px solid #ff5722;
    box-shadow:0 0 0 2px rgba(255,87,34,0.2);
}
.traveller-box{
    cursor:pointer;
    position:relative;
    display:flex;
    align-items:center;
    justify-content:space-between;
}

.traveller-popup{
    position:absolute;
    top:110%;
    right:0;
    width:280px;
    padding:22px;
    border-radius:16px;
    background:rgba(255,255,255,0.95);
    backdrop-filter:blur(18px);
    box-shadow:0 15px 35px rgba(0,0,0,0.35);
    display:none;
    z-index:5000;
    animation:fadeIn 0.25s ease;
}

.traveller-popup label{
    font-weight:600;
    font-size:14px;
}

.traveller-row{
    margin:18px 0;
    display:flex;
    align-items:center;
    justify-content:space-between;
}

.traveller-controls{
    display:flex;
    align-items:center;
    gap:12px;
}

.traveller-row button{
    width:32px;
    height:32px;
    border-radius:50%;
    border:none;
    background:#ff5722;
    color:white;
    font-weight:bold;
    cursor:pointer;
    transition:0.2s;
}

.traveller-row button:hover{
    transform:scale(1.1);
}

.apply-btn{
    width:100%;
    padding:12px;
    margin-top:15px;
    border:none;
    border-radius:25px;
    background:linear-gradient(135deg,#ff5722,#ff8a50);
    color:white;
    font-size:15px;
    font-weight:600;
    cursor:pointer;
    transition:0.25s ease;
}

.apply-btn:hover{
    transform:translateY(-2px);
    box-shadow:0 8px 20px rgba(255,87,34,0.4);
}

.apply-btn:active{
    transform:scale(0.98);
}

.search-btn{
    width:100%;
    padding:15px;
    background:#ff5722;
    color:white;
    border:none;
    font-size:18px;
    border-radius:10px;
    cursor:pointer;
}

/* FLOATING BUTTON */
.fab-menu{
    position:fixed;
    bottom:25px;
    right:25px;
    width:60px;
    height:60px;
    background:#ff5722;
    border-radius:50%;
    display:flex;
    justify-content:center;
    align-items:center;
    cursor:pointer;
    color:white;
    font-size:26px;
    box-shadow:0 10px 25px rgba(0,0,0,0.3);
    z-index:3000;
}

.fab-options{
    position:fixed;
    bottom:100px;
    right:25px;
    display:none;
    flex-direction:column;
    gap:12px;
    z-index:3000;
}

.fab-option{
    width:55px;
    height:55px;
    border-radius:50%;
    background:white;
    box-shadow:0 6px 18px rgba(0,0,0,0.25);
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:20px;
    cursor:pointer;
}

.fab-option:hover{
    transform:scale(1.1);
}

/* EXPLORE BUTTON — ORANGE */
.explore-container{
    width:100%;
    display:flex;
    justify-content:center;
    margin-top:-110px;
    position:relative;
    z-index:1200;
}

.explore-btn{
    background:#ff5722;
    padding:16px 34px;
    font-size:20px;
    border-radius:30px;
    border:none;
    color:white;
    font-weight:700;
    cursor:pointer;
    box-shadow:0 8px 25px rgba(0,0,0,0.3);
    transition:0.25s;
}

.explore-btn:hover{
    transform:scale(1.07);
}

/* insta Button */
.insta-btn {
    background: #ff5722;
    color: white;
    border: none;
    padding: 3px 10px;
    border-radius: 10px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: 0.25s;
    width: 120px;
}
.insta-btn:hover {
    background: #e64a19;
    transform: scale(1.06);
}

/* DARK MODE */
body.dark-mode .apply-btn{
    background:linear-gradient(135deg,#ff8c42,#ff5722);
}
body.dark-mode {
    background:url('images/bg.jpg');
    background-size:cover;
    background-position:center;
    background-attachment:fixed;
    color:#f4f4f4;
}
body.dark-mode .nav-transparent{
    background:rgba(0,0,0,0.4);
    box-shadow:0 3px 15px rgba(255,255,255,0.1);
}
body.dark-mode .option-box{
    background:rgba(0,0,0,0.4);
    border:1px solid rgba(255,255,255,0.1);
    color:white;
}
body.dark-mode .card{
    background:rgba(0,0,0,0.4);
}
body.dark-mode input,
body.dark-mode select,
body.dark-mode .traveller-box{
    background:rgba(0,0,0,0.6);
    color:white;
    border:1px solid rgba(255,255,255,0.2);
}

body.dark-mode .traveller-popup{
    background:rgba(0,0,0,0.85);
    color:white;
}
body.dark-mode .fab-option{
    background:#1e1e1e;
    color:white;
}
body.dark-mode .fab-menu{
    background:#ff8c42;
}
body.dark-mode .packages-submenu{
    background:rgba(0,0,0,0.4);
    border:1px solid rgba(255,255,255,0.1);
}
body.dark-mode .sub-item:hover{
    background:rgba(255,255,255,0.15);
}
body.dark-mode .info-box {
    background: rgba(0, 0, 0, 0.6);
    color: #f4f4f4;
}
body.dark-mode .notification-box {
    background: rgba(0, 0, 0, 0.6);
    color: #f4f4f4;
}
body.dark-mode .read-more{
    color:#ffd9b3; 
}
body.dark-mode .google-btn{
    color:grey; 
}

/* INFO SECTION */
.info-section{
    width:100%;
    padding:80px 5%;
    display:flex;
    justify-content:space-between;
    gap:30px;
}
.info-box{
    width:33%;
    padding:25px;
    border-radius:15px;

    background:rgba(255,255,255,0.55);
    backdrop-filter:blur(18px);
    border:1px solid rgba(255,255,255,0.55);
    box-shadow:0 12px 35px rgba(0,0,0,0.28);
    transition:0.3s;
}
.info-box:hover{
    transform:scale(1.05);
    background:rgba(255,255,255,0.70);
}
.info-box h3{
    margin-bottom:10px;
    color:#ff5722;
}
@media(max-width:900px){
    .left-panel{ display:none; }
}
@keyframes fadeIn{
    from { opacity:0; transform:translateY(-8px); }
    to { opacity:1; transform:translateY(0); }
}
.info-box {
    background: rgba(255, 255, 255, 0.6);
    backdrop-filter: blur(12px);
    border-radius: 16px;
    padding: 25px;
    transition: background 0.3s ease, color 0.3s ease;
}

/* ================= PREMIUM POPUP ================= */
.popup-overlay{
    position:fixed;
    inset:0;
    background:rgba(0,0,0,0.6);
    backdrop-filter:blur(6px);
    display:flex;
    justify-content:center;
    align-items:center;
    z-index:9999;
    animation:fadeIn 0.4s ease;
}
.popup-box{
    position:relative;
    background:rgba(255,255,255,0.95);
    width:380px;
    padding:30px;
    border-radius:20px;
    text-align:center;
    box-shadow:0 20px 40px rgba(0,0,0,0.4);
    animation:slideUp 0.4s ease;
}
.popup-box h2{
    margin-bottom:15px;
    color:#ff5722;
}
.popup-box input{
    width:100%;
    padding:12px;
    margin:10px 0;
    border-radius:8px;
    border:1px solid #ccc;
}
.popup-box button{
    width:100%;
    padding:12px;
    margin-top:10px;
    border:none;
    border-radius:25px;
    background:linear-gradient(135deg,#ff5722,#ff8a50);
    color:white;
    font-weight:bold;
    cursor:pointer;
    transition:0.3s;
}
.popup-box button:hover{
    transform:scale(1.05);
}
.toggle-link{
    margin-top:12px;
    display:block;
    font-size:14px;
    color:#333;
    cursor:pointer;
}
.close-btn{
    position:absolute;
    top:15px;
    right:20px;
    font-size:18px;
    cursor:pointer;
    color:#999;
}
.close-btn:hover{
    color:#ff5722;
}
/* Make popup two-column */
.popup-flex{
    display:flex;
    width:760px;
    padding:0;
    overflow:hidden;
    border-radius:14px;
}

/* LEFT IMAGE PART */
.popup-image{
    width:45%;
    background:#fff8f0;
    padding:30px;
    display:flex;
    justify-content:center;
    align-items:center;
}

.popup-image img{
    width:90%;
    object-fit:contain;
}

/* RIGHT FORM PART */
.popup-content{
    width:55%;
    padding:35px;
    position:relative;
}

.popup-content .close-btn{
    position:absolute;
    right:15px;
    top:15px;
    cursor:pointer;
    font-size:20px;
}

/* RESPONSIVE */
@media(max-width:700px){
    .popup-flex{
        flex-direction:column;
        width:90%;
    }
    .popup-image{
        width:100%;
        padding:20px;
    }
    .popup-content{
        width:100%;
        padding:25px;
    }
}

/* GLASS IMAGE (no floating) */
.glass-float {
    width: 50%;
    height: 100%;
    padding: 0;
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;

    /* Glass effect */
    background: rgba(255, 255, 255, 0.10);
    backdrop-filter: blur(22px) saturate(140%);
    -webkit-backdrop-filter: blur(22px) saturate(140%);

    border-radius: 0;
    overflow: hidden;

    /* Neutral shadow (no glow) */
    box-shadow: 0 15px 40px rgba(0,0,0,0.35);

    /* ❌ FLOAT REMOVED */
    animation: none;

    position: relative;
}

/* IMAGE EDGE-TO-EDGE */
.glass-float img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 0;
    box-shadow: none;
    display: block;
}

/* SHINE SWEEP STILL ACTIVE */
.glass-float::after {
    content: "";
    position: absolute;
    top: -100%;
    left: -60%;
    width: 120%;
    height: 120%;
    background: rgba(255,255,255,0.25);
    filter: blur(20px);
    transform: rotate(25deg);
    animation: shineSweep 5s ease-in-out infinite;
}

@keyframes shineSweep {
    0%   { transform: translateY(-180%) rotate(25deg); opacity: 0; }
    50%  { transform: translateY(40%) rotate(25deg); opacity: 1; }
    100% { transform: translateY(180%) rotate(25deg); opacity: 0; }
}
/* AGREEMENT TEXT */
.agree-text {
    font-size: 12px;
    margin: 10px 0 18px 0;
    color: #555;
    text-align: center;
}

.agree-text a {
    color: #0077ff;
    text-decoration: none;
}

/* OR DIVIDER */
.or-divider {
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 12px 0;
}

.or-divider::before,

.or-divider::after {
    content: "";
    flex: 1;
    height: 1px;
    background: #ccc;
    margin: 0 10px;
}

.or-divider span {
    color: #666;
    font-size: 14px;
}

/* GOOGLE BUTTON */
.google-btn {
    width: 100%;
    background: #f7f7f7;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    cursor: pointer;
    font-weight: 600;
    transition: 0.25s;
}

.google-btn img {
    width: 22px;
}

.google-btn:hover {
    background: #ececec;
}
/* Game Icon Style */
.nav-game {
    font-size: 20px;
    margin-right: 15px;
    transition: 0.3s ease;
    text-decoration: none;
}

/* Light Mode (default black) */
.nav-game {
    color: black;
}

/* Dark Mode (white icon) */
body.dark-mode .nav-game {
    color: white;
}

/* Hover effect */
.nav-game:hover {
    color: #ff5722;
    transform: scale(1.2);
}
/* Force all icons same visual width */
.nav-icon i {
    display: inline-block;
    width: 20px;
    text-align: center;
}
.nav-icon .fa-brain {
    width: 18px;
}
/* Make all icons behave same */
.nav-right {
    display: flex;
    align-items: center;
}

/* Give equal spacing */
.nav-right > * {
    margin: 0 10px;
}

/* Remove default anchor spacing */
.nav-right a {
    text-decoration: none;
}
.nav-right {
    display: flex;
    align-items: center;
    gap: 15px;   /* controls space */
}
/* Facebook blue */
.fb-btn {
    background: #1877F2;   
    color: white;
    border: none;
    padding: 3px 10px;
    border-radius: 10px;
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
    transition: 0.25s;
    width: 190px;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    text-decoration: none;
}

.fb-btn:hover {
    background: #0d5ecd;
    transform: scale(1.06);
}

</style>

<script>
window.addEventListener("DOMContentLoaded", () => {

const bell = document.querySelector(".notification-wrapper i");
const box = document.querySelector(".notification-wrapper .notification-box");

    bell.addEventListener("click", (event) => {
        event.stopPropagation();
        box.style.display = box.style.display === "block" ? "none" : "block";
    });

    const fab = document.querySelector(".fab-menu");
    const fabOptions = document.querySelector(".fab-options");

    fab.addEventListener("click", (event) => {
        event.stopPropagation();
        fabOptions.style.display = 
            fabOptions.style.display === "flex" ? "none" : "flex";
    });

    document.addEventListener("click", () => {
        fabOptions.style.display = "none";
        box.style.display = "none";
    });

    const darkToggle = document.querySelector(".fab-dark");

    if(localStorage.getItem('dark-mode') === 'true'){
        document.body.classList.add('dark-mode');
    }

    darkToggle.addEventListener("click", (event) => {
        event.stopPropagation();
        document.body.classList.toggle("dark-mode");
        localStorage.setItem('dark-mode', 
            document.body.classList.contains('dark-mode'));
    });

    const packagesBtn = document.querySelector(".packages-btn");
    const submenu = document.querySelector(".packages-submenu");

    packagesBtn.addEventListener("click", (event) => {
        event.stopPropagation();
        submenu.style.display =
            submenu.style.display === "flex" ? "none" : "flex";
    });

    const yourPlansBtn = document.querySelector(".yourplans-btn");
    const yourPlansMenu = document.querySelector(".yourplans-submenu");

    yourPlansBtn.addEventListener("click", (event) => {
        event.stopPropagation();
        yourPlansMenu.style.display =
            yourPlansMenu.style.display === "flex" ? "none" : "flex";
    });

    document.addEventListener("click", () => {
        submenu.style.display = "none";
        yourPlansMenu.style.display = "none";
    });

});
function showSignup(){
    document.getElementById("loginForm").style.display="none";
    document.getElementById("signupForm").style.display="block";
    document.getElementById("popupTitle").innerText="Sign Up";
}
function showLogin(){
    document.getElementById("signupForm").style.display="none";
    document.getElementById("loginForm").style.display="block";
    document.getElementById("popupTitle").innerText="Login";
}
function closePopup(){
    document.getElementById("authPopup").style.display="none";
}
window.onclick = function(event){
    let popup = document.getElementById("authPopup");
    if(event.target === popup){
        popup.style.display = "none";
    }
}
</script>
</head>
<body>

<div class="nav-transparent">
    <div class="nav-left">✈ Easy Go</div>
    <div class="nav-right">
        <div class="score-wrapper">
    <span class="score-btn" onclick="toggleScore()">⭐ Score</span>

    <div id="scorePopup" class="score-popup">
        <div class="score-content">
            <span class="close-score" onclick="toggleScore()">✖</span>

            <h4>Score</h4>
            <div class="notification-item">🔥 Current Streak: <?php echo $streak; ?> Days</div>
            <div class="notification-item">⭐ Total Points: <?php echo $points; ?></div>
            <div class="notification-item">🏆 Keep playing to unlock rewards</div>
        </div>
    </div>
</div>

<i class="fa-solid fa-heart" title="Wishlist" onclick="window.location.href='wishlist.php'"></i>
        <div class="notification-wrapper">
    <i class="fa-solid fa-bell" title="Notifications"></i>

    <div class="notification-box">
        <h4>Notifications</h4>
        <div class="notification-item">✈ New travel deals available</div>
        <div class="notification-item">❤️ You added an item to wishlist</div>
        <div class="notification-item">📦 Your package booking is confirmed</div>
    </div>
</div>
<!-- Game -->
<a href="https://www.crazygames.com/game/airport-security"
   target="_blank"
   class="nav-game"
   title="Fun Zone"
   onclick="updateStreak()">
   <i class="fa-solid fa-gamepad"></i>
</a>

<!-- Quiz -->
<a href="https://world-geography-games.com/en/flags_world.html"
   target="_blank"
   class="nav-icon"
   title="Travel Quiz"
   onclick="updateStreak()">
   <i class="fa-solid fa-head-side-virus"></i>
</a>
        <div class="auth-buttons">
<?php if(isset($_SESSION['user'])){ ?>
    <span>👋 <?php echo $_SESSION['user']['email']; ?></span>
    <button class="login-btn" onclick="window.location.href='logout.php'">Logout</button>
<?php } else { ?>
    <button class="login-btn" onclick="window.location.href='login.php'">Login</button>
    <button class="signup-btn" onclick="window.location.href='login.php?tab=signup'">Sign Up</button>
<?php } ?>
</div>
    </div>
</div>

<!-- Hamburger -->
<div class="fab-menu">
    <i class="fa-solid fa-bars"></i>
</div>

<div class="fab-options">
<div class="fab-option" onclick="window.location.href='profile.php'">
    <i class="fa-solid fa-user"></i>
</div>
<div class="fab-option" onclick="window.location.href='settings.php'">
    <i class="fa-solid fa-gear"></i>
</div>
    <div class="fab-option fab-dark"><i class="fa-solid fa-moon"></i></div>
</div>

<div class="hero">
       <div class="left-panel">
       <a href="data_hotels.php" style="text-decoration:none; color:inherit;">
         <div class="option-box">🏨 Hotels</div></a>

<div class="option-box packages-btn">🧳 Packages
            <div class="packages-submenu">
                <div class="sub-item" onclick="window.location.href='honeymoon.php'">💑 Honeymoon Packages</div>
                <div class="sub-item" onclick="window.location.href='weekendspecial.php'">🌄 Weekend Special</div>
                <div class="sub-item" onclick="window.location.href='budgetfriendly.php'">💸 Budget Friendly</div>
                <div class="sub-item" onclick="window.location.href='familytrips.php'">👨‍👩‍👧 Family Trips</div>
            </div>
</div>

<a href="deals.php" style="text-decoration:none; color:inherit;">
            <div class="option-box">🏷️ Deals</div></a>

<div class="option-box yourplans-btn">🗺️ Your Plans
            <div class="packages-submenu yourplans-submenu">
                <div class="sub-item" onclick="window.location.href='beaches.php'">🏖️ Beaches</div>
                <div class="sub-item" onclick="window.location.href='hillstations.php'">⛰️ Hill Stations</div>
                <div class="sub-item" onclick="window.location.href='trekking.php'">🥾 Trekking</div>
                <div class="sub-item" onclick="window.location.href='cruise.php'">🚢 Cruise Adventure</div>
            </div>
</div>
</div>

<div class="card">
    <h2>Book Your Flight</h2>
    <form action="flight_result.php" method="POST">
<div class="form-row">

    <div class="autocomplete-box">
        <input type="text" name="from_country" id="from_country" placeholder="From" required autocomplete="off">
        <div id="from_suggestions" class="suggestions"></div>
    </div>

    <div class="autocomplete-box">
        <input type="text" name="to_country" id="to_country" value="<?php echo isset($_GET['destination']) ? $_GET['destination'] : ''; ?>" placeholder="To" required autocomplete="off">
        <div id="to_suggestions" class="suggestions"></div>
    </div>

</div>

<div class="form-row">

    <!-- Trip Type -->
    <select id="tripType" name="trip_type">
        <option value="oneway">One Way</option>
        <option value="return">Return</option>
    </select>

    <!-- Depart Date -->
<input type="date" name="depart_date" required min="<?php echo date('Y-m-d'); ?>">

<!-- Return Date -->
<input type="date" name="return_date" id="returnDate" style="display:none;" min="<?php echo date('Y-m-d'); ?>">

    <!-- Travellers -->
    <div class="traveller-box" onclick="toggleTravellerPopup(event)">
        <span id="travellerSummary">1 Adult, Economy</span>
        <input type="hidden" name="travellers" id="travellersInput" value="1 Adult">
<input type="hidden" name="cabin_class" id="classInput" value="Economy">
        <div class="traveller-popup" id="travellerPopup">

    <label>Cabin Class</label>
    <select id="cabinClass">
        <option>Economy</option>
        <option>Premium Economy</option>
        <option>Business</option>
        <option>First</option>
    </select>

    <div class="traveller-row">
    <span>Adults</span>
    <div class="traveller-controls">
        <button type="button" onclick="changeCount(-1)">-</button>
        <span id="adultCount">1</span>
        <button type="button" onclick="changeCount(1)">+</button>
    </div>
</div>

    <button type="button" class="apply-btn" onclick="applyTraveller()">Apply</button>

</div>
    </div>

</div>
<button type="submit" class="search-btn" id="searchBtn">Search Flights</button>
</form>

</div> <!-- this closes card -->
</div>
</div>
<?php if(!isset($_SESSION['user'])){ ?>
<!-- ================= LOGIN / SIGNUP POPUP ================= -->
<div class="popup-overlay" id="authPopup">
    <div class="popup-box popup-flex">

        <!-- LEFT FLOATING IMAGE -->
        <div class="popup-image glass-float">
            <img src="images/login-art.jpeg" alt="Login Illustration">
        </div>

        <!-- RIGHT SIDE FORM -->
        <div class="popup-content">

            <span class="close-btn" onclick="closePopup()">✖</span>

            <h2 id="popupTitle">Login</h2>
           
            <form id="loginForm" method="POST" action="login.php">

    <input type="text" name="email" placeholder="Contact Number / Email Id" required>
    <input type="password" name="password" placeholder="Password" required>

    <button type="submit">Login</button>

    <span class="toggle-link" onclick="showSignup()">
        Don’t have an account? Sign Up
    </span>

        </form>
        <!-- AGREEMENT TEXT -->
        <p class="agree-text">
        By proceeding, you agree with our 
        <a href="#">Terms of Service</a>, 
        <a href="#">Privacy Policy</a> & 
        <a href="#">Master User Agreement</a>.
        </p>

        <!-- OR DIVIDER -->
        <div class="or-divider">
            <span>Or</span>
        </div>

        <!-- GOOGLE SIGN-IN BUTTON -->
        <div class="google-btn" onclick="googleLogin()">
            <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg">
            <span>Sign in with Google</span>
        </div>
            <div id="signupForm" style="display:none;">
                <input type="text" placeholder="Contact Number">
                <input type="text" placeholder="Username">
                <button>Create Account</button>
                <span class="toggle-link" onclick="showLogin()">
                    Already have an account? Login
                </span>
                
            </div>

        </div>
    </div>
</div>
<?php } ?>

<div class="explore-container">

<button type="button" onclick="openRewards()" class="reward-btn">
    🎁 Travel Rewards
</button>
    <a href="countries.php" 
       style="
           display:inline-block;
           text-decoration:none;
           background:#ff5722;
           color:white;
           padding:14px 28px;
           border-radius:30px;
           font-weight:600;
           box-shadow:0 8px 25px rgba(0,0,0,0.25);">Explore 18+ Countries</a>
</div>

<div class="info-section">
    <div class="info-box">
        <h3>Why Easy Go?</h3>
        <p>
            Easy Go brings you a seamless travel-booking experience with real-time prices,
             trusted packages, and smooth navigation. We make travel planning easy, fast, 
             and stress-free for everyone. With a secure booking system and user-friendly 
             design, Easy Go ensures a smooth journey from planning to departure, helping 
             you travel with confidence and convenience.
        </p>
         <a href="why-easygo.php" class="read-more">Read More →</a>
    </div>

    <div class="info-box">
        <h3>About Us</h3>
        <p>
            We are a travel platform built to help you explore the world effortlessly. 
            With 18+ international destinations, curated plans, and transparent pricing,
            we ensure your journey starts the moment you visit our website.
        </p>
         <a href="community.php" class="read-more">Read More →</a>
         <div class="insta-section">
            
            <span><p class="insta-text"></span>
                Stay connected with us for travel reels & deals. 
            </p>

    <a href="https://instagram.com/easygo_travel" target="_blank" class="insta-btn">
                <i class="fa-brands fa-instagram"></i>
                Follow Us on Instagram
            </a>
         </div>

         <span><p class="FACEBOOK-text"></span>
                You Can Also Stay Connected With Us On Facebook.
            </p>

         <a href="https://www.facebook.com/share/1CF4AZ915U/?mibextid=wwXIfr" target="_blank" class="fb-btn">
    <i class="fa-brands fa-facebook-f"></i>
    Follow Us on Facebook
</a>
    </div>

    <div class="info-box">
        <h3>Why Our Website is Budget Friendly?</h3>
        <p>
       We compare prices across airlines and hotels to bring you the best available deals. Our 
       special packages and exclusive discounts help you travel more while saving money. With 
       transparent pricing and no hidden fees, you can book confidently without worrying about 
       extra charges or unexpected taxes. 
        </p>
       <a href="why-budgetfriendly.php" class="read-more">Read More →</a>
</div>

<script type="module">
  import { initializeApp } from "https://www.gstatic.com/firebasejs/12.9.0/firebase-app.js";
  import { getAuth, GoogleAuthProvider, signInWithPopup } from "https://www.gstatic.com/firebasejs/12.9.0/firebase-auth.js";

  const firebaseConfig = {
    apiKey: "AIzaSyCm8xwmTgvDvZjZF3Rdi9WxP-0r3dz_zMQ",
    authDomain: "easygotravel.firebaseapp.com",
    projectId: "easygotravel",
    storageBucket: "easygotravel.firebasestorage.app",
    messagingSenderId: "394692745756",
    appId: "1:394692745756:web:23b48ad88d30aed00c1dd9"
  };

  const app = initializeApp(firebaseConfig);
  const auth = getAuth(app);
  const provider = new GoogleAuthProvider();

  window.googleLogin = function () {
    signInWithPopup(auth, provider)
      .then((result) => {
        document.querySelector("#loginForm input[type='text']").value = result.user.email;
document.getElementById("authPopup").style.display = "none";

alert("Welcome " + result.user.displayName);
      })
      .catch((error) => {
        console.log(error);
        alert("Google Login Failed");
      });
  };
</script>
<script>
setupAutocomplete("from_country", "from_suggestions");
setupAutocomplete("to_country", "to_suggestions");

</script>
<style>
.suggestions {
    background: white;
    border: 1px solid #ddd;
    max-height: 150px;
    overflow-y: auto;
    position: absolute;
    width: 100%;
    z-index: 1000;
}

.suggest-item {
    padding: 8px;
    cursor: pointer;
}

.suggest-item:hover {
    background: #f2f2f2;
}
/* Button */
.reward-btn {
    padding: 12px 25px;
    border: none;
    border-radius: 25px;
    background: #ff5722;
    color: white;
    cursor: pointer;
}

/* Popup background */
.reward-popup {
    position: fixed;
    inset: 0;                 /* top:0 left:0 right:0 bottom:0 */
    background: rgba(0,0,0,0.6);
    display: none;            /* hidden by default */
    justify-content: center;  /* center horizontally */
    align-items: center;      /* center vertically */
    z-index: 9999;
}

.reward-popup.active {
    display: flex;
}

.reward-content {
    background: white;
    padding: 35px;
    width: 450px;
    border-radius: 18px;
    text-align: center;
    position: relative;
    box-shadow: 0 20px 40px rgba(0,0,0,0.3);
    animation: popupFade 0.3s ease;
}

@keyframes popupFade {
    from {
        transform: scale(0.8);
        opacity: 0;
    }
    to {
        transform: scale(1);
        opacity: 1;
    }
}

/*POPUP REWARD*/
.reward-content{
    width:520px;
    padding:40px;
    border-radius:28px;

    background:linear-gradient(180deg,#2b2b2b,#1b1b1b);
    color:white;

    backdrop-filter:blur(25px);
    border:1px solid rgba(255,180,80,0.4);

    box-shadow:
    0 20px 60px rgba(0,0,0,0.6),
    0 0 0 1px rgba(255,180,80,0.15) inset;

    position:relative;
}

.reward-card{
    background:rgba(255,255,255,0.08);
    border-radius:20px;
    padding:22px;
    margin-top:20px;
    backdrop-filter:blur(12px);

    border:1px solid rgba(255,255,255,0.08);

    box-shadow:0 8px 25px rgba(0,0,0,0.35);
}

/* Close button */
.close-btn {
    position: absolute;
    right: 15px;
    top: 10px;
    cursor: pointer;
}

/* Progress bar */
.progress-bar{
    width:100%;
    height:8px;
    background:rgba(255,255,255,0.15);
    border-radius:10px;
    margin-top:12px;
}

.progress-fill{
    height:100%;
    border-radius:10px;

    background:linear-gradient(
    90deg,
    #ffb347,
    #ff8c00,
    #ff5722
    );
}

.reward-content h2{
    font-size:26px;
    margin-bottom:10px;
}

.score-wrapper{
    position:relative;
    display:inline-block;
}

.score-popup{
    position:absolute;
    top:120%;        /* below button */
    right:0;         /* align right edge */
    width:260px;
    background:white;
    border-radius:10px;
    box-shadow:0 5px 25px rgba(0,0,0,0.25);
    padding:15px;
    display:none;
    z-index:2000;
}

body.dark-mode .score-popup{
background:rgba(0,0,0,0.85);
color:#f4f4f4;
box-shadow:0 5px 25px rgba(0,0,0,0.6);
}

body.dark-mode .score-popup .notification-item{
border-bottom:1px solid rgba(255,255,255,0.1);
}

body.dark-mode .score-popup h4{
color:#ff8c42;
}

body.dark-mode .score-popup span{
color:#ccc;
}

.score-popup.active{
display:block;
}

.score-content{
padding:0;
}

.close-score{
position:absolute;
right:15px;
top:10px;
cursor:pointer;
}

.score-btn{
background:#ff5722;
color:white;
padding:6px 14px;
border-radius:12px;
font-size:14px;
cursor:pointer;
font-weight:600;
}

.score-btn:hover{
opacity:0.9;
transform:scale(1.05);
}

.streak-text{
    font-size:14px;
    opacity:0.85;
}

.status{
    font-size:13px;
    opacity:0.6;
}

.explore-container{
    display: flex;
    flex-direction: column;   /* makes items vertical */
    align-items: center;      /* center horizontally */
    gap: 15px;                /* space between buttons */
}
@media (prefers-color-scheme: dark){

    .rewards-popup{
        background: #1e1e1e;
        color: #f5f5f5;
        box-shadow: 0 15px 40px rgba(0,0,0,0.6);
    }

    .rewards-popup h2{
        color: #ff784e;
    }

    .progress-bar{
        background: #333;
    }

    .progress-fill{
        background: linear-gradient(90deg,#ff5722,#ff9800);
    }

    .rewards-popup small,
    .rewards-popup p{
        color: #ccc;
    }
}
.popup-box button{
    width:100%;
    padding:12px;
    margin-top:10px;
    border:none;
    border-radius:25px;
    background:linear-gradient(135deg,#ff5722,#ff8a50);
    color:white;
    font-weight:bold;
    cursor:pointer;
    transition:0.3s;
}

.popup-box button:hover{
    transform:scale(1.05);
    box-shadow:0 6px 20px rgba(255,87,34,0.4);
}
</style>
<script>
function setupAutocomplete(inputId, suggestionBoxId) {

    const input = document.getElementById(inputId);
    const suggestionBox = document.getElementById(suggestionBoxId);

    input.addEventListener("keyup", function() {

        let query = input.value.trim();

        if(query.length < 1){
            suggestionBox.innerHTML = "";
            suggestionBox.style.display = "none";
            return;
        }

        fetch("search_airports.php?query=" + query)
            .then(response => response.text())
            .then(data => {
                suggestionBox.innerHTML = data;
                suggestionBox.style.display = "block";

                document.querySelectorAll(".suggest-item").forEach(item => {
                    item.addEventListener("click", function() {
                        input.value = this.getAttribute("data-value");
                        suggestionBox.innerHTML = "";
                        suggestionBox.style.display = "none";
                    });
                });
            });
    });
}

setupAutocomplete("from_country", "from_suggestions");
setupAutocomplete("to_country", "to_suggestions");
</script>
<script>
let adults = 1;

document.getElementById("tripType").addEventListener("change", function(){
    if(this.value === "return"){
        document.getElementById("returnDate").style.display = "block";
    } else {
        document.getElementById("returnDate").style.display = "none";
    }
});

function toggleTravellerPopup(event){
    event.stopPropagation();
    const popup = document.getElementById("travellerPopup");
    popup.style.display = popup.style.display === "block" ? "none" : "block";
}

document.getElementById("travellerPopup").addEventListener("click", function(e){
    e.stopPropagation();
});

document.addEventListener("click", function(){
    document.getElementById("travellerPopup").style.display = "none";
});

function changeCount(val){
    adults += val;
    if(adults < 1) adults = 1;
    document.getElementById("adultCount").innerText = adults;
}

function applyTraveller(){
    const cabin = document.getElementById("cabinClass").value;

    document.getElementById("travellerSummary").innerText =
        adults + " Adult" + (adults > 1 ? "s" : "") + ", " + cabin;

    document.getElementById("travellersInput").value =
        adults + " Adult" + (adults > 1 ? "s" : "");

    document.getElementById("classInput").value = cabin;

    document.getElementById("travellerPopup").style.display = "none";
}
</script>
<div id="rewardPopup" class="reward-popup">
  <div class="reward-content">

    <span class="close-btn" onclick="closeRewards()">×</span>

    <h2>⭐ Easy Go Elite Rewards</h2>

    <p class="streak-text">🔥 Current Streak: <?php echo $streak; ?> Days</p>

    <!-- Bronze -->
    <div class="reward-card bronze">
        <h3>🥉 Bronze Reward</h3>
        <p>Complete 10 Days</p>
        <p>+50 Points</p>
        <div class="progress-bar">
            <div class="progress-fill" style="width:<?php echo $bronze_progress; ?>%"></div>
        </div>
        <span class="status locked">Locked</span>
    </div>

    <!-- Silver -->
    <div class="reward-card silver">
        <h3>🥈 Silver Reward</h3>
        <p>Complete 20 Days</p>
        <p>+100 Points</p>
        <div class="progress-bar">
            <div class="progress-fill" style="width:10%"></div>
        </div>
        <span class="status locked">Locked</span>
    </div>

    <!-- Gold -->
    <div class="reward-card gold">
        <h3>🥇 Gold Reward</h3>
        <p>Complete 30 Days</p>
        <p>+200 Points + 10% Discount</p>
        <div class="progress-bar">
            <div class="progress-fill" style="width:5%"></div>
        </div>
        <span class="status locked">Locked</span>
    </div>

  </div>
</div>
<script>
function openRewards() {
    document.getElementById("rewardPopup").classList.add("active");
}

function closeRewards() {
    document.getElementById("rewardPopup").classList.remove("active");
}
</script>
<script>
function updateStreak(){

fetch("update_streak.php")
.then(response => response.text())
.then(data => {
    console.log("Streak Updated");
});

}

</script>
<?php if($rewardMessage != ""){ ?>
<script>
alert("<?php echo $rewardMessage; ?>");
</script>
<?php } ?>
<script>
function toggleScore(){
    const popup = document.getElementById("scorePopup");
    popup.style.display = popup.style.display === "block" ? "none" : "block";
}
</script>
<script> document.addEventListener("click", function(e){ if(!e.target.closest(".score-btn") && !e.target.closest("#scorePopup")){ document.getElementById("scorePopup").style.display = "none"; } }); </script>


 <!-- AI CHAT BUTTON -->
<div id="chat-btn" onclick="toggleChat()">AI 🤖</div>

<!-- CHAT BOX -->
<div id="chat-box">
    <div id="chat-header">Travel AI 🤖</div>
    <div id="chat-body"></div>
    <input type="text" id="userInput" placeholder="Ask anything..." onkeypress="handleKey(event)">
</div>

<style>
#chat-btn{
    position: fixed;
    top: 90px;
    right: 20px;
    background: orangered;
    color: white;
    padding: 12px;
    border-radius: 50%;
    cursor: pointer;
    z-index: 1000;
}

#chat-box{
    display: none;
    position: fixed;
    top: 140px;   /* below button */
    right: 20px;
    width: 300px;
    height: 400px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.3);
    overflow: hidden;
    z-index: 1000;
}

#chat-header{
    background: orangered;
    color: white;
    padding: 10px;
    text-align: center;
}

#chat-body{
    height: 300px;
    overflow-y: auto;
    padding: 10px;
}

#userInput{
    width: 100%;
    border: none;
    padding: 10px;
    border-top: 1px solid #ccc;
}
</style>

<script>
function toggleChat(){
    let box = document.getElementById("chat-box");
    box.style.display = box.style.display === "block" ? "none" : "block";
}

function handleKey(e){
    if(e.key === "Enter"){
        let input = document.getElementById("userInput");
        let msg = input.value.toLowerCase();

        let chat = document.getElementById("chat-body");

        chat.innerHTML += "<p><b>You:</b> " + msg + "</p>";

        let reply = "";

        // GREETING
        if(msg.includes("hi") || msg.includes("hello")){
            reply = "Hello Hasti 😊✈️ How can I help you plan your trip?";
        }

        // DESTINATIONS
        else if(msg.includes("india")){
            reply = "India 🇮🇳 is amazing! Visit Taj Mahal, Goa beaches, and Kerala backwaters.";
        }
        else if(msg.includes("dubai")){
            reply = "Dubai 🇦🇪 is famous for Burj Khalifa, desert safari, and luxury shopping!";
        }
        else if(msg.includes("paris")){
            reply = "Paris 🇫🇷 is perfect for romance 💕 Visit Eiffel Tower and Louvre Museum.";
        }

        // BUDGET
        else if(msg.includes("cheap") || msg.includes("budget")){
            reply = "For budget trips 💸 try Thailand 🇹🇭, Vietnam 🇻🇳, or Bali 🌴";
        }

        // HONEYMOON
        else if(msg.includes("honeymoon")){
            reply = "Best honeymoon places 💕: Maldives 🏝️, Switzerland 🇨🇭, Bali 🌴";
        }

        // FLIGHT
        else if(msg.includes("flight")){
            reply = "You can search flights using the form above ✈️";
        }

        // WEATHER / BEST TIME
        else if(msg.includes("best time")){
            reply = "Best time depends on destination 🌍 Example: Europe (Apr–Jun), India (Oct–Mar)";
        }

        // DEFAULT
        else{
            let randomReplies = [
                "That sounds interesting 😄 Tell me more!",
                "I can help you with travel, destinations, and booking ✈️",
                "Try asking about budget trips, countries, or flights 😊",
                "I'm your travel assistant 🌍 Ask me anything!"
            ];
            reply = randomReplies[Math.floor(Math.random() * randomReplies.length)];
        }

        chat.innerHTML += "<p><b>AI:</b> " + reply + "</p>";

        input.value = "";
        chat.scrollTop = chat.scrollHeight;
    }
}
</script>
</body>
</html>