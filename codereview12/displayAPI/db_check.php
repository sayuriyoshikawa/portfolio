<?php

// Require conn.php (DB connection) file
require_once "../components/db_connect.php";

if($_SERVER['REQUEST_METHOD'] == 'GET'){ 
$sql = "SELECT * FROM travel";
// Perform a query on the DB
$result = mysqli_query($connect, $sql);
}

// Close the DB connection
mysqli_close($connect);