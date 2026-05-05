<?php
session_start();
if (!isset($_SESSION['wishlist'])) {
    $_SESSION['wishlist'] = [];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Travel Planner | Explore Countries</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family: Arial, sans-serif;
}

body{
    min-height:100vh;
    background:url("images/bg.jpg") no-repeat center center/cover;
}

/* dark overlay */
.overlay{
    min-height:100vh;
    background:rgba(0,0,0,0.55);
    padding:40px;
}

h1{
    text-align:center;
    color:#fff;
    margin-bottom:40px;
}

/* grid */
.country-grid{
    display:grid;
    grid-template-columns: repeat(auto-fit, minmax(220px,1fr));
    gap:25px;
}

/* card */
.country-card{
    background:#fff;
    border-radius:14px;
    overflow:hidden;
    text-decoration:none;
    color:#000;
    box-shadow:0 10px 25px rgba(0,0,0,0.35);
    transition:transform 0.3s;
}

.country-card:hover{
    transform:translateY(-6px);
}

.country-card img{
    width:100%;
    height:160px;
    object-fit:cover;
}

.country-card h3{
    padding:15px;
    text-align:center;
    font-size:18px;
}

/* MAIN HEADER */
.main-header{
    height:75px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:0 40px;
    background:rgba(255,255,255,0.15);
    backdrop-filter:blur(12px);
    box-shadow:0 6px 20px rgba(0,0,0,0.3);
}

.logo{
    font-size:26px;
    font-weight:800;
    color:#ff6a00;
}

.header-right{
    display:flex;
    align-items:center;
    gap:20px;
}

.icon{
    font-size:20px;
    cursor:pointer;
}

.login-link{
    text-decoration:none;
    font-weight:600;
    color:black;
}

.signup-btn{
    background:#ff6a00;
    padding:8px 18px;
    border-radius:8px;
    color:white;
    text-decoration:none;
    font-weight:600;
}

.logout-btn{
    background:#ff6a00;
    padding:8px 18px;
    border-radius:8px;
    color:white;
    text-decoration:none;
}

.welcome-text{
    font-weight:600;
}

/* POPUP OVERLAY */
.popup{
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,0.6);
    display:none;
    justify-content:center;
    align-items:center;
    z-index:9999;
}

/* POPUP BOX */
.popup-content{
    background:white;
    color:black;
    padding:30px;
    width:350px;
    border-radius:15px;
    text-align:center;
    box-shadow:0 15px 40px rgba(0,0,0,0.4);
}

/* INPUTS */
.popup-content input{
    width:100%;
    padding:10px;
    margin:8px 0;
    border-radius:8px;
    border:1px solid #ccc;
}

/* BUTTON */
.popup-content button{
    width:100%;
    padding:10px;
    border:none;
    border-radius:8px;
    background:#ff6a00;
    color:white;
    font-weight:600;
    cursor:pointer;
}
</style>
</head>

<body>

<!-- HEADER -->
<div class="main-header">
    <div class="logo">✈ Easy Go</div>

    <div class="header-right">
        <i class="fas fa-heart icon"></i>
        <i class="fas fa-bell icon"></i>

        <?php if(isset($_SESSION['user'])): ?>
            <span class="welcome-text">
                Welcome, <?= $_SESSION['user']['email']; ?>
            </span>
            <a href="logout.php" class="logout-btn">Logout</a>
        <?php else: ?>
            <a href="#" onclick="openAuth('login')" class="login-link">Login</a>
            <a href="#" onclick="openAuth('signup')" class="signup-btn">Sign Up</a>
        <?php endif; ?>
    </div>
</div>

<div class="overlay">

<h1
style="font-size:32px;
        font-weight:800;
        color :#ffffff;
        ">Find Your Next Destination🧭</h1>


<div class="country-grid">

<!-- ALL YOUR COUNTRY CARDS EXACTLY SAME -->
<!-- (I DID NOT REMOVE ANYTHING HERE) -->

<a href="result.php?country=india" class="country-card">
    <img src="images/india/taj_mahal.jpg">
    <h3>India</h3>
</a>

<a href="result.php?country=thailand" class="country-card">
    <img src="images/thailand/bangkok.jpg">
    <h3>Thailand</h3>
</a>

<a href="result.php?country=malaysia" class="country-card">
    <img src="images/malaysia/tioman_island.jpg">
    <h3>Malaysia</h3>
</a>

<a href="result.php?country=japan" class="country-card">
    <img src="images/japan/mount_fuji.jpg">
    <h3>Japan</h3>
</a>

<a href="result.php?country=france" class="country-card">
    <img src="images/france/eiffel_tower.jpg">
    <h3>France</h3>
</a>

<a href="result.php?country=italy" class="country-card">
    <img src="images/italy/rome_colosseum.jpg">
    <h3>Italy</h3>
</a>

<a href="result.php?country=spain" class="country-card">
    <img src="images/spain/cordoba_mosque.jpg">
    <h3>Spain</h3>
</a>

<a href="result.php?country=united_states" class="country-card">
    <img src="images/united_states/statue_of_liberty.jpg">
    <h3>United States</h3>
</a>

<a href="result.php?country=united_kingdom" class="country-card">
    <img src="images/united_kingdom/london_big_ben.jpg">
    <h3>United Kingdom</h3>
</a>

<a href="result.php?country=germany" class="country-card">
    <img src="images/germany/berlin_brandenburg_gate.jpg">
    <h3>Germany</h3>
</a>

<a href="result.php?country=switzerland" class="country-card">
    <img src="images/switzerland/zermatt_matterhorn.jpg">
    <h3>Switzerland</h3>
</a>

<a href="result.php?country=new_zealand" class="country-card">
    <img src="images/new_zealand/milford_sound.jpg">
    <h3>New Zealand</h3>
</a>

<a href="result.php?country=singapore" class="country-card">
    <img src="images/singapore/marina_bay_sands.jpg">
    <h3>Singapore</h3>
</a>

<a href="result.php?country=indonesia" class="country-card">
    <img src="images/indonesia/bali_beach.jpg">
    <h3>Indonesia</h3>
</a>

<a href="result.php?country=south_korea" class="country-card">
    <img src="images/south_korea/bukchon_hanok_village.jpg">
    <h3>South Korea</h3>
</a>

<a href="result.php?country=australia" class="country-card">
    <img src="images/australia/sydney_opera_house.jpg">
    <h3>Australia</h3>
</a>

<a href="result.php?country=canada" class="country-card">
    <img src="images/canada/niagara_falls.jpg">
    <h3>Canada</h3>
</a>

<a href="result.php?country=maldives" class="country-card">
    <img src="images/maldives/thulusdhoo_island.jpg">
    <h3>Maldives</h3>
</a>

<a href="result.php?country=dubai" class="country-card">
    <img src="images/dubai/burj_khalifa.jpg">
    <h3>Dubai</h3>
</a>

<a href="result.php?country=egypt" class="country-card">
    <img src="images/egypt/pyramids_of_giza.jpg">
    <h3>Egypt</h3>
</a>

</div>
</div>

<!-- FIXED POPUP (ONLY THIS WAS WRONG BEFORE) -->
<div class="popup" id="authPopup">
    <div class="popup-content">

        <h3 id="authTitle">Login</h3>

        <form method="post" action="auth.php">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="text" name="fullname" id="fullNameField" placeholder="Full Name" style="display:none;">
            <input type="hidden" name="type" id="authType" value="login">
            <button type="submit">Submit</button>
        </form>

        <button style="margin-top:10px;background:#888;" onclick="closeAuth()">Cancel</button>

    </div>
</div>

<script>
function openAuth(type){
    document.getElementById('authPopup').style.display='flex';

    let title = document.getElementById("authTitle");
    let typeInput = document.getElementById("authType");
    let fullName = document.getElementById("fullNameField");

    if(type === "signup"){
        title.innerText = "Sign Up";
        typeInput.value = "signup";
        fullName.style.display = "block";
    }else{
        title.innerText = "Login";
        typeInput.value = "login";
        fullName.style.display = "none";
    }
}

function closeAuth(){
    document.getElementById('authPopup').style.display='none';
}
</script>

</body>
</html>
