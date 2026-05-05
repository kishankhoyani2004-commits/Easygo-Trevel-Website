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
<title>Easy Go | Deals</title> 
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:"Segoe UI", Arial, sans-serif;
}

/* BODY */
body{
    background:url('images/bg.jpg') center/cover no-repeat fixed;
    color:#fff;
}

/* HEADER */
.header{
    height:75px;
    display:flex;
    align-items:center;
    padding:0 30px;
    background:rgba(255,255,255,0.15);
    backdrop-filter:blur(12px);
    box-shadow:0 6px 20px rgba(0,0,0,0.3);
}

.header h1{
    color:#ff6a00;
    font-weight:800;
    letter-spacing:1px;
}

/* HERO SECTION */
.deals-hero{
    height:28vh;
    display:flex;
    align-items:center;
    justify-content:center;
}

.deals-hero h2{
    font-size:40px;
    font-weight:900;
    color:#ff6a00;
    text-shadow:0 3px 10px rgba(0,0,0,0.4);
}

/* DEALS SECTION */
.deals-container{
    max-width:1400px;
    margin:80px auto;
    padding:0 20px;
}

/* 5 CARDS GRID */
.deals-grid{
    display:grid;
    grid-template-columns:repeat(5, 1fr);
    gap:25px;
}

/* CARD */
.deal-card{
    background:rgba(255,255,255,0.18);
    backdrop-filter:blur(18px);
    border:1px solid rgba(255,255,255,0.25);
    border-radius:22px;
    overflow:hidden;
    box-shadow:0 15px 40px rgba(0,0,0,0.35);
    transition:0.35s;
}

.deal-card:hover{
    transform:translateY(-10px) scale(1.02);
    background:rgba(255,255,255,0.25);
}

/* IMAGE */
.deal-card img{
    width:100%;
    height:160px;
    object-fit:cover;
}

/* CONTENT */
.deal-content{
    padding:18px;
}

.deal-content h3{
    margin-bottom:8px;
    font-size:18px;
    font-weight:700;
    color:#ff7b00;
}

.deal-content p{
    font-size:14px;
    margin-bottom:12px;
    color:#f1f1f1;
    font-weight:500;
}

.price{
    font-size:20px;
    font-weight:800;
    color:#ff5c00;
}

/* BUTTON */
.book-btn{
    display:block;
    margin-top:14px;
    padding:10px;
    text-align:center;
    background:#ff6a00;
    color:white;
    text-decoration:none;
    border-radius:10px;
    font-weight:700;
    font-size:14px;
}

.book-btn:hover{
    background:#e65c00;
}

/* FOOTER */
.footer{
    text-align:center;
    padding:25px;
    background:rgba(0,0,0,0.55);
    backdrop-filter:blur(10px);
    margin-top:60px;
    font-size:14px;
    font-weight:600;
}

/* RESPONSIVE */
@media(max-width:1200px){
    .deals-grid{
        grid-template-columns:repeat(3, 1fr);
    }
}

@media(max-width:768px){
    .deals-grid{
        grid-template-columns:1fr;
    }
}
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
.hotel-book-btn{
    padding:8px 20px;
    background:#ff5722;
    color:white;
    border:none;
    border-radius:20px;
    font-weight:600;
    font-size:14px;
    cursor:pointer;
    margin-top:10px;
}
.custom-box input{
    width:100%;
    padding:12px;
    margin:10px 0;
    border-radius:25px;
    border:1px solid #ddd;
    outline:none;
    font-size:14px;
}
.custom-box{
    animation:popupAnim 0.3s ease;
}

@keyframes popupAnim{
    from{
        transform:translateY(30px);
        opacity:0;
    }
    to{
        transform:translateY(0);
        opacity:1;
    }
}
.custom-box h3{
    color:#000;   /* black */
    font-weight:700;
}
.custom-box input{
    color:#000;
    background:#fff;
}
.custom-box input::placeholder{
    color:#555;
}
.custom-box p{
    color:#000;
}
.custom-box{
    background:rgba(255,255,255,0.95);
}
</style>
</head>

<body>

<!-- HEADER -->
<div class="header">
    <h1>✈ Easy Go</h1>
</div>

<!-- HERO -->
<section class="deals-hero">
    <h2>Exclusive Travel Deals</h2>
</section>

<!-- DEALS -->
<section class="deals-container">
    <div class="deals-grid">

        <div class="deal-card">
            <img src="images/deal1.jpg" alt="Goa Beach Trip">
            <div class="deal-content">
                <h3>Goa Beach Trip</h3>
                <p>3N / 4D · Flight + Hotel</p>
                <div class="price">₹14,999</div>
                <button class="hotel-book-btn bookBtn">Book Now</button>
            </div>
        </div>

        <div class="deal-card">
            <img src="images/dubai/jumeirah_beach.jpg" alt="Dubai Tour">
            <div class="deal-content">
                <h3>Dubai Tour</h3>
                <p>5N · Flight + Hotel</p>
                <div class="price">₹99,999</div>
                <button class="hotel-book-btn bookBtn">Book Now</button>
            </div>
        </div>

        <div class="deal-card">
            <img src="images/deal3.jpg" alt="Manali Escape">
            <div class="deal-content">
                <h3>Manali Escape</h3>
                <p>4N · Hotel + Travel</p>
                <div class="price">₹18,499</div>
                <button class="hotel-book-btn bookBtn">Book Now</button>
            </div>
        </div>

        <div class="deal-card">
            <img src="images/india/kerala.jpg" alt="Kerala Backwaters">
            <div class="deal-content">
                <h3>Kerala Backwaters</h3>
                <p>5N · Houseboat</p>
                <div class="price">₹22,999</div>
                <button class="hotel-book-btn bookBtn">Book Now</button>
            </div>
        </div>

        <div class="deal-card">
            <img src="images/singapore/orchard_road.jpg" alt="Singapore Special">
            <div class="deal-content">
                <h3>Singapore Special</h3>
                <p>4N · Flight + Hotel</p>
                <div class="price">₹49,999</div>
                <button class="hotel-book-btn bookBtn">Book Now</button>
            </div>
        </div>

    </div>
</section>

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
var isLoggedIn = <?php echo isset($_SESSION['user']) ? 'true' : 'false'; ?>;
</script>
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
