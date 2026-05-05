<?php
session_start();
include 'data.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>All Hotels | Premium</title>

<style>
    /* ===== FLOATING PARTICLES ===== */
.particles{
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    pointer-events:none;
    overflow:hidden;
    z-index:-1;
}

.particles span{
    position:absolute;
    display:block;
    width:6px;
    height:6px;
    background:rgba(255,255,255,0.6);
    border-radius:50%;
    animation:float 15s linear infinite;
}

@keyframes float{
    0%{
        transform:translateY(100vh) scale(0);
        opacity:0;
    }
    50%{
        opacity:1;
    }
    100%{
        transform:translateY(-10vh) scale(1);
        opacity:0;
    }
}
body{
    margin:0;
    font-family:Arial, Helvetica, sans-serif;
    background:linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.7)),
    url("images/bg.jpg") center/cover fixed;
    color:white;
}

/* HEADER */
.header{
    text-align:center;
    padding:60px 20px;
}
.header h1{
    font-size:40px;
}

/* CONTAINER */
.container{
    width:95%;
    max-width:1200px;
    margin:auto;
    padding-bottom:80px;
}

/* COUNTRY BLOCK */
.country-block{
    margin-bottom:20px;
    border-radius:20px;
    background:rgba(255,255,255,0.08);
    backdrop-filter:blur(20px);
    overflow:hidden;
}

.country-header{
    padding:20px;
    font-size:20px;
    font-weight:bold;
    cursor:pointer;
    display:flex;
    justify-content:space-between;
}

.country-content{
    max-height:0;
    overflow:hidden;
    opacity:0;
    transform:translateY(-10px);
    transition:max-height 0.6s ease, opacity 0.4s ease, transform 0.4s ease;
}

.country-content.active{
    opacity:1;
    transform:translateY(0);
    padding:0 20px;
}

/* HOTEL GRID */
.hotel-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(260px,1fr));
    gap:20px;
    margin-bottom:25px;
}

/* FIXED HOTEL CARD (ONLY CHANGE DONE HERE) */
.hotel-card{
    position: relative;
    background: rgba(255,255,255,0.1);
    padding: 15px 15px 20px;
    border-radius: 15px;
    transform-style: preserve-3d;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    text-align: center;
    backdrop-filter: blur(10px);
}

.badge{
    position:absolute;
    top:10px;
    right:10px;
    padding:5px 12px;
    border-radius:20px;
    font-size:12px;
    color:white;
    font-weight:bold;
    z-index:5;
}

.low{background:#4caf50;}
.medium{background:#ff9800;}
.high{background:#f44336;}

.hotel-card h3{
    margin-top:40px;
    font-size:18px;
}

.hotel-card p{
    margin:5px 0;
    font-size:15px;
}

.book-btn{
    width:100%;
    padding:10px;
    border:none;
    border-radius:30px;
    background:#ff5722;
    color:white;
    font-weight:bold;
    cursor:pointer;
    margin-top:10px;
}

/* POPUP */
.popup{
    position:fixed;
    top:0; left:0;
    width:100%; height:100%;
    background:rgba(0,0,0,0.7);
    display:none;
    justify-content:center;
    align-items:center;
    z-index:1000;
}
.popup-content{
    background:white;
    color:black;
    padding:30px;
    border-radius:15px;
    width:350px;
    text-align:center;
    animation:fadeIn 0.4s;
}
.popup-content input, select{
    width:100%;
    padding:10px;
    margin:8px 0;
}
.popup-content button{
    width:100%;
    padding:10px;
    border:none;
    background:#ff5722;
    color:white;
    border-radius:25px;
    cursor:pointer;
}

@keyframes fadeIn{
    from{transform:scale(0.8);opacity:0;}
    to{transform:scale(1);opacity:1;}
}
/* BACKGROUND OVERLAY */
.popup{
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,0.55);
    backdrop-filter:blur(6px);
    display:none;
    align-items:center;
    justify-content:center;
    z-index:9999;
}

/* POPUP BOX */
.glass-popup{
    width:420px;
    padding:35px 40px;
    border-radius:22px;

    background:rgba(255,255,255,0.85);
    backdrop-filter:blur(20px);

    box-shadow:0 20px 50px rgba(0,0,0,0.25);
    text-align:center;
}

/* TITLE */
.glass-popup h2{
    margin-bottom:25px;
    font-size:22px;
    font-weight:600;
    color:#000;
}

/* INPUT FIELDS */
.glass-popup input{
    width:100%;
    padding:12px 14px;
    margin-bottom:15px;
    border-radius:12px;
    border:1px solid #ccc;
    background:#e9eef5;
    font-size:14px;
}

/* LOGIN BUTTON */
.main-login-btn{
    width:100%;
    padding:14px;
    background:#ff5722;
    border:none;
    color:white;
    border-radius:30px;
    font-size:15px;
    font-weight:600;
    cursor:pointer;
    transition:0.3s;
}

.main-login-btn:hover{
    background:#e64a19;
}

/* SIGNUP TEXT */
#switchText{
    margin-top:15px;
    font-size:14px;
    color:#333;
}

#switchText span{
    color:#ff5722;
    font-weight:600;
    text-decoration:underline;
    cursor:pointer;
}

/* CANCEL BUTTON */
.cancel-btn{
    width:100%;
    padding:14px;
    margin-top:18px;
    background:#8a8a8a;
    border:none;
    color:white;
    border-radius:30px;
    font-size:15px;
    cursor:pointer;
}

</style>
</head>

<body>

<div class="header">
    <h1>🏨Hotel Collection</h1>
</div>

<div class="container">

<?php foreach($data as $country => $places): ?>
<div class="country-block">
    <div class="country-header" onclick="toggleCountry(this)">
        🌍 <?= strtoupper($country) ?>
        <span>▼</span>
    </div>

    <div class="country-content">
    <?php foreach($places as $place): ?>
        <h3>📍 <?= $place['name'] ?></h3>
        <div class="hotel-grid">
        <?php foreach($place['hotels'] as $hotel): 
            $budgetClass = strtolower($hotel['budget']);
        ?>
            <div class="hotel-card">
                <div class="badge <?= $budgetClass ?>">
                    <?= ucfirst($budgetClass) ?>
                </div>
                <h3><?= $hotel['name'] ?></h3>
                <p>₹<?= number_format($hotel['price']) ?>/night</p>
                <p>⭐ <?= $hotel['rating'] ?></p>
                <button class="book-btn" onclick="bookNow()">
                    Book Now
                </button>
            </div>
        <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
    </div>
</div>
<?php endforeach; ?>

</div>

<!-- GLASS LOGIN / SIGNUP POPUP -->
<div class="popup" id="loginPopup">
    <div class="popup-content glass-popup">

        <h2 id="popupTitle">Login</h2>

        <input type="text" placeholder="Email">
        <input type="password" placeholder="Password">

        <!-- Signup extra field -->
        <input type="text" placeholder="Full Name" id="signupField" style="display:none;">

        <button class="main-login-btn" onclick="handleAuth()">Login</button>

        <p id="switchText">
            Don’t have account? 
            <span onclick="toggleAuth()">Sign Up</span>
        </p>

        <button class="cancel-btn" onclick="closeLogin()">Cancel</button>

    </div>
</div>

<!-- PAYMENT METHOD -->
<div class="popup" id="paymentPopup">
    <div class="popup-content">
        <h3>Select Payment</h3>
        <button onclick="selectPayment('upi')">UPI</button><br><br>
        <button onclick="selectPayment('card')">Card</button><br><br>
        <button onclick="selectPayment('net')">Net Banking</button>
    </div>
</div>

<!-- PAYMENT DETAILS -->
<div class="popup" id="detailsPopup">
    <div class="popup-content">
        <h3>Payment Details</h3>
        <div id="dynamicFields"></div>
        <button onclick="confirmPayment()">Pay Now</button>
    </div>
</div>

<!-- SUCCESS -->
<div class="popup" id="successPopup">
    <div class="popup-content">
        <h3>🎉 Payment Successful</h3>
        <button onclick="closeSuccess()">OK</button>
    </div>
</div>

<script>

function toggleCountry(header){
    const content = header.nextElementSibling;
    const arrow = header.querySelector(".arrow");

    if(content.classList.contains("active")){
        content.style.maxHeight = null;
        content.classList.remove("active");
    } else {
        content.style.maxHeight = content.scrollHeight + "px";
        content.classList.add("active");
    }
}

function bookNow(){
<?php if(isset($_SESSION['user'])): ?>
    document.getElementById('paymentPopup').style.display='flex';
<?php else: ?>
    document.getElementById('loginPopup').style.display='flex';
<?php endif; ?>
}

function selectPayment(type){
    document.getElementById('paymentPopup').style.display='none';
    document.getElementById('detailsPopup').style.display='flex';
    let fields="";
    if(type=="upi"){
        fields='<input placeholder="UPI ID">';
    }
    if(type=="card"){
        fields='<input placeholder="Card Number"><input placeholder="CVV">';
    }
    if(type=="net"){
        fields='<input placeholder="Bank Name"><input placeholder="User ID">';
    }
    document.getElementById('dynamicFields').innerHTML=fields;
}

function confirmPayment(){
    document.getElementById('detailsPopup').style.display='none';
    document.getElementById('successPopup').style.display='flex';
}

function closeSuccess(){
    document.getElementById('successPopup').style.display='none';

}

function closeLogin(){
    document.getElementById('loginPopup').style.display='none';
}
function handleAuth(){

    let title = document.getElementById("popupTitle").innerText;

    if(title === "Sign Up"){
        alert("Signup Successful! Please Login.");
        toggleAuth();
        return;
    }

    // Simulate login success
    fetch("set_session.php")
    .then(() => {
        document.getElementById('loginPopup').style.display='none';
        document.getElementById('paymentPopup').style.display='flex';
    });
}

function toggleAuth(){

    let title = document.getElementById("popupTitle");
    let button = document.querySelector(".main-login-btn");
    let switchText = document.getElementById("switchText");
    let signupField = document.getElementById("signupField");

    if(title.innerText === "Login"){
        title.innerText = "Sign Up";
        button.innerText = "Sign Up";
        signupField.style.display = "block";
        switchText.innerHTML =
        'Already have account? <span onclick="toggleAuth()">Login</span>';
    } 
    else {
        title.innerText = "Login";
        button.innerText = "Login";
        signupField.style.display = "none";
        switchText.innerHTML =
        'Don’t have account? <span onclick="toggleAuth()">Sign Up</span>';
    }
}

</script>

<div class="particles"></div>

<script>
const particlesContainer = document.querySelector(".particles");

for(let i=0;i<40;i++){
    let span = document.createElement("span");
    span.style.left = Math.random() * 100 + "vw";
    span.style.animationDuration = (10 + Math.random()*10) + "s";
    span.style.animationDelay = Math.random() * 5 + "s";
    particlesContainer.appendChild(span);
}
</script>

<script>
document.querySelectorAll(".hotel-card").forEach(card => {

    card.addEventListener("mousemove", e => {
        const rect = card.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;

        const centerX = rect.width / 2;
        const centerY = rect.height / 2;

        const rotateX = -(y - centerY) / 20;
        const rotateY = (x - centerX) / 20;

        card.style.transform = `rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale(1.05)`;
    });

    card.addEventListener("mouseleave", () => {
        card.style.transform = "rotateX(0) rotateY(0) scale(1)";
    });

});
</script>

</body>
</html>
