<?php
session_start();
require_once "components/db_connect.php";

// if adm will redirect to dashboard
if (isset($_SESSION['adm'])) {
   header("Location: dashBoard.php");
   exit;
}
// if session is not set this will redirect to login page
if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
   header("Location: index.php");
   exit;
}

// select logged-in users details - procedural style
$res = mysqli_query($connect, "SELECT * FROM user WHERE id=" . $_SESSION['user']);
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);


//information about booking
$sql = "SELECT *
FROM booking
JOIN products on products.id = booking.fk_productsId
JOIN user on user.id = booking.fk_userId
WHERE fk_userId=" . $_SESSION['user'];
$result = mysqli_query($connect, $sql);
$tbody = "";

if (mysqli_num_rows($result) > 0) {

   while ($row2 = mysqli_fetch_array($result, MYSQLI_ASSOC)) {


      $tbody .= "<tr>
      <td>" . $row2['name'] . "</td>
      <td>" . $row2['reservation_date'] ." ". $row2['time'] . "</td>
      <td>" . $row2['number_people'] . "</td>
      <td><a href='booking/update_booking.php?id=" . $row2['bookingId'] . "'><button class='btn btn-primary btn-sm' type='button'>Edit</button></a>
      <a href='booking/delete_booking.php?id=" .  $row2['bookingId'] . "'><button class='btn btn-danger btn-sm' type='button'>Delete</button></a></td>
   </tr>";
   }
} else {
   $tbody = "<tr><td colspan='5'><center>You don't have any reservation</center></td></tr>";
}


mysqli_close($connect);
?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Welcome - <?php echo $row['first_name']; ?></title>
   <?php require_once 'components/boot.php' ?>
   <style>
      .userImage {
         width: 20vw;
         min-width: 300px;
         margin: auto;
      }

      body {
         background-image: url("pictures/backg.jpg");
         background-size:cover;
         background: fixed;
         background-repeat: no-repeat;
         background-color: rgba(255, 255, 255, 0.1);
      }

      .container {
         background-color: rgba(255, 255, 255, 0.9);
         background-blend-mode: lighten;
         height: 80vh;
      }
      
      .navbar {
         background-color: rgb(187,45,59);
      }

      a {
         text-decoration: none;
      }
      .book {
         width: 300px;
      }

      .signout,
      .update {
         background-color: #FFE6E6;
      }
      th, td {
         text-align: center;
      }
      table {
         background-color: rgba(255, 255, 255, 0.9);
         background-blend-mode: lighten;
         margin-bottom: 10vw;
      }
   </style>
</head>

<body>
   <nav class="navbar navbar-expand-lg navbar">
      <div class="container-fluid">
         <a class="navbar-brand text-white fw-bold" href="index.php">Restaurant booking system</a>

         <div class="d-flex justify-content-end">
            <a href="update.php?id=<?php echo $_SESSION['user'] ?>"><button class="btn update" type="button">Update your profile</button></a>
            <a href="contact.php"><button class="btn ms-2 update" type="button">Contuct us</button></a>
            <a href="logout.php?logout"><button class="btn ms-2 signout text-black border-0" type="button">Sign Out</button></a>

         </div>
      </div>
   </nav>
   <div class="container">
      <div class="hero mb-3 mt-5 row">
      <div class="col-lg-4 col-md-4 col-sm-12">
         <center><img class="userImage mt-3 rounded-circle" src="pictures/<?php echo $row['picture']; ?>" alt="<?php echo $row['first_name']; ?>"></cernter>
</div>
         <div class="col-8 col-md-8 col-sm-12">
         <h1 class="text-dark mt-5 ms-5 md-5">Hi <?php echo $row['first_name']; ?>!</h1><br/>
         <h3>There are many restaurant and you can easily book! </h3>
         <a href="products/index.php"><button class="btn btn-danger mt-3 book" type="button">Go to book restaurant</button></a>
         </div>
      </div>


      <h2 class="mt-5">Your reservation</h2>
      <table class='table table-striped mt-2 mb-5'>
         <thead class='table-danger mb-5'>
            <tr>
               <th>Retaurant</th>
               <th>Date, time</th>
               <th>Number of people</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            <?= $tbody ?>
         </tbody>
      </table>
   </div>
</body>

</html>