<?php
session_start();
require_once "components/db_connect.php";

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
$res = mysqli_query($connect, "SELECT * FROM user WHERE user_id=" . $_SESSION['adm']);
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);


//select animsls
$sql = "SELECT * FROM pet";
$result = mysqli_query($connect, $sql);
$tbody = "";


if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {


        $tbody .= '<div class="col">
          <div class="card border-0">
              <img src="animals/pictures/' . $row["picture"] . '" class="card-img-top" alt="animal">
              <div class="card-body">
                  <h4 class="card-title text-center">' . $row["pet_name"] . '</h4>
                  <h6 class="card-subtitle mb-2 text-muted">Size: ' . $row["size"] . '</h6>
                  <h6 class="card-subtitle mb-2 text-muted">Age: ' . $row["age"] . '</h6>
                  <p class="card-text">' . $row["description"] . '</p>
              </div>
              <div class="d-flex justify-content-end">
            <a href="animals/update.php?id=' . $row['pet_id'] . '"><button class="btn btn-primary btn-sm m-2" type="button">Edit</button></a><a href="animals/delete.php?id=' . $row['pet_id'] . '"><button class="btn btn-danger btn-sm m-2" type="button">Delete</button></a>
           </div>
        </div>
    </div>';
    };
} else {
    $tbody =  "<tr><td colspan='5'><center>No Data Available</center></td></tr>";
}


//information about booking
$sql2 = "SELECT *
FROM pet_adoption
JOIN pet on pet_id = fk_pet_id
JOIN user on user_id = fk_user_id";
$result2 = mysqli_query($connect, $sql2);
$tbody2 = "";

if (mysqli_num_rows($result2) > 0) {

    while ($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {


        $tbody2 .= "<tr>
            <td>" . $row2['first_name'] . " " . $row2['last_name'] . "</td>
            <td>" . $row2['pet_name'] . "</td>
            <td>" . $row2['adoption_date'] . "</td>
            <td>" . $row2['phone_number'] . "</td>
            </tr>";
    }
} else {
    $tbody2 = "<tr><td colspan='5'><center>There is no adoption yet</center></td></tr>";
}


mysqli_close($connect);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once 'components/boot.php' ?>
    <title>Document</title>

    <style>
        body {
            background-color: rgb(247, 218, 171);
            text-align: center;
            color: rgb(79, 35, 13);
        }


        a {
            text-decoration: none;
        }

        nav {
            width: 100%;
        }

        .container h1 {
            margin-top: 3vw;
            margin-bottom: 2vw;
            font-size: 5vw;
        }

        .container h3 {
            font-size: calc(7px + 1vw);
            margin-bottom: 5vw;
        }
        #adoptionlist {
            margin-top: 5vw;
        }
        table{
            margin-bottom: 5vw;
            margin-top: 5vw;
        }
    </style>
</head>

<body>




    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top justif" id="navbar1">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item me-3">
                        <a class="nav-link active" href="dashBoard.php">Home</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link active" href="#animalinfo">Animals information</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link active" href="#adoptionlist">Adoption list</a>
                    </li>
                </ul>
            </div>
        </div>
        <a href="logout.php?logout"><button class='btn signout btn ms-3' type='button'>Sign Out</button></a>
    </nav>



    <div class="container">
        <h1>Dash board</h1>
        <h3>You can add, edit, delete animal information. <br>
            And you can check adoption list. <br>Adopted status animal information will be eliminated from website. </h3>

        <section id="animalinfo">
            <div class="animals mt-3 mb-5">
                <p class='h2 m-3'>Animals information</p>
                <a href="animals/create.php"><button class='btn btn-danger mb-5' type='button'>Add animal</button></a>

                <div class="row row-cols-1 row-cols-md-3 g-4">

                    <?= $tbody; ?>

                </div>
            </div>


            <section id="adoptionlist">
                <h2 class="mt-5 mb-3">Adoption list</h2>
                <table class="table table-light">
                    <thead>

                        <tr>
                            <th scope="col">Customer name</th>
                            <th scope="col">Pet name</th>
                            <th scope="col">Adoption date</th>
                            <th scope="col">phone number</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?= $tbody2 ?>
                    </tbody>
                </table>
            </section>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>