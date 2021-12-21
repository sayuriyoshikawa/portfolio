<?php
session_start();
require_once "components/db_connect.php";
// if session is not set this will redirect to login page
if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}
//if session user exist it shouldn't access dashboard.php
if (isset($_SESSION["user"])) {
    header("Location: home.php");
    exit;
}

$id = $_SESSION['adm'];
$status = 'adm';
// $sql = "SELECT * FROM user WHERE status != '$status'";
$sql = "SELECT * FROM user";

$result = mysqli_query($connect, $sql);

$sql2 = "SELECT *
FROM booking
JOIN products on products.id = booking.fk_productsId
JOIN user on user.id = booking.fk_userId";
$result2 = mysqli_query($connect, $sql2);
$tbody2 = "";

//this variable will hold the body for the table
$tbody = '';
if ($result->num_rows > 0) {
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $tbody .= "<tr>
           <td><img class='img-thumbnail rounded-circle' src='pictures/" . $row['picture'] . "' alt=" . $row['first_name'] . "></td>
           <td>" . $row['first_name'] . " " . $row['last_name'] . "</td>
           <td>" . $row['date_of_birth'] . "</td>
           <td>" . $row['email'] . "</td>
           <td><a href='update.php?id=" . $row['id'] . "'><button class='btn btn-primary btn-sm' type='button'>Edit</button></a>
           <a href='delete.php?id=" . $row['id'] . "'><button class='btn btn-danger btn-sm' type='button'>Delete</button></a></td>
        </tr>";
    }
} else {
    $tbody = "<tr><td colspan='5'><center>No Data Available </center></td></tr>";
}


if (mysqli_num_rows($result2) > 0) {

    while ($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
 
 
       $tbody2 .= "<tr>
       <td>" . $row2['bookingId'] . "</td>
       <td>" . $row2['first_name'] ." ". $row2['last_name'] . "</td>
       <td>" . $row2['name'] . "</td>
       <td>" . $row2['reservation_date'] ." ". $row2['time'] . "</td>
       <td>" . $row2['number_people'] . "</td>
       <td><a href='booking/update_booking.php?id=" . $row2['bookingId'] . "'><button class='btn btn-primary btn-sm' type='button'>Edit</button></a>
       <a href='booking/delete_booking.php?id=" . $row2['bookingId'] . "'><button class='btn btn-danger btn-sm' type='button'>Delete</button></a></td>
    </tr>"; 
    }
 } else {
    $tbody2 = "<tr><td colspan='5'><center>You don't have any reservation</center></td></tr>";
 }
 

mysqli_close($connect);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adm-DashBoard</title>
    <?php require_once 'components/boot.php' ?>
    <style type="text/css">
        .img-thumbnail {
            width: 70px !important;
            height: 70px !important;
        }

        td {
            text-align: center;
            vertical-align: middle;
        }

        tr {
            text-align: center;
        }

        .userImage {
            width: 100px;
            height: auto;
        }
        .navbar {
         background-color: rgb(187,45,59);
      }

      a {
         text-decoration: none;
      }

      .signout,
      .update {
         background-color: #FFE6E6;
      }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar">
      <div class="container-fluid">
         <a class="navbar-brand text-white fw-bold" href="index.php">Restaurant booking system</a>

         <div class="d-flex justify-content-end">
         <a href='products/index.php'><button class='btn update btn' type='button'>Edit menu</button></a>
         <a href="logout.php?logout"><button class='btn signout btn ms-3' type='button'>Sign Out</button></a>
       
         </div>
      </div>
   </nav>
    <div class="container mt-5">
        <div class="row">
            <div class="col-2">
                <img class="userImage" src="pictures/admavatar.png" alt="Adm avatar">
                <p class="">Administrator</p>
               
            </div>
            

            <div class="col-10 mt-2 mb-5">
                <p class='h2'>Users</p>
                <table class='table table-striped'>
                    <thead class='table-danger'>
                        <tr>
                            <th>Picture</th>
                            <th>Name</th>
                            <th>Date of birth</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?= $tbody ?>
                    </tbody>
                </table>
            

                <p class='h2 mt-5'>Reservation list</p>
                <table class='table table-striped'>
                    <thead class='table-danger'>
                        <tr>
                            <th>ReservationID</th>
                            <th>Name</th>
                            <th>Name of restaurant</th>
                            <th>Date</th>
                            <th>Number of people</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?= $tbody2 ?>
                    </tbody>
                </table>
        </div>
    </div>
</body>

</html>