<?php
session_start();
include 'data.php';
if (isset($_POST['toggle_wishlist'])) {

    $place = $_POST['toggle_wishlist'];

    if (in_array($place, $_SESSION['wishlist'])) {
        $_SESSION['wishlist'] = array_values(
            array_diff($_SESSION['wishlist'], [$place])
        );
    }

    header("Location: wishlist.php");
    exit;
}

if (!isset($_SESSION['wishlist'])) {
    $_SESSION['wishlist'] = [];
}

$wishlist = $_SESSION['wishlist'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>My Wishlist | Easy Go</title>
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
    justify-content:center;
    padding:60px 20px;
    color:white;
}

/* MAIN CONTAINER */
.wishlist-container{
    width:100%;
    max-width:1100px;
}

/* TITLE */
.wishlist-title{
    text-align:center;
    font-size:32px;
    margin-bottom:40px;
    color:#ff6a00;
    font-weight:700;
}

/* GRID */
.wishlist-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(280px,1fr));
    gap:25px;
}

/* CARD */
.place-card{
    background:rgba(255,255,255,0.18);
    backdrop-filter:blur(18px);
    border:1px solid rgba(255,255,255,0.25);
    border-radius:20px;
    padding:20px;
    box-shadow:0 20px 45px rgba(0,0,0,0.35);
    transition:0.3s;
}

.place-card:hover{
    transform:translateY(-6px);
}

/* IMAGE */
.place-card img{
    width:100%;
    height:180px;
    object-fit:cover;
    border-radius:15px;
    margin-bottom:15px;
}

/* NAME */
.place-card h3{
    margin-bottom:10px;
    color:#ff8c42;
}

/* REMOVE BUTTON */
.remove-btn{
    margin-top:10px;
    padding:8px 16px;
    background:#e65c00;
    border:none;
    color:white;
    border-radius:10px;
    cursor:pointer;
    font-weight:600;
    transition:0.3s;
}

.remove-btn:hover{
    background:#cc5200;
}

/* EMPTY TEXT */
.empty-text{
    text-align:center;
    font-size:18px;
    color:#ffb27d;
}

/* BACK BUTTON */
.back-link{
    display:block;
    text-align:center;
    margin-top:40px;
    text-decoration:none;
    color:black;
    font-weight:600;
    font-size:18px;
}

.back-link:hover{
    color:white;
}
</style>
</head>

<body>

<div class="wishlist-container">

    <div class="wishlist-title">❤️ My Wishlist</div>

    <?php if(empty($wishlist)): ?>
        <div class="empty-text">No places added yet.</div>
    <?php else: ?>

        <div class="wishlist-grid">

        <?php foreach($data as $country => $places): ?>
            <?php foreach($places as $p): ?>
                <?php if(in_array($p['name'], $wishlist)): ?>
                    <div class="place-card">
                        <img src="<?= $p['image'] ?>" alt="">
                        <h3><?= $p['name'] ?></h3>

                        <form method="POST" action="wishlist.php">
                            <input type="hidden" name="toggle_wishlist" value="<?= $p['name'] ?>">
                            <input type="hidden" name="country" value="<?= $country ?>">
                            <button type="submit" class="remove-btn">
                                Remove
                            </button>
                        </form>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endforeach; ?>

        </div>

    <?php endif; ?>

    <a href="home.php" class="back-link">← Back to Dashboard</a>

</div>

</body>
</html>
