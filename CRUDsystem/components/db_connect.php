<?php 

$hostname = "173.212.235.205";
$username = "sayurico_sayuri";
$password = "usaperuha121";
$dbname = "sayurico_Restaurant_reservation_system";

// create connection
$connect = mysqli_connect($hostname, $username, $password, $dbname);

// check connection
if(mysqli_connect_error()) {
   die("Connection failed");
// }else {
//     echo "Successfully Connected";
}