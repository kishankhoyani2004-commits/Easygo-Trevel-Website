<?php
$conn = mysqli_connect("localhost","root","","travel_project_backup");

if(!$conn){
    die("Connection Failed");
}

$q = $_GET['q'];

$sql = "SELECT country_name FROM countries 
        WHERE country_name LIKE '%$q%' 
        LIMIT 20";

$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_assoc($result)){
    echo "<div onclick=\"selectCountry('".$row['country_name']."')\">".$row['country_name']."</div>";
}
?>