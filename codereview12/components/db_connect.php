<?php 

$hostname = "173.212.235.205";
$username = "sayurico_sayuriyoshikawa";
$password = "usaperuha121";
$dbname = "sayurico_mount_everest";

// create connection
$connect = mysqli_connect($hostname, $username, $password, $dbname);

// check connection
if(mysqli_connect_error()) {
   die("Connection failed");
// }else {
//     echo "Successfully Connected";
}