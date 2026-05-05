<?php
session_start();

$airline = $_POST['airline'] ?? '';
$price = $_POST['price'] ?? '';
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Select Payment Method | Easy Go</title>

<style>
body{
    min-height:100vh;
    background:url('images/bg.jpg') center/cover no-repeat fixed;
    display:flex;
    align-items:center;
    justify-content:center;
    font-family:"Segoe UI", Arial, sans-serif;
}

.payment-card{
    width:420px;
    background:rgba(255,255,255,0.18);
    backdrop-filter:blur(20px);
    border-radius:24px;
    padding:35px;
    text-align:center;
    box-shadow:0 25px 55px rgba(0,0,0,0.4);
    color:white;
}

.payment-card h2{
    color:#ff7a1a;
    margin-bottom:20px;
}

.flight-summary{
    margin-bottom:20px;
    padding:12px;
    background:rgba(0,0,0,0.35);
    border-radius:12px;
    font-weight:600;
    color:#ffd1a3;
}

.method-btn{
    width:100%;
    padding:12px;
    margin:10px 0;
    border:none;
    border-radius:12px;
    background:#ff6a00;
    color:white;
    font-weight:600;
    cursor:pointer;
    transition:0.3s;
}

.method-btn:hover{
    background:#e65c00;
    transform:scale(1.03);
}
</style>
</head>
<body>

<div class="payment-card">

    <h2>Select Payment Method 💳</h2>

    <div class="flight-summary">
        Airline: <?php echo $airline; ?><br>
        Price: ₹<?php echo $price; ?>
    </div>

    <form method="POST" action="payment_details.php">
        <input type="hidden" name="airline" value="<?php echo $airline; ?>">
        <input type="hidden" name="price" value="<?php echo $price; ?>">
        <input type="hidden" name="method" value="UPI">
        <button class="method-btn" type="submit">Pay via UPI</button>
    </form>

    <form method="POST" action="payment_details.php">
        <input type="hidden" name="airline" value="<?php echo $airline; ?>">
        <input type="hidden" name="price" value="<?php echo $price; ?>">
        <input type="hidden" name="method" value="Card">
        <button class="method-btn" type="submit">Pay via Card</button>
    </form>

    <form method="POST" action="payment_details.php">
        <input type="hidden" name="airline" value="<?php echo $airline; ?>">
        <input type="hidden" name="price" value="<?php echo $price; ?>">
        <input type="hidden" name="method" value="Net Banking">
        <button class="method-btn" type="submit">Net Banking</button>
    </form>

</div>

</body>
</html>