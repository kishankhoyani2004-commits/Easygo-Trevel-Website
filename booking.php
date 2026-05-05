<?php
session_start();

if(!isset($_SESSION['user'])){
    header("Location: home.php");
    exit();
}

$airline = $_POST['airline'] ?? '';
$price = $_POST['price'] ?? '';
$from = $_POST['from'] ?? '';
$to = $_POST['to'] ?? '';
$departDate = $_POST['depart_date'] ?? '';
$returnDate = $_POST['return_date'] ?? '';
$tripType = $_POST['trip_type'] ?? '';
$travellers = $_POST['travellers'] ?? '';
$cabinClass = $_POST['cabin_class'] ?? '';
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Confirm Booking | Easy Go</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
body{
    min-height:100vh;
    background:url('images/bg.jpg') center/cover no-repeat fixed;
    display:flex;
    align-items:center;
    justify-content:center;
    font-family:"Segoe UI", Arial, sans-serif;
    color:#fff;
}

.booking-card{
    width:420px;
    background:rgba(255,255,255,0.18);
    backdrop-filter:blur(18px);
    border:1px solid rgba(255,255,255,0.25);
    border-radius:22px;
    padding:30px;
    box-shadow:0 20px 45px rgba(0,0,0,0.35);
}

.booking-card h2{
    text-align:center;
    margin-bottom:20px;
    color:#e65c00;
}

.booking-card p{
    margin-bottom:12px;
    font-size:15px;
}

.booking-card strong{
    color:grey;   /* Label color */
    font-weight:500;
}

.booking-card span{
    color:#ff7a1a;   /* Value color */
    font-weight:700;
}

.booking-card button{
    width:100%;
    padding:10px;
    margin-top:15px;
    background:#e65c00;
    border:none;
    color:white;
    border-radius:12px;
    cursor:pointer;
    font-weight:600;
}

.booking-card button:hover{
    background:#cc5200;
}
</style>
</head>
<body>

<div class="booking-card">

    <h2>Confirm Your Flight ✈️</h2>

<p><strong>Trip Type:</strong> <?php echo ucfirst($tripType); ?></p>
<p><strong>Depart Date:</strong> <?php echo $departDate ?: '-'; ?></p>
<p><strong>Return Date:</strong>
<?php echo ($tripType === 'return' && $returnDate) ? $returnDate : '-'; ?>
</p>
<p><strong>Travellers:</strong> <?php echo $travellers; ?></p>
<p><strong>Class:</strong> <?php echo $cabinClass; ?></p>

    <form method="POST" action="payment_method.php">
        <input type="hidden" name="airline" value="<?php echo $airline; ?>">
        <input type="hidden" name="price" value="<?php echo $price; ?>">
        <button type="submit">Confirm & Pay</button>
    </form>

</div>

</body>
</html>