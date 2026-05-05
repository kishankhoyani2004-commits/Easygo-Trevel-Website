<?php
session_start();
include("db_connect.php");

if(isset($_POST['login_btn'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

    // Query
    $query = "SELECT * FROM register WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if(!$result){
        die("Query Failed: " . mysqli_error($conn));
    }

    if(mysqli_num_rows($result) > 0){
        
        // Fetch user data
        $user = mysqli_fetch_assoc($result);

        // Store full user info in session
        $_SESSION['user'] = [
            'id' => $user['id'],
            'email' => $user['email']
        ];

        // Redirect to home
        header("Location: home.php");
        exit();

    } else {
        echo "<script>alert('Invalid Email or Password');</script>";
    }
}
if(isset($_POST['signup_btn'])){

$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    // Check password match
    if($password !== $confirm_password){
        echo "<script>alert('Passwords do not match');</script>";
    } else {

        // Check if email already exists
        $check = mysqli_query($conn, "SELECT * FROM register WHERE email='$email'");

        if(mysqli_num_rows($check) > 0){
            echo "<script>alert('Email already exists');</script>";
        } else {

            // Insert user
            $insert = mysqli_query($conn, "INSERT INTO register (name, email, password) VALUES ('$name','$email','$password')");

            if($insert){
                echo "<script>alert('Signup successful! Please login');</script>";
            } else {
                echo "<script>alert('Signup failed');</script>";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Easy Go | Login/Register</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Segoe UI", Arial, sans-serif;
}

/* ===== BACKGROUND ===== */
body {
    position: relative;
    overflow-x: hidden;
    color: #000; /* Default text black */
}

body::before {
    content: "";
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: url('images/bg.jpg') center/cover no-repeat;
    filter: blur(20px);
    z-index: -1;
}

/* ===== LOGIN CONTAINER ===== */
.login-container {
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* LOGIN CARD */
.login-card {
    position: relative; /* IMPORTANT FOR CLOSE BUTTON */
    background: rgba(255, 255, 255, 0.18);
    backdrop-filter: blur(18px);
    border: 1px solid rgba(255, 255, 255, 0.25);
    border-radius: 20px;
    padding: 40px 30px;
    width: 350px;
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.35);
    text-align: center;
    transition: 0.3s;
}

.login-card:hover {
    transform: translateY(-5px) scale(1.02);
    background: rgba(255, 255, 255, 0.25);
}

/* CLOSE BUTTON */
.close-btn {
    position: absolute;
    top: 12px;
    right: 12px;
    background: rgba(0, 0, 0, 0.35);
    color: white;
    border: none;
    width: 32px;
    height: 32px;
    border-radius: 50%;
    cursor: pointer;
    font-size: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    backdrop-filter: blur(8px);
    transition: 0.25s ease;
}

.close-btn:hover {
    background: rgba(0, 0, 0, 0.55);
    transform: scale(1.12);
}

.login-card h2 {
    color: #e65c00;
    margin-bottom: 25px;
}

/* TAB BUTTONS */
.tab-buttons {
    display: flex;
    margin-bottom: 20px;
}

.tab-buttons button {
    flex: 1;
    padding: 10px;
    border: none;
    background: rgba(255, 255, 255, 0.15);
    color: #000;
    font-weight: 600;
    cursor: pointer;
    transition: 0.3s;
    border-radius: 10px 10px 0 0;
}

.tab-buttons button.active,
.tab-buttons button:hover {
    background: #e65c00;
    color: #fff;
}

/* FORMS */
form {
    display: none;
    flex-direction: column;
}

form.active {
    display: flex;
}

form input {
    width: 100%;
    padding: 12px 15px;
    margin: 10px 0;
    border-radius: 10px;
    border: 1px solid rgba(0,0,0,0.3);
    background: rgba(255, 255, 255, 0.9);
    color: #000;
    outline: none;
    font-size: 14px;
    backdrop-filter: blur(10px);
}

form input::placeholder {
    color: #555;
}

form button {
    width: 100%;
    padding: 12px;
    margin-top: 15px;
    border-radius: 10px;
    border: none;
    background: #e65c00;
    color: white;
    font-weight: 600;
    cursor: pointer;
    transition: 0.3s;
}

form button:hover {
    background: #cc5200;
}

/* FORGOT PASSWORD */
form .forgot {
    margin-top: 12px;
    font-size: 13px;
    color: #000;
    display: block;
    text-decoration: none;
}

form .forgot:hover {
    text-decoration: underline;
}

/* RESPONSIVE */
@media(max-width: 400px){
    .login-card {
        width: 90%;
        padding: 30px 20px;
    }
}
</style>
</head>

<body>

<div class="login-container">
    <div class="login-card">

        <!-- CLOSE BUTTON -->
        <button class="close-btn" onclick="goHome()">
            <i class="fa-solid fa-xmark"></i>
        </button>

        <h2>Welcome to Easy Go</h2>

        <div class="tab-buttons">
            <button class="tab-btn active" onclick="showForm('login')">Login</button>
            <button class="tab-btn" onclick="showForm('signup')">Sign Up</button>
        </div>

        <!-- LOGIN FORM -->
        <form id="login" class="active" method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>

            <button type="submit" name="login_btn">Login</button>
            <a href="#" class="forgot">Forgot Password?</a>
        </form>

        <!-- SIGNUP FORM -->
        <form id="signup" method="POST">
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="confirm_password" placeholder="Confirm Password" required>
        <button type="submit" name="signup_btn">Sign Up</button>
        </form>

    </div>
</div>

<script>
// TAB FUNCTIONALITY
function showForm(formId) {
    const loginForm = document.getElementById('login');
    const signupForm = document.getElementById('signup');
    const buttons = document.querySelectorAll('.tab-btn');

    if(formId === 'login'){
        loginForm.classList.add('active');
        signupForm.classList.remove('active');
    } else {
        signupForm.classList.add('active');
        loginForm.classList.remove('active');
    }

    buttons.forEach(btn => btn.classList.remove('active'));
    document.querySelector(`.tab-btn[onclick="showForm('${formId}')"]`).classList.add('active');
}

// CLOSE BUTTON RETURN TO HOME
function goHome() {
    window.location.href = "home.php";  // Change this to your homepage file if needed
}
// Auto open signup form if URL has ?tab=signup
window.onload = function() {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('tab') === 'signup') {
        showForm('signup');
    }
};

</script>

</body>
</html>
