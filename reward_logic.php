<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include("db_connect.php");

// Check if user logged in
if (!isset($_SESSION['user'])) {
    return;
}

$user = $_SESSION['user'];
$user_id = $user['id']; // ✅ FIXED

$today = date("Y-m-d");

// Check if user exists
$check = mysqli_query($conn, "SELECT * FROM user_rewards WHERE user_id='$user_id'");

if($check){
    $data = mysqli_fetch_assoc($check);

    if (!$data) {
        // First time user
        mysqli_query($conn, "INSERT INTO user_rewards (user_id, total_points, streak_days, last_active_date) 
        VALUES ('$user_id', 10, 1, '$today')");
    } else {

        $last_date = $data['last_active_date'];
        $streak = $data['streak_days'];
        $points = $data['total_points'];

        if ($last_date != $today) {

            $yesterday = date("Y-m-d", strtotime("-1 day"));

            if ($last_date == $yesterday) {
                $streak++;
            } else {
                $streak = 1;
            }

            $points += 10;

            mysqli_query($conn, "UPDATE user_rewards 
            SET total_points='$points', streak_days='$streak', last_active_date='$today'
            WHERE user_id='$user_id'");
        }
    }
}
?>