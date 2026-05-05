<?php
include("db_connect.php");

if(isset($_GET['query'])){
    $search = $_GET['query'];

    $sql = "SELECT * FROM airports 
            WHERE city LIKE '%$search%' 
            OR airport_name LIKE '%$search%' 
            LIMIT 10";

    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result)){
        echo "<div class='suggest-item' 
              data-value='".$row['city']." (".$row['country'].") - ".$row['airport_code']."'>
              ".$row['city']." (".$row['country'].") - ".$row['airport_code']."
              </div>";
    }
}
?>