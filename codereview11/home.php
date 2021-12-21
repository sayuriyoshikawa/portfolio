<?php
session_start();
require_once "components/db_connect.php";


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


//select animsls
$sql = "SELECT * FROM pet WHERE pet_status = 'not adopted';";
$result = mysqli_query($connect, $sql);
$tbody = "";


if (mysqli_num_rows($result) > 0) {

    while ($row2 = mysqli_fetch_array($result, MYSQLI_ASSOC)) {


        $tbody .= '<div class="col-lg-4 col-md-6 col-sm-12 animalcard">
                   <div class="card border-0 pet">
                    <img src="animals/pictures/' . $row2["picture"] . '" class="card-img-top" alt="animal">
                <div class="card-body">
                  <h4 class="card-title text-center">' . $row2["pet_name"] . '</h4>
                  <h6 class="card-text mb-2">Size: ' . $row2["size"] . '</h6>
                  <h6 class="card-text mb-2">Age: ' . $row2["age"] . '</h6>
                  <p class="card-text">' . $row2["description"] . '</p>
              </div>
              <center>
              <a href="animals/detail.php?id=' . $row2['pet_id'] . '"><button class="btn know btn-sm m-2" type="button">Know me more</button></a>
              <a href="adoption/adoption.php?id=' . $row2['pet_id'] . '"><button class="btn take btn-sm m-2" type="button">Take me home</button></a>
              </center>
            </div>
         </div>';
    };
} else {
    $tbody =  "<tr><td colspan='5'><center>No Data Available</center></td></tr>";
}

//select adoption reservation

$sql3 = "SELECT *
FROM pet_adoption
JOIN pet on pet_id = fk_pet_id
WHERE fk_user_id=" . $_SESSION['user'];
$result3 = mysqli_query($connect, $sql3);
$tbody3 = "";
$class = "show";
$class2 = "hide";

if (mysqli_num_rows($result3) > 0) {

    while ($row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC)) {
        $tbody3 .= '
        
        <div class="card border-0 shadow adp mt-3">
                    <img src="animals/pictures/' . $row3["picture"] . '" class="card-img-top" alt="animal">
                <div class="card-body">
                  <h4 class="card-title text-center">' . $row3["pet_name"] . '</h4>
                  <h6 class="card-subtitle mb-2 text-muted">Adoption date: ' . $row3["adoption_date"] . '</h6>
                  </div>
      </div>';
        $class = "hide";
        $class2 = "show";
    }
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
    <title>Animal adoption</title>

    <style>
        body {
            background-color: rgb(247, 218, 171);
        }

        header .row {
            width: 99.5vw;
            height: 99.5vh;
            position: relative;
        }

        .row h1 {
            position: absolute;
            top: 40%;
            left: 20px;
            font-size: calc(25px + 7vw);
            color: rgb(79, 35, 13);
            text-shadow: 4px 3px 2px bisque;
            width: 60%;
        }

        a {
            text-decoration: none;
        }

        .left {
            background-color: rgb(247, 218, 171);
        }

        .left h2 {
            color: rgb(35, 31, 32);
            margin-top: 10px;
            text-align: center;
        }

        .left h2:hover {
            color: rgb(79, 35, 13);
        }

        .left img {
            margin-top: 20px;
            margin-left: 25%;
            width: 50%;
        }

        nav {
            width: 100%;
        }

        .left2 {
            background-color: rgb(242, 205, 149);
        }

        .hero {
            background-image: url(animals/pictures/calousel3.jpg);
            background-repeat: no-repeat;
        }

        .hi {
            background-color: blanchedalmond;
            border-radius: 30px;
            margin-top: 7vw;
            padding: 3vw;
            width: 70vw;
            display: flex;
        }

        .hi img {
            width: 200px;
            margin-left: 30px;
            overflow: hidden;
        }

        .hi h2 {
            padding-left: 5vw;
            padding-top: 3vw;
            color: rgb(79, 35, 13);
        }

        .hide {
            display: none;
            padding-top: 0;
        }

        .senior {
            background-color: #9D5C0D;
            color: white;
        }

        .take {
            background-color: #DF5E5E;
            color: white;
        }

        .know {
            color: white;
            background-color: #FFA900;
        }

        .animals {
            width: 80vw;
            margin: auto;
            text-align: center;
            padding-top: 10vw;
        }
        .pet:hover {
            background-color: lemonchiffon;
        }
        .adp {
            min-width: 250px;
        }

        .adpinfo {
            margin-top: 5vw;
            width: 40vw;
            margin-bottom: 10vw;
        }

        .card {
            text-align: center;
                }

        @media screen and (max-width: 991px) and (min-width: 769px) {
            .row {
                height: 20vw;
                display: block;
                margin: 0;
            }

            .left {
                width: 20vw;
                height: 15vw;
            }

            .left img {
                margin-top: 20px;
                margin-left: 25%;
                width: 50%;
            }

            .left h2 {
                font-size: 20px;
            }

            .left2 {
                height: 10vh;
                width: 100vw;
                padding: 0;
            }

            .hero {
                height: 75vh;
            }

            .row h1 {
                position: absolute;
                top: 10px;
                left: 30%;
                font-size: calc(25px + 7vw);
            }

            .row {
                display: flex;
            }
        }

        @media screen and (max-width: 768px) and (min-width: 576px) {
            .hero {
                background-image: url(animals/pictures/calousel4.jpg);
                background-repeat: no-repeat;
            }

            .row {
                height: 20vw;
                display: block;
                margin: 0;
            }

            .left {
                width: 20vw;
                height: 15vw;
            }

            .left img {
                margin-top: 20px;
                margin-left: 25%;
                width: 50%;
            }

            .left h2 {
                font-size: 10px;
            }

            .left2 {
                height: 10vh;
                width: 100vw;
                padding: 0;
            }

            .hero {
                height: 75vh;
            }

            .row h1 {
                position: absolute;
                top: 10px;
                left: 30%;
                font-size: calc(15px + 7vw);
            }

            .row {
                display: flex;
            }

            .adpinfo {
                margin-top: 5vw;
                margin-bottom: 10vw;
                width: 80vw;
            }
        }

        @media screen and (max-width: 575px) and (min-width: 426px) {
            .hero {
                background-image: url(animals/pictures/calousel4.jpg);
                background-repeat: no-repeat;
            }

            .row {
                height: 20vw;
                display: block;
                margin: 0;
            }

            .left {
                width: 20vw;
                height: 17vw;
            }

            .left img {
                margin-top: 20px;
                margin-left: 25%;
                width: 50%;
            }

            .left h2 {
                font-size: 10px;
            }

            .left2 {
                height: 15vh;
                width: 100vw;
                padding: 0;
            }

            .hero {
                height: 75vh;
            }

            .hi {
                display: block;
            }

            .hi img {
                margin: 0;
                width: 200px;
                overflow: hidden;
            }

            .hi h2 {
                padding-top: 3vw;
                padding-left: 0;
            }


            .row h1 {
                position: absolute;
                top: 10px;
                left: 30%;
                font-size: calc(13px + 7vw);
            }

            .row {
                display: flex;
            }

            .adpinfo {
                margin-top: 5vw;
                margin-bottom: 10vw;
                width: 80vw;
            }
        }

        @media screen and (max-width: 425px) {
            .hero {
                background-image: url(animals/pictures/dogbg2.jpg);
                background-repeat: no-repeat;
                background-size: cover;
            }

            .row {
                height: 20vw;
                display: block;
                margin: 0;
            }

            .left {
                width: 20vw;
                height: 17vw;
            }

            .left img {
                margin-top: 10px;
                margin-left: 25%;
                width: 50%;
            }

            .left h2 {
                font-size: 10px;
                width: 15vw;
                margin: 0;
                text-align: center;
            }

            .left2 {
                height: 15vh;
                width: 100vw;
                padding: 0;
            }

            .hero {
                height: 75vh;
            }

            .hi {
                display: block;
            }

            .hi img {
                margin: 0;
                width: 200px;
                overflow: hidden;
            }

            .hi h2 {
                padding-top: 3vw;
                padding-left: 0;
            }


            .row h1 {
                position: absolute;
                top: 10px;
                left: 20%;
                width: 80vw;
                padding-left: 0;
                font-size: calc(14px + 9vw);
            }

            .row {
                display: flex;
            }

            .adpinfo {
                margin-top: 5vw;
                margin-bottom: 10vw;
                width: 80vw;
            }
        }
    </style>
</head>

<body>
    <section id="home">
        <header>
            <div class="row">
                <div class="col-lg-2 left">
                    <a class="fw-bold" href="index.php">
                        <img src="animals/pictures/paw-g759620853_640.png" alt="">
                        <h2>Adopt a Pet</h2>
                    </a>
                </div>
                <div class="col-lg-2 left2">
                </div>
                <div class="col-lg-8 m-0 p-0 hero">
                </div>
                <h1 class="fw-bold">Find Your<br>Best Friend</h1>
            </div>
        </header>
        <section>

            <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top justif" id="navbar1">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item me-3">
                                <a class="nav-link active" href="#home">Home</a>
                            </li>
                            <li class="nav-item me-3 <?= $class2 ?>">
                                <a class="nav-link active" href="#your">Your adoption</a>
                            </li>
                            <li class="nav-item me-3">
                                <a class="nav-link active" href="#animals">Animals</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <a href="logout.php?logout"><button class='btn signout btn ms-3' type='button'>Sign Out</button></a>

            </nav>

            <div class="container">
                <center>
                    <div class="hi">
                        <div class="userpic">
                            <img src="pictures/<?php echo $row['picture'] ?>" class="rounded-circle" alt="">
                        </div>
                        <div class="message">

                            <h2>Hi, <?php echo $row['first_name']; ?> !</h2><br>
                            <h2 class="<?= $class ?>">
                                Welcome to our page :)<br><br>I hope you find your best friend. <br>Thank you!</h2>

                        </div>
                    </div>
                    <section id="your">
                        <div class="adpinfo">
                        <h3 class="mt-3 mb-5 <?=$class2 ?>">He/She will be your family!</h3>
                            <?= $tbody3 ?>
                        </div>
                    </section>
                </center>

                <section id="animals">
                    <div class="animals mt-3 mb-5">
                        <p class='h2'>Our animals</p>
                        <a href="animals/senior.php"><button class="btn btn btn mt-4 mb-4 senior d-flex justify-content-end" type="button">Look senior animals!</button></a>
                        <div class="row g-4">
                        
                            <?= $tbody; ?>

                        </div>

                    </div>
                </section>

            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>