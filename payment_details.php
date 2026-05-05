<?php
session_start();

$airline = $_POST['airline'] ?? '';
$price = $_POST['price'] ?? '';
$method = $_POST['method'] ?? '';
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Payment Details | Easy Go</title>

<style>
body{
    min-height:100vh;
    background:url('images/bg.jpg') center/cover no-repeat fixed;
    display:flex;
    align-items:center;
    justify-content:center;
    font-family:"Segoe UI", Arial, sans-serif;
}

.details-card{
    width:420px;
    background:rgba(255,255,255,0.18);
    backdrop-filter:blur(20px);
    border-radius:24px;
    padding:35px;
    text-align:center;
    box-shadow:0 25px 55px rgba(0,0,0,0.4);
    color:white;
}

.details-card h2{
    color:#ff7a1a;
    margin-bottom:20px;
}

.summary{
    margin-bottom:20px;
    padding:12px;
    background:rgba(0,0,0,0.35);
    border-radius:12px;
    font-weight:600;
    color:#ffd1a3;
}

input{
    width:100%;
    padding:10px;
    margin:10px 0;
    border-radius:8px;
    border:none;
}

.pay-btn{
    width:100%;
    padding:12px;
    margin-top:15px;
    border:none;
    border-radius:12px;
    background:#ff6a00;
    color:white;
    font-weight:600;
    cursor:pointer;
}

.pay-btn:hover{
    background:#e65c00;
}
</style>
</head>
<body>

<div class="details-card">

    <h2><?php echo $method; ?> Payment 💳</h2>

    <div class="summary">
        Airline: <?php echo $airline; ?><br>
        Price: ₹<?php echo $price; ?>
    </div>

    <form method="POST" action="save_booking.php">
        <input type="hidden" name="airline" value="<?php echo $airline; ?>">
        <input type="hidden" name="price" value="<?php echo $price; ?>">

        <input type="text" placeholder="Enter Name" required>
        <input type="text" placeholder="Account / UPI / Card Number" required>
        <input type="password" placeholder="PIN / CVV" required>

        <button type="submit" class="pay-btn">Pay & Confirm</button>
    </form>

</div>

</body>
</html>