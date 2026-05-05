<?php
session_start();
include 'data.php';

$placeName = $_GET['place'] ?? '';

// Fake Login
if(isset($_GET['login'])){
    $_SESSION['user'] = $_GET['login'];
}

// Fake Signup
if(isset($_GET['signup_user'])){
    $_SESSION['temp_user'] = $_GET['signup_user'];
    $_SESSION['temp_pass'] = $_GET['signup_pass'];
    $_SESSION['user'] = $_GET['signup_user'];
}

$selectedPlace = null;
foreach ($data as $countryPlaces) {
    foreach ($countryPlaces as $p) {
        if ($p['name'] === $placeName) {
            $selectedPlace = $p;
            break 2;
        }
    }
}

if (!$selectedPlace) {
    echo "Place not found";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?= htmlspecialchars($placeName) ?> Hotels</title>
<link rel="stylesheet" href="css/style.css">

<style>
/* Background */
body {
    font-family: "Segoe UI", Arial, sans-serif;
    margin: 0;
    background: url('images/bg.jpg') center/cover fixed no-repeat;
}

/* Page Wrapper */
.page-wrapper {
    display: flex;
    justify-content: center;
    padding: 40px 0;
}

/* Glass Container */
.glass-card {
    width: 70%;
    max-width: 600px;
    background: rgba(255,255,255,0.35);
    backdrop-filter: blur(16px);
    border: 1px solid rgba(255,255,255,0.45);
    box-shadow: 0 12px 35px rgba(0,0,0,0.25);
    padding: 30px;
    border-radius: 22px;
}

.hotel-title {
    text-align: center;
    color: #ff5722;
    font-size: 30px;
    font-weight: 800;
}

.budget-title {
    color: #ff7043;
    font-size: 22px;
    margin-top: 20px;
}

/* Hotel Card */
.hotel-card {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 18px;
    background: rgba(255,255,255,0.55);
    backdrop-filter: blur(14px);
    border: 1px solid rgba(255,255,255,0.35);
    padding: 18px;
    margin-bottom: 15px;
    border-radius: 16px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.20);
    transition: 0.3s ease;
}
.hotel-card:hover {
    transform: scale(1.02);
    background: rgba(255,255,255,0.75);
}

/* Left Text */
.hotel-info {
    flex: 1;
}

/* Hotel Image Box */
.hotel-img-box {
    width: 200px;
    height: 200px;
    border-radius: 14px;
    overflow: hidden;
    backdrop-filter: blur(8px);
    box-shadow: 0 5px 18px rgba(0,0,0,0.15);
}
.hotel-img-box img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Book Button */
.book-btn {
    background: #ff5722;
    color: white;
    border: none;
    padding: 8px 14px;
    border-radius: 10px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: 0.25s;
    width: 120px;
}
.book-btn:hover {
    background: #e64a19;
    transform: scale(1.06);
}
/* ===== BUTTON GLOW ===== */
.book-btn{
    box-shadow:0 0 0 rgba(255,87,34,0.7);
    animation:pulseGlow 2s infinite;
}

@keyframes pulseGlow{
    0%{ box-shadow:0 0 0 0 rgba(255,87,34,0.7); }
    70%{ box-shadow:0 0 0 12px rgba(255,87,34,0); }
    100%{ box-shadow:0 0 0 0 rgba(255,87,34,0); }
}
/* Popups */
.popup-overlay{
    display:none;
    position:fixed;
    top:0; left:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,0.45);
    justify-content:center;
    align-items:center;
    z-index:9999;
}

.popup-box{
    background: rgba(255,255,255,0.35);
    backdrop-filter: blur(18px);
    border: 1px solid rgba(255,255,255,0.45);
    box-shadow: 0 12px 35px rgba(0,0,0,0.35);
    padding: 25px;
    border-radius: 20px;
    width: 90%;
    max-width: 350px;
    text-align: center;
}

.popup-box input{
    width:100%;
    padding:10px;
    margin:8px 0;
    border-radius:10px;
    border:1px solid #ccc;
}

.popup-box button{
    width:100%;
    padding:10px;
    margin:8px 0;
    border:none;
    border-radius:12px;
    cursor:pointer;
    font-weight:600;
    background:#ff5722;
    color:#fff;
    transition:0.25s;
}

.popup-box button:hover{
    background:#e64a19;
}

.cancel-btn{
    background:#777 !important;
}
</style>
</head>

<body>

<div class="page-wrapper">
<div class="glass-card">

<h2 class="hotel-title"><?= $placeName ?> Hotels</h2>

<?php
$budgets = ["LOW","MEDIUM","HIGH"];
$imageCounter = 1;

foreach ($budgets as $budget):
?>
<div class="budget-block">
<h3 class="budget-title"><?= strtolower($budget) ?> budget</h3>

<div class="hotel-section">

<?php foreach ($selectedPlace['hotels'] as $h): ?>
<?php if ($h['budget'] === $budget): ?>

<div class="hotel-card">
    <div class="hotel-info">
        <h4><?= $h['name'] ?></h4>
        <p>₹<?= number_format($h['price']) ?> / night</p>
        <p>⭐ <?= $h['rating'] ?></p>
        <button class="book-btn" onclick="checkLogin()">Book Now</button>
    </div>

    <div class="hotel-img-box">
        <img src="<?= $h['image']; ?>" alt="Hotel Image">
    </div>
</div>
<?php endif; ?>
<?php endforeach; ?>

</div>
</div>
<?php endforeach; ?>

</div>
</div>

<!-- POPUPS -->

<div id="loginPopup" class="popup-overlay">
<div class="popup-box">
<h3>Login</h3>
<input type="text" id="login_username" placeholder="Enter username">
<input type="password" id="login_password" placeholder="Enter password">
<button onclick="fakeLogin()">Login</button>
<p style="font-size:14px;">
Don’t have account?
<a href="#" onclick="openSignup()" style="color:#ff5722;font-weight:bold;">Sign Up</a>
</p>
<button class="cancel-btn" onclick="closeAll()">Cancel</button>
</div>
</div>

<div id="signupPopup" class="popup-overlay">
<div class="popup-box">
<h3>Sign Up</h3>
<input type="text" id="signup_username" placeholder="Enter username">
<input type="password" id="signup_password" placeholder="Enter password">
<input type="password" id="signup_confirm" placeholder="Confirm password">
<button onclick="fakeSignup()">Sign Up</button>
<button class="cancel-btn" onclick="closeAll()">Cancel</button>
</div>
</div>

<div id="paymentOptions" class="popup-overlay">
<div class="popup-box">
<h3>Select Payment Method</h3>
<button onclick="openPaymentForm()">📱 UPI</button>
<button onclick="openPaymentForm()">💳 Card</button>
<button onclick="openPaymentForm()">🏦 Net Banking</button>
<button class="cancel-btn" onclick="closeAll()">Cancel</button>
</div>
</div>

<div id="paymentForm" class="popup-overlay">
<div class="popup-box">
<h3>Payment Details</h3>
<input type="text" placeholder="Your Name">
<input type="text" placeholder="UPI ID / Card Number">
<input type="password" placeholder="PIN / CVV">
<button onclick="showSuccess()">Pay Now</button>
</div>
</div>

<div id="successPopup" class="popup-overlay">
<div class="popup-box">
<h3>🎉 Payment Successful</h3>
<p>Booking Confirmed!</p>
<button onclick="closeAll()">OK</button>
</div>
</div>

<script>
function checkLogin(){
<?php if(isset($_SESSION['user'])): ?>
openPaymentOptions();
<?php else: ?>
document.getElementById("loginPopup").style.display="flex";
<?php endif; ?>
}

function fakeLogin(){
var u = document.getElementById("login_username").value;
var p = document.getElementById("login_password").value;

if(u.trim()==="" || p.trim()===""){
alert("Fill all fields");
return;
}

window.location.href="hotel.php?place=<?= urlencode($placeName) ?>&login="+u;
}

function openSignup(){
document.getElementById("loginPopup").style.display="none";
document.getElementById("signupPopup").style.display="flex";
}

function fakeSignup(){
var u = document.getElementById("signup_username").value;
var p = document.getElementById("signup_password").value;
var c = document.getElementById("signup_confirm").value;

if(u==="" || p==="" || c===""){
alert("Fill all fields");
return;
}
if(p !== c){
alert("Passwords do not match");
return;
}

window.location.href="hotel.php?place=<?= urlencode($placeName) ?>&signup_user="+u+"&signup_pass="+p;
}

function openPaymentOptions(){
document.getElementById("paymentOptions").style.display="flex";
}

function openPaymentForm(){
document.getElementById("paymentOptions").style.display="none";
document.getElementById("paymentForm").style.display="flex";
}

function showSuccess(){
document.getElementById("paymentForm").style.display="none";
document.getElementById("successPopup").style.display="flex";
}

function closeAll(){
document.querySelectorAll('.popup-overlay')
.forEach(p => p.style.display="none");
}
</script>

</body>
</html>