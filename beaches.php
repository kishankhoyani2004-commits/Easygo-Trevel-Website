<?php
session_start();

if(!isset($_SESSION['user']) || !is_array($_SESSION['user'])){
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Beach Holiday Packages | Easy Go</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
body{
    background:url('images/bg.jpg');
    background-size:cover;
    background-position:center;
    background-attachment:fixed;
    font-family:"Segoe UI", Arial, sans-serif;
}

/* MAIN CONTAINER */
.beach-container{
    margin-top:120px;
    width:100%;
    display:flex;
    flex-direction:column;
    align-items:center;
    padding:20px;
}

/* HEADER */
.beach-container h2{
    font-size:32px;
    font-weight:800;
    color:#ff5722;
    margin-bottom:25px;
}

/* GRID */
.beach-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit, minmax(260px, 1fr));
    gap:25px;
    width:90%;
    max-width:1100px;
}

/* CARD */
.beach-card{
    background:rgba(255,255,255,0.55);
    border:1px solid rgba(255,255,255,0.55);
    backdrop-filter:blur(18px);
    border-radius:18px;
    padding:0 0 25px;
    box-shadow:0 12px 32px rgba(0,0,0,0.28);
    transition:0.3s;
    overflow:hidden;
}

.beach-card:hover{
    transform:scale(1.05);
    background:rgba(255,255,255,0.70);
}

/* IMAGE */
.beach-img{
    width:100%;
    height:180px;
    object-fit:cover;
    border-top-left-radius:18px;
    border-top-right-radius:18px;
}

/* TITLE */
.beach-card h3{
    color:#ff4b4b;
    font-size:20px;
    font-weight:700;
    margin:15px 20px 10px;
}

/* PRICE */
.price{
    font-size:18px;
    font-weight:700;
    color:#333;
    margin:0 20px 18px;
}

/* FOOTER */
.card-footer{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:0 20px;
}

.card-footer a{
    text-decoration:none;
    color:#333;
    font-weight:600;
}

.arrow-btn{
    width:45px;
    height:45px;
    border-radius:50%;
    border:1px solid #aaa;
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:20px;
}
.hotel-book-btn{
    padding:8px 20px;
    background:#ff5722;
    color:white;
    border:none;
    border-radius:20px;
    font-weight:600;
    font-size:14px;
    cursor:pointer;

    box-shadow:
        0 0 0 4px rgba(255,87,34,0.2),
        0 4px 10px rgba(0,0,0,0.2);

    transition:all 0.3s ease;
}

.hotel-book-btn:hover{
    transform:translateY(-2px);
    box-shadow:
        0 0 0 6px rgba(255,87,34,0.25),
        0 8px 18px rgba(0,0,0,0.3);
}
/* ===== BOOKING POPUP STYLES ===== */

.custom-popup{
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,0.6);
    display:flex;
    justify-content:center;
    align-items:center;
    z-index:9999;
}

.custom-box{
    background:rgba(255,255,255,0.85);
    backdrop-filter:blur(20px);
    padding:30px;
    border-radius:20px;
    width:350px;
    text-align:center;
    box-shadow:0 15px 35px rgba(0,0,0,0.3);
}

.custom-box input{
    width:100%;
    padding:12px;
    margin:12px 0;
    border-radius:25px;
    border:1px solid #ddd;
    outline:none;
}

.custom-box input:focus{
    border:1px solid #ff5722;
    box-shadow:0 0 8px rgba(255,87,34,0.4);
}

.pay-option{
    width:100%;
    padding:12px;
    margin:10px 0;
    border:none;
    border-radius:25px;
    background:#ff5722;
    color:white;
    font-weight:600;
    cursor:pointer;
}

.cancel-btn{
    margin-top:10px;
    background:#999;
    color:white;
    border:none;
    padding:10px;
    border-radius:20px;
    width:100%;
}
</style>
</head>

<body>
<script>
var isLoggedIn = <?php echo isset($_SESSION['user']) ? 'true' : 'false'; ?>;
</script>

<div class="beach-container">

    <h2>Beach Holiday Packages</h2>

    <div class="beach-grid">

        <!-- CARD 1 -->
        <div class="beach-card">
            <img src="images/india/goa.jpg" class="beach-img" alt="Goa Beach">
            <h3>🌊 Goa Beaches</h3>
            <div class="price">Starting from ₹5,499</div>
            <div class="card-footer">
                <button class="hotel-book-btn bookBtn">Book Now</button>
            </div>
        </div>

        <!-- CARD 2 -->
        <div class="beach-card">
            <img src="images/andaman_photo.jpg" class="beach-img" alt="Andaman Beach">
            <h3>🏖️ Andaman & Nicobar</h3>
            <div class="price">Starting from ₹12,999</div>
            <div class="card-footer">
                <button class="hotel-book-btn bookBtn">Book Now</button>
            </div>
        </div>

        <!-- CARD 3 -->
        <div class="beach-card">
            <img src="images/gokarna_photo.jpg" class="beach-img" alt="Gokarna Beach">
            <h3>🌅 Gokarna Beaches</h3>
            <div class="price">Starting from ₹7,250</div>
            <div class="card-footer">
                <button class="hotel-book-btn bookBtn">Book Now</button>
            </div>
        </div>

        <!-- CARD 4 -->
        <div class="beach-card">
            <img src="images/lakshadweep_photo.jpg" class="beach-img" alt="Lakshadweep">
            <h3>🌴 Lakshadweep</h3>
            <div class="price">Starting from ₹18,499</div>
            <div class="card-footer">
                <button class="hotel-book-btn bookBtn">Book Now</button>
            </div>
        </div>

        <!-- CARD 5 -->
        <div class="beach-card">
            <img src="images/puducherry_photo.jpeg" class="beach-img" alt="Puducherry Beach">
            <h3>🍹 Puducherry Beach Tour</h3>
            <div class="price">Starting from ₹6,380</div>
            <div class="card-footer">
                <button class="hotel-book-btn bookBtn">Book Now</button>
            </div>
        </div>

        <!-- CARD 6 -->
        <div class="beach-card">
            <img src="images/kovalam_photo.jpg" class="beach-img" alt="Kovalam Beach">
            <h3>🌺 Kovalam & Varkala</h3>
            <div class="price">Starting from ₹8,450</div>
            <div class="card-footer">
                <button class="hotel-book-btn bookBtn">Book Now</button>
            </div>
        </div>

    </div>
</div>
<!-- LOGIN MODAL -->
<div id="loginModal" class="custom-popup" style="display:none;">
  <div class="custom-box">
      <h3>Login</h3>
      <input type="text" placeholder="Enter username">
      <input type="password" placeholder="Enter password">
      <button class="pay-option" onclick="loginSuccess()">Login</button>
      <p>Don’t have account?
         <span style="color:#ff5722; cursor:pointer;" onclick="openSignup()">Sign Up</span>
      </p>
      <button class="cancel-btn" onclick="closeLogin()">Cancel</button>
  </div>
</div>

<!-- SIGNUP MODAL -->
<div id="signupModal" class="custom-popup" style="display:none;">
  <div class="custom-box">
      <h3>Sign Up</h3>
      <input type="text" placeholder="Enter username">
      <input type="password" placeholder="Enter password">
      <input type="password" placeholder="Confirm password">
      <button class="pay-option" onclick="signupSuccess()">Sign Up</button>
      <button class="cancel-btn" onclick="closeSignup()">Cancel</button>
  </div>
</div>

<!-- PAYMENT METHOD -->
<div id="paymentMethodModal" class="custom-popup" style="display:none;">
  <div class="custom-box">
      <h3>Select Payment Method</h3>
      <button class="pay-option" onclick="selectMethod('upi')">UPI</button>
      <button class="pay-option" onclick="selectMethod('card')">Card</button>
      <button class="pay-option" onclick="selectMethod('net')">Net Banking</button>
      <button class="cancel-btn" onclick="closePaymentMethod()">Cancel</button>
  </div>
</div>

<!-- PAYMENT DETAILS -->
<div id="paymentDetailsModal" class="custom-popup" style="display:none;">
  <div class="custom-box">
      <h3>Payment Details</h3>
      <input type="text" id="nameField" placeholder="Your Name">
      <input type="text" id="methodField" placeholder="">
      <input type="password" id="pinField" placeholder="PIN / CVV">
      <button class="pay-option" onclick="payNow()">Pay Now</button>
      <button class="cancel-btn" onclick="closePaymentDetails()">Cancel</button>
  </div>
</div>

<!-- SUCCESS MODAL -->
<div id="successModal" class="custom-popup" style="display:none;">
  <div class="custom-box">
      <h3>🎉 Payment Successful</h3>
      <p>Booking Confirmed!</p>
      <button class="pay-option" onclick="closeSuccess()">OK</button>
  </div>
</div>
<script>
document.querySelectorAll(".bookBtn").forEach(btn=>{
    btn.addEventListener("click", function(){
        if(isLoggedIn){
            document.getElementById("paymentMethodModal").style.display="flex";
        }else{
            document.getElementById("loginModal").style.display="flex";
        }
    });
});

function loginSuccess(){
    isLoggedIn = true;
    document.getElementById("loginModal").style.display="none";
    document.getElementById("paymentMethodModal").style.display="flex";
}

function openSignup(){
    document.getElementById("loginModal").style.display="none";
    document.getElementById("signupModal").style.display="flex";
}

function closeSignup(){
    document.getElementById("signupModal").style.display="none";
}

function signupSuccess(){
    isLoggedIn = true;
    document.getElementById("signupModal").style.display="none";
    document.getElementById("paymentMethodModal").style.display="flex";
}

function closeLogin(){
    document.getElementById("loginModal").style.display="none";
}

function selectMethod(type){
    document.getElementById("paymentMethodModal").style.display="none";
    document.getElementById("paymentDetailsModal").style.display="flex";

    if(type=="upi"){
        document.getElementById("methodField").placeholder="UPI ID";
    }
    if(type=="card"){
        document.getElementById("methodField").placeholder="Card Number";
    }
    if(type=="net"){
        document.getElementById("methodField").placeholder="Account Number";
    }
}

function closePaymentMethod(){
    document.getElementById("paymentMethodModal").style.display="none";
}

function payNow(){
    document.getElementById("paymentDetailsModal").style.display="none";
    document.getElementById("successModal").style.display="flex";
}

function closePaymentDetails(){
    document.getElementById("paymentDetailsModal").style.display="none";
}

function closeSuccess(){
    document.getElementById("successModal").style.display="none";
}
</script>
</body>
</html>