<?php
session_start();
require_once "../components/db_connect.php";

// if adm will redirect to dashboard
// if (isset($_SESSION['adm'])) {
//     header("Location: dashBoard.php");
//     exit;
// }
// if session is not set this will redirect to login page
if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

// select logged-in users details - procedural style
if (isset($_SESSION['adm'])) {
    $res = mysqli_query($connect, "SELECT * FROM user WHERE user_id=" . $_SESSION['adm']);
} elseif (isset($_SESSION['user'])) {
    $res = mysqli_query($connect, "SELECT * FROM user WHERE user_id=" . $_SESSION['user']);
}




$row = mysqli_fetch_array($res, MYSQLI_ASSOC);


//select snimsls
$sql = "SELECT * FROM pet WHERE age >= 8;";
$result = mysqli_query($connect, $sql);
$tbody = "";


if (mysqli_num_rows($result) > 0) {

    while ($row2 = mysqli_fetch_array($result, MYSQLI_ASSOC)) {


        $tbody .= '<div class="col-lg-4 col-md-4 col-sm-12">
          <div class="card border-0">
              <img src="pictures/' . $row2["picture"] . '" class="card-img-top" alt="animal">
              <div class="card-body">
                  <h4 class="card-title text-center">' . $row2["pet_name"] . '</h4>
                  <h6 class="card-subtitle mb-2 text-muted">Size: ' . $row2["size"] . '</h6>
                  <h6 class="card-subtitle mb-2 text-muted">Age: ' . $row2["age"] . '</h6>
                  <p class="card-text">' . $row2["description"] . '</p>
              </div>
              <center>
              <a href="detail.php?id=' . $row2['pet_id'] . '"><button class="btn know btn-sm m-2" type="button">Show more</button></a>
              </center>
              </div>
    </div>';
    };
} else {
    $tbody =  "<tr><td colspan='5'><center>No Data Available</center></td></tr>";
}

mysqli_close($connect);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once '../components/boot.php' ?>
    <title>Document</title>

    <style>
        body {
            background-color: rgb(247, 218, 171);
            text-align: center;
            color: rgb(79, 35, 13);
        }
        .know {
            color: white;
            background-color: #FFA900;
        }


        
    </style>
</head>

<body>
<div class="container">
        <div class="animals mt-5 mb-5">
            <h1 class="mb-5">Senior animals</h1>
            <div class="row g-4">

                <?= $tbody; ?>

            </div>

        </div>

    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>