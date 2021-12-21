<?php
session_start();
require_once "../components/db_connect.php";

// if (isset($_SESSION['user']) != "") {
//   header("Location: ../home.php");
//   exit;
// }

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
  header("Location: ../index.php");
  exit;
}

$sql = "SELECT * FROM products";
$result = mysqli_query($connect, $sql);
$tbody = "";

$class = "hide";
$class2 = "hide";
$class3 = "show";
if (isset($_SESSION["adm"])) {
  $class = "show";
  $class2 = "show";
  $class3 = "hide";
}


if (mysqli_num_rows($result) > 0) {

  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {


    $tbody .= '<div class="col">
        <div class="card border-0 shadow">
            <img src="pictures/' . $row["picture"] . '" class="card-img-top" alt=" ">
            <div class="card-body">
                <h4 class="card-title text-center">' . $row["name"] . '</h4>
                <h6 class="card-subtitle mb-2 text-muted">Average price per a person : ' . $row["price"] . '€</h6>
                <p class="card-text">' . $row["description"] . '</p>
            </div>
            <div class="d-flex justify-content-end">
            <a href="update.php?id=' . $row['id'] . '"><button class="btn btn-primary btn-sm m-2 ' . $class . '" type="button">Edit</button></a><a href="delete.php?id=' . $row['id'] . '"><button class="btn btn-danger btn-sm m-2 ' . $class . '" type="button">Delete</button></a>
           </div>
           <center><a class="' . $class3 . '" href="../booking/booking.php?id=' . $row['id'] . '"><button class="btn btn-danger mb-2"type="button">Book now!</button></a></center>
        </div>
    </div>';
  };
} else {
  $tbody =  "<tr><td colspan='5'><center>No Data Available </center></td></tr>";
}

mysqli_close($connect);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <?php require_once "../components/boot.php" ?>

  <style type="text/css">
    * {
      font-family: Georgia, serif;
    }

    .manageProduct {
      margin: auto;
    }

    .manageProduct p {
      text-align: center;
      margin: 3vw;
    }

    .hide {
      display: none;
    }

    a {
      text-decoration: none;
    }

    .show {
      display: inline;
    }

    .card:hover {
      background-color: antiquewhite;
    }

    .card-subtitle {
      text-align: center;
    }

    .navbar {
      background-color: rgb(187, 45, 59);
    }

    a {
      text-decoration: none;
    }

    .signout,
    .home,
    .add,
    .back {
      background-color: #FFE6E6;
    }
  </style>

</head>

<body>

  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand text-white" href="index.php">Restaurant booking system</a>
      <div class="d-flex justify-content-end">
        <a href="create.php"><button class="btn add <?= $class2 ?>" type="button">Add product</button></a>
        <a href="../dashBoard.php"><button class="btn back ms-5 <?= $class2 ?>" type="button">Back to dashboard</button></a>
        <a href="../home.php"><button class="btn btn home ms-5 <?= $class3 ?>" type="button">Home</button></a>
        <a href="../logout.php?logout"><button class="btn btn signout ms-3" type="button">Sign Out</button></a>
      </div>
    </div>
  </nav>
  <div class="manageProduct w-75 mt-3 mb-5">
    <p class='h2'>Restaurant list</p>
    <div class="row row-cols-1 row-cols-md-3 g-4">

      <?= $tbody; ?>

    </div>

  </div>
</body>

</html>