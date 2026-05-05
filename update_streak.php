```php
<?php
session_start();
include("db_connect.php");

$user = $_SESSION['user'];
$today = date("Y-m-d");

$result = mysqli_query($conn,"SELECT * FROM user_streak WHERE user_email='$user'");
$data = mysqli_fetch_assoc($result);

if(!$data){

    // First time user plays
    mysqli_query($conn,"INSERT INTO user_streak (user_email,last_play_date,streak_days,points)
    VALUES ('$user','$today',1,0)");

}else{

    $last = $data['last_play_date'];
    $streak = $data['streak_days'];
    $points = $data['points'];

    $yesterday = date("Y-m-d",strtotime("-1 day"));

    if($last == $today){
        $streak = $streak;
    }
    elseif($last == $yesterday){
        $streak++;
    }
    else{
        $streak = 1;
    }

    // Reward Points Logic
    if($streak == 10){
        $points += 50;
    }
    elseif($streak == 20){
        $points += 100;
    }
    elseif($streak == 30){
        $points += 200;
    }

    mysqli_query($conn,"UPDATE user_streak 
    SET last_play_date='$today',
        streak_days='$streak',
        points='$points'
    WHERE user_email='$user'");
}
?>
```
