<?php
$from = $_POST['from_country'] ?? '';
$to = $_POST['to_country'] ?? '';
$tripType = $_POST['trip_type'] ?? 'oneway';
$departDate = $_POST['depart_date'] ?? '';
$returnDate = $_POST['return_date'] ?? '';
$travellers = $_POST['travellers'] ?? '1 Adult';
$cabinClass = $_POST['cabin_class'] ?? 'Economy';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Flight Result | Easy Go</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:"Segoe UI", Arial, sans-serif;
}

body{
    min-height:100vh;
    background:url('images/bg.jpg') center/cover no-repeat fixed;
    display:flex;
    align-items:center;
    justify-content:center;
    color:#fff;
}

/* HERO */
.hero{
    width:100%;
    min-height:100vh;
    display:flex;
    align-items:center;
    justify-content:center;
}

/* GLASS CARD */
.flight-result-card{
    width:420px;
    background:rgba(255,255,255,0.18);
    backdrop-filter:blur(18px);
    border:1px solid rgba(255,255,255,0.25);
    border-radius:22px;
    padding:30px;
    box-shadow:0 20px 45px rgba(0,0,0,0.35);
}

/* TITLES */
.flight-result-card h2{
    text-align:center;
    margin-bottom:20px;
    color:#e65c00;
}

.flight-result-card h3{
    margin:20px 0 10px;
    color:#e67300;
}

/* INFO */
.flight-info p{
    margin-bottom:8px;
    font-size:15px;
}


.flight-info strong{
    color: grey;   /* label color (From:, To:) */
    font-weight:500;
}

.flight-info span{
    color:#ff7a1a;   /* value color (Bhutan, Albania, etc) */
    font-weight:700;
}

/* VALUE COLOR (THIS IS THE FIX) */
.flight-info p{
    color:#ff8c42;
    font-weight:600;
}

/* LIST */
.flight-list{
    list-style:none;
    margin-top:10px;
}

.flight-list li{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:12px;
    padding:10px;
    background:rgba(0,0,0,0.35);
    border-radius:12px;
}

/* BUTTON */
.flight-list button{
    padding:6px 14px;
    background:#e65c00;
    border:none;
    color:white;
    border-radius:8px;
    cursor:pointer;
    font-weight:600;
}

.flight-list button:hover{
    background:#cc5200;
}

/* BACK LINK */
.back-link{
    display:block;
    margin-top:20px;
    text-align:center;
    text-decoration:none;
    color: orangered;
    font-weight:600;
}

.back-link:hover{
    color:#fff;
}

/* Passenger Popup Overlay */
.popup-overlay{
    position:fixed;
    inset:0;
    background:rgba(0,0,0,0.55);
    backdrop-filter:blur(6px);

    display:none;
    justify-content:center;
    align-items:center;

    overflow-y:auto;       /* 🔥 IMPORTANT */
    padding:20px;          /* spacing for small screens */
}

/* Popup Card */
.popup-box{
    width:520px;
    max-width:90%;

    max-height:90vh;      /* 🔥 LIMIT HEIGHT */
    overflow-y:auto;      /* 🔥 SCROLL ENABLE */

    padding:30px;
    border-radius:22px;

    background:rgba(255,255,255,0.20);
    backdrop-filter:blur(18px);
    border:1px solid rgba(255,255,255,0.4);

    box-shadow:0 15px 45px rgba(0,0,0,0.4);

    display:flex;
    flex-direction:column;
    gap:14px;
}

/* Title */
.popup-box h2{
text-align:center;
color:#ff5722;
margin-bottom:8px;
}

/* Inputs */
.popup-box input,
.popup-box select{
padding:12px;
border-radius:10px;
border:1px solid rgba(255,255,255,0.6);

background:rgba(255,255,255,0.85);
font-size:14px;

transition:0.25s;
}

.popup-box input:focus,
.popup-box select:focus{
outline:none;
border:1px solid #ff5722;
box-shadow:0 0 0 2px rgba(255,87,34,0.2);
}

/* Buttons */
.popup-buttons{
display:flex;
gap:12px;
margin-top:10px;
}

.popup-buttons button{
flex:1;
padding:12px;
border:none;
border-radius:25px;

background:linear-gradient(135deg,#ff5722,#ff8a50);
color:white;
font-weight:600;

cursor:pointer;
transition:0.25s;
}

.popup-buttons button:hover{
transform:scale(1.05);
box-shadow:0 6px 20px rgba(255,87,34,0.4);
}

/* Cancel Button */
.popup-buttons button:last-child{
background:#888;
}

/* Animations */
@keyframes popupSlide{
from{
transform:translateY(30px);
opacity:0;
}
to{
transform:translateY(0);
opacity:1;
}
}

@keyframes fadeIn{
from{opacity:0;}
to{opacity:1;}
}
.popup-box form{
display:flex;
flex-direction:column;
gap:12px;
}

.popup-box input,
.popup-box select{
width:100%;
}
.passenger-form{
display:flex;
flex-direction:column;
gap:14px;
}

.form-group{
display:flex;
flex-direction:column;
gap:6px;
}

.form-group label{
font-size:13px;
font-weight:600;
color:#ff784e;
}

.form-group input,
.form-group select{
padding:12px;
border-radius:10px;
border:1px solid rgba(255,255,255,0.6);
background:rgba(255,255,255,0.9);
font-size:14px;
transition:0.25s;
}

.form-group input:focus,
.form-group select:focus{
outline:none;
border:1px solid #ff5722;
box-shadow:0 0 0 2px rgba(255,87,34,0.2);
}

.popup-buttons{
display:flex;
gap:12px;
margin-top:10px;
}

.confirm-btn{
flex:1;
padding:12px;
border:none;
border-radius:25px;
background:linear-gradient(135deg,#ff5722,#ff8a50);
color:white;
font-weight:600;
cursor:pointer;
transition:0.3s;
}

.confirm-btn:hover{
transform:scale(1.05);
box-shadow:0 6px 20px rgba(255,87,34,0.4);
}

.cancel-btn{
flex:1;
padding:12px;
border:none;
border-radius:25px;
background:#888;
color:white;
cursor:pointer;
}
.flight-summary{
background:rgba(255,255,255,0.15);
border-radius:12px;
padding:12px 15px;
margin-bottom:15px;
font-size:14px;
line-height:1.6;
border:1px solid rgba(255,255,255,0.25);
}

.flight-summary strong{
color:#ff784e;
}
</style>
</head>

<body>

<div class="hero">

    <div class="flight-result-card">

        <h2>Flight Search Result ✈️</h2>

        <div class="flight-info">
            <p><strong>From:</strong> <?php echo $from; ?></p>
            <p><strong>To:</strong> <?php echo $to; ?></p>
            <p><strong>Trip Type:</strong> <?php echo ucfirst($tripType); ?></p>

<p><strong>Depart Date:</strong> 
<?php echo $departDate ? $departDate : '-'; ?>
</p>

<p><strong>Return Date:</strong> 
<?php echo ($tripType === 'return' && $returnDate) ? $returnDate : '-'; ?>
</p>

<?php
$travellers = $_POST['travellers'] ?? '1 Adult';
$cabinClass = $_POST['cabin_class'] ?? 'Economy';
?>

<p><strong>Travellers:</strong> <?php echo $travellers; ?></p>
<p><strong>Class:</strong> <?php echo $cabinClass; ?></p>
        </div>

        <hr style="margin:15px 0; border-color:rgba(255,255,255,0.2);">

        <h3>Available Flights</h3>
<ul class="flight-list">

<li>
    Indigo – ₹5,000
    <form method="POST" action="booking.php" style="display:inline;">
        <input type="hidden" name="airline" value="Indigo">
        <input type="hidden" name="price" value="5000">
        <input type="hidden" name="from" value="<?php echo $from; ?>">
        <input type="hidden" name="to" value="<?php echo $to; ?>">

        <input type="hidden" name="depart_date" value="<?php echo $departDate; ?>">
        <input type="hidden" name="return_date" value="<?php echo $returnDate; ?>">
        <input type="hidden" name="trip_type" value="<?php echo $tripType; ?>">
        <input type="hidden" name="travellers" value="<?php echo $travellers; ?>">
        <input type="hidden" name="cabin_class" value="<?php echo $cabinClass; ?>">

        <button type="button" onclick="openPassengerPopup(this)">Book</button>
    </form>
</li>

<li>
    Air India – ₹6,200
    <form method="POST" action="booking.php" style="display:inline;">
        <input type="hidden" name="airline" value="Air India">
        <input type="hidden" name="price" value="6200">
        <input type="hidden" name="from" value="<?php echo $from; ?>">
        <input type="hidden" name="to" value="<?php echo $to; ?>">

        <input type="hidden" name="depart_date" value="<?php echo $departDate; ?>">
        <input type="hidden" name="return_date" value="<?php echo $returnDate; ?>">
        <input type="hidden" name="trip_type" value="<?php echo $tripType; ?>">
        <input type="hidden" name="travellers" value="<?php echo $_POST['travellers'] ?? '1 Adult'; ?>">
        <input type="hidden" name="cabin_class" value="<?php echo $_POST['cabin_class'] ?? 'Economy'; ?>">

        <button type="button" onclick="openPassengerPopup(this)">Book</button>
    </form>
</li>

<li>
    Vistara – ₹7,100
    <form method="POST" action="booking.php" style="display:inline;">
        <input type="hidden" name="airline" value="Vistara">
        <input type="hidden" name="price" value="7100">
        <input type="hidden" name="from" value="<?php echo $from; ?>">
        <input type="hidden" name="to" value="<?php echo $to; ?>">

        <input type="hidden" name="depart_date" value="<?php echo $departDate; ?>">
        <input type="hidden" name="return_date" value="<?php echo $returnDate; ?>">
        <input type="hidden" name="trip_type" value="<?php echo $tripType; ?>">
        <input type="hidden" name="travellers" value="<?php echo $_POST['travellers'] ?? '1 Adult'; ?>">
        <input type="hidden" name="cabin_class" value="<?php echo $_POST['cabin_class'] ?? 'Economy'; ?>">

        <button type="button" onclick="openPassengerPopup(this)">Book</button>
    </form>
</li>

</ul>

        <a href="home.php" class="back-link">← Back to Dashboard</a>

    </div>

</div>
<div id="passengerPopup" class="popup-overlay">
<div class="popup-box">

<h2>Passenger Details ✈</h2>
<div id="flightSummary" class="flight-summary">
    <p><strong>Airline:</strong> <span id="summaryAirline"></span></p>
    <p><strong>Route:</strong> <span id="summaryRoute"></span></p>
    <p><strong>Date:</strong> <span id="summaryDate"></span></p>
    <p><strong>Price:</strong> ₹<span id="summaryPrice"></span></p>
</div>
<form id="passengerForm" method="POST" action="booking.php" class="passenger-form">

<div class="form-group">
<label>👤 Full Name</label>
<input type="text" name="passenger_name" placeholder="Enter passenger full name" required>
</div>

<div class="form-group">
<label>🎂 Date of Birth (Required for travel)</label>
<input type="date" name="dob" required>
</div>

<div class="form-group">
<label>⚧ Gender</label>
<select name="gender" required>
<option value="">Select Gender</option>
<option>Male</option>
<option>Female</option>
<option>Other</option>
</select>
</div>

<div class="form-group">
<label>📧 Email Address</label>
<input type="email" name="email" placeholder="example@email.com" required>
</div>

<div class="form-group">
<label>📱 Phone Number</label>
<input type="tel" name="phone" placeholder="+91 9876543210" required>
</div>

<div class="form-group">
<label>🪟 Seat Preference</label>
<select name="seat_pref">
<option value="">Choose Seat</option>
<option>Window</option>
<option>Aisle</option>
<option>Middle</option>
</select>
</div>

<div class="form-group">
<label>🍽 Meal Preference</label>
<select name="meal_pref">
<option value="">Choose Meal</option>
<option>Veg</option>
<option>Non-Veg</option>
<option>Vegan</option>
</select>
</div>

<div class="popup-buttons">
<button type="submit" class="confirm-btn">Confirm Booking</button>
<button type="button" onclick="closePassengerPopup()" class="cancel-btn">Cancel</button>
</div>

</form>

</div>
</div>

<script>

let selectedForm = null;

function openPassengerPopup(button){

selectedForm = button.closest("form");

const airline = selectedForm.querySelector("input[name='airline']").value;
const price = selectedForm.querySelector("input[name='price']").value;
const from = selectedForm.querySelector("input[name='from']").value;
const to = selectedForm.querySelector("input[name='to']").value;
const date = selectedForm.querySelector("input[name='depart_date']").value;

document.getElementById("summaryAirline").innerText = airline;
document.getElementById("summaryRoute").innerText = from + " → " + to;
document.getElementById("summaryDate").innerText = date;
document.getElementById("summaryPrice").innerText = price;

document.getElementById("passengerPopup").style.display = "flex";

}

function closePassengerPopup(){

document.getElementById("passengerPopup").style.display = "none";

}

document.getElementById("passengerForm").addEventListener("submit", function(e){

e.preventDefault();

const popupForm = this;

for(let element of selectedForm.elements){
if(element.type === "hidden"){
let input = document.createElement("input");
input.type = "hidden";
input.name = element.name;
input.value = element.value;
popupForm.appendChild(input);
}
}

popupForm.submit();

});

</script>
</body>
</html>
