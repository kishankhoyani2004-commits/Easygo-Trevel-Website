<?php
session_start();
$_SESSION['user'] = [
    'id' => 0,
    'email' => 'guest@example.com'
];
echo "success";
?>
