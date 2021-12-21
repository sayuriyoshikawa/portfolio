<?php
require_once 'components/db_connect.php';
$sql1 = "SELECT * FROM travel WHERE continent = 'Europe'";
$sql2 = "SELECT * FROM travel WHERE continent = 'Africa'";
$sql3 = "SELECT * FROM travel WHERE continent = 'North America'";
$sql4 = "SELECT * FROM travel WHERE continent = 'South America'";
$sql5 = "SELECT * FROM travel WHERE continent = 'Asia'";
$sql6 = "SELECT * FROM travel WHERE continent = 'Australia'";
$result1 = mysqli_query($connect, $sql1);
$result2 = mysqli_query($connect, $sql2);
$result3 = mysqli_query($connect, $sql3);
$result4 = mysqli_query($connect, $sql4);
$result5 = mysqli_query($connect, $sql5);
$result6 = mysqli_query($connect, $sql6);
$europeTbody = '';
$africaTbody = '';
$asiaTbody = '';
$australiaTbody = '';
$southTbody = '';
$northTbody = '';
if (mysqli_num_rows($result1)  > 0) {
    while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
        $europeTbody .= '
        <div class="col-lg-4 col-md-6 col-sm-12 travelcard">
        <div class="card border-0 shadow travelc">
        <img src="travels/pictures/' . $row1["picture"] . '" class="card-img-top" alt="travel">
        <div class="card-body">
            <h4 class="card-title text-center">' . $row1["locationName"] . '</h4>
            <h6 class="card-text text-center mb-2">Duration: ' . $row1["duration"] . '</h6>
            <h6 class="card-text text-center mb-2">Price: ' . $row1["price"] . ' €</h6>
        </div>
    <center>
        <a href="travels/update.php?id=' . $row1['id'] . '">
            <button class="btn btn-sm m-1 edit" type="button">Edit</button>
        </a>
        <a href="travels/delete.php?id='  . $row1['id'] . '">
            <button class="btn btn-sm m-1 delete" type="button">Delete</button>
        </a>
        <a href="travels/detail.php?id='  . $row1['id'] . '">
            <button class="btn  detail btn-sm m-1" type="button">Detail</button>
        </a>
        </center>
        </div>
        </div>';
    };
} else {
    $europeTbody =   "
    <center>No Data Available </center>";
}
if (mysqli_num_rows($result2)  > 0) {
    while ($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
        $africaTbody  .= '
        <div class="col-lg-4 col-md-6 col-sm-12 travelcard">
        <div class="card border-0 shadow travelc">
        <img src="travels/pictures/' . $row2["picture"] . '" class="card-img-top" alt="travel">
        <div class="card-body">
            <h4 class="card-title text-center">' . $row2["locationName"] . '</h4>
            <h6 class="card-text text-center mb-2">Duration: ' . $row2["duration"] . '</h6>
            <h6 class="card-text text-center mb-2">Price: ' . $row2["price"] . ' €</h6>
        </div>
    <center>
        <a href="travels/update.php?id=' . $row2['id'] . '">
            <button class="btn btn-sm m-1 edit" type="button">Edit</button>
        </a>
        <a href="travels/delete.php?id='  . $row2['id'] . '">
            <button class="btn btn-sm m-1 delete" type="button">Delete</button>
        </a>
        <a href="travels/detail.php?id='  . $row2['id'] . '">
            <button class="btn  detail btn-sm m-1" type="button">Detail</button>
        </a>
        </center>
        </div>
        </div>';
    };
} else {
    $africaTbody  =   "<center>No Data Available </center>";
}
if (mysqli_num_rows($result3)  > 0) {
    while ($row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC)) {
        $northTbody .= '
        <div class="col-lg-4 col-md-6 col-sm-12 travelcard">
        <div class="card border-0 shadow travelc">
        <img src="travels/pictures/' . $row3["picture"] . '" class="card-img-top" alt="travel">
        <div class="card-body">
            <h4 class="card-title text-center">' . $row3["locationName"] . '</h4>
            <h6 class="card-text text-center mb-2">Duration: ' . $row3["duration"] . '</h6>
            <h6 class="card-text text-center mb-2">Price: ' . $row3["price"] . ' €</h6>
        </div>
    <center>
        <a href="travels/update.php?id=' . $row3['id'] . '">
            <button class="btn btn-sm m-1 edit" type="button">Edit</button>
        </a>
        <a href="travels/delete.php?id='  . $row3['id'] . '">
            <button class="btn btn-sm m-1 delete" type="button">Delete</button>
        </a>
        <a href="travels/detail.php?id='  . $row3['id'] . '">
            <button class="btn  detail btn-sm m-1" type="button">Detail</button>
        </a>
        </center>
        </div>
        </div>';
    };
} else {
    $northTbody =   "<center>No Data Available </center>";
}
if (mysqli_num_rows($result4)  > 0) {
    while ($row4 = mysqli_fetch_array($result4, MYSQLI_ASSOC)) {
        $southTbody .= '
        <div class="col-lg-4 col-md-6 col-sm-12 travelcard">
        <div class="card border-0 shadow travelc">
        <img src="travels/pictures/' . $row4["picture"] . '" class="card-img-top" alt="travel">
        <div class="card-body">
            <h4 class="card-title text-center">' . $row4["locationName"] . '</h4>
            <h6 class="card-text text-center mb-2">Duration: ' . $row4["duration"] . '</h6>
            <h6 class="card-text text-center mb-2">Price: ' . $row4["price"] . ' €</h6>
        </div>
    <center>
        <a href="travels/update.php?id=' . $row4['id'] . '">
            <button class="btn btn-sm m-1 edit" type="button">Edit</button>
        </a>
        <a href="travels/delete.php?id='  . $row4['id'] . '">
            <button class="btn btn-sm m-1 delete" type="button">Delete</button>
        </a>
        <a href="travels/detail.php?id='  . $row4['id'] . '">
            <button class="btn detail btn-sm m-1" type="button">Detail</button>
        </a>
        </center>
        </div>
        </div>';
    };
} else {
    $southTbody =   "<center>No Data Available </center>";
}
if (mysqli_num_rows($result5)  > 0) {
    while ($row5 = mysqli_fetch_array($result5, MYSQLI_ASSOC)) {
        $asiaTbody .= '
        <div class="col-lg-4 col-md-6 col-sm-12 travelcard">
        <div class="card border-0 shadow travelc">
        <img src="travels/pictures/' . $row5["picture"] . '" class="card-img-top" alt="travel">
        <div class="card-body">
            <h4 class="card-title text-center">' . $row5["locationName"] . '</h4>
            <h6 class="card-text text-center mb-2">Duration: ' . $row5["duration"] . '</h6>
            <h6 class="card-text text-center mb-2">Price: ' . $row5["price"] . ' €</h6>
        </div>
    <center>
        <a href="travels/update.php?id=' . $row5['id'] . '">
            <button class="btn btn-sm m-1 edit" type="button">Edit</button>
        </a>
        <a href="travels/delete.php?id='  . $row5['id'] . '">
            <button class="btn btn-sm m-1 delete" type="button">Delete</button>
        </a>
        <a href="travels/detail.php?id='  . $row5['id'] . '">
            <button class="btn  detail btn-sm m-1" type="button">Detail</button>
        </a>
        </center>
        </div>
        </div>';
    };
} else {
    $asiaTbody =   "<center>No Data Available </center>";
}
if (mysqli_num_rows($result6)  > 0) {
    while ($row6 = mysqli_fetch_array($result6, MYSQLI_ASSOC)) {
        $australiaTbody .= '
        <div class="col-lg-4 col-md-6 col-sm-12 travelcard">
        <div class="card border-0 shadow travelc">
        <img src="travels/pictures/' . $row6["picture"] . '" class="card-img-top" alt="travel">
        <div class="card-body">
            <h4 class="card-title text-center">' . $row6["locationName"] . '</h4>
            <h6 class="card-text text-center mb-2">Duration: ' . $row6["duration"] . '</h6>
            <h6 class="card-text text-center mb-2">Price: ' . $row6["price"] . ' €</h6>
        </div>
    <center>
        <a href="travels/update.php?id=' . $row6['id'] . '">
            <button class="btn btn-sm m-1 edit" type="button">Edit</button>
        </a>
        <a href="travels/delete.php?id='  . $row6['id'] . '">
            <button class="btn btn-sm m-1 delete" type="button">Delete</button>
        </a>
        <a href="travels/detail.php?id='  . $row6['id'] . '">
            <button class="btn  detail btn-sm m-1" type="button">Detail</button>
        </a>
        </center>
        </div>
        </div>';
    };
} else {
    $australiaTbody =   "<center>No Data Available </center>";
}

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mount Everest</title>
    <?php require_once 'components/boot_css.php' ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">

    <style>
        .add {
            border-radius: 8px;
            background: #e4d9f2;
            box-shadow:  20px 20px 60px #c2b8ce,
             -20px -20px 60px #fffaff;
        }
        .travelcontainer h2 {
            font-size: calc(30px + 5vw);
            text-shadow: 1px 3px 3px #c2b8ce;
        }
        .travelcontainer h1 {
            font-size: calc(35px + 2vw);
            text-shadow: 1px 3px 3px #93B5C6;
            text-align: center;
        }
        footer {
            margin-top: 5vw;
            color: white;
            text-shadow: 1px 2px 3px rgba(255, 248, 211);
            height: 100px;
            background-image: url("travels/pictures/travelbg.jpg");
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .edit{
            background-color: #dbdfe9;
        }
        .delete {
            background-color: #E4D8DC;
        }
        .detail {
            background-color: #FFE3E3;
        }
        .edit:hover{
             background-color: #d2d6e6;
        }
        .delete:hover {
            background-color: #ddc3cc;
        }
        .detail:hover {
            background-color: #ffdada;
        }
        .travelc:hover {
            background-color: #eeeeee;
        }
        @media screen and (max-width: 768px)  {
            .herocard{
                min-width: 130px;
                min-height: 60px;
            }
        }
        @media screen and (max-width: 575px)  {
            .row1, .row2, .row3 {
                margin-left: 28px;
            }
        }
    </style>
</head>

<body>
    <!-- hero section -->
    <div class="hero">
        <nav class="navbar sticky-top navbar-expand-lg" id="nav">
            <div class="container-fluid">
                <a class="navbar-brand ms-5" href="index.php">Mount Everest</a>
                <button class="navbar-toggler border-0" id="navbtn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span><i class="bi bi-caret-down"></i></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav" id="navitem">
                        <li class="nav-item">
                            <a class="nav-link ms-3" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ms-3" href="#about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ms-3" href="#sale">Sale</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ms-3" href="#travels">Travels</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ms-3" href="displayAPI/displayAll.php">All information</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link ms-3" href="displayAPI/ajaxOffers.html">Ajax offers</a>
                    </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="row">
            <div class="herotext col-lg-7 col-md-7 col-sm-7">
                <h1>VOYAGE</h1>
                <h2>Your jurney starts here</h2>
            </div>

            <div class="col-lg-5 col-md-5 col-sm-5 g-2 heroright">
                <div class="row row1">
                    <div class="card herocard border-0 col-lg-6 col-md-6 col-sm-6">
                        <a href="#europe">
                            <div class="card-body cb">
                                <h5 class="card-title text-center mt-1 mb-3">Europe</h5>

                                <p class="card-text cardtext text-center">Show travels</p>
                            </div>
                        </a>
                    </div>


                    <div class="card herocard border-0 col-lg-6 col-md-6 col-sm-6">
                        <a href="#africa">
                            <div class="card-body cb">
                                <h5 class="card-title text-center mt-1 mb-3">Africa</h5>

                                <p class="card-text cardtext text-center">Show travels</p>
                            </div>
                        </a>
                    </div>

                </div>
                <div class="row row2">

                    <div class="card herocard border-0 col-lg-6 col-md-6 col-sm-6">
                        <a href="#northamerica">
                            <div class="card-body cb">
                                <h5 class="card-title text-center mt-1 mb-3">North America</h5>

                                <p class="card-text cardtext text-center">Show travels</p>
                            </div>
                        </a>
                    </div>


                    <div class="card herocard border-0 col-lg-6 col-md-6 col-sm-6">
                        <a href="#southamerica">
                            <div class="card-body cb">
                                <h5 class="card-title text-center mt-1 mb-3">South America</h5>

                                <p class="card-text cardtext text-center">Show travels</p>
                            </div>
                        </a>
                    </div>

                </div>

                <div class="row row3">

                    <div class="card herocard border-0 col-lg-6 col-md-6 col-sm-6">
                        <a href="#asia">
                            <div class="card-body cb">
                                <h5 class="card-title text-center mt-1 mb-3">Asia</h5>

                                <p class="card-text cardtext text-center">Show travels</p>
                            </div>
                        </a>
                    </div>


                    <div class="card herocard border-0 col-lg-6 col-md-6 col-sm-6">
                        <a href="#australia">
                            <div class="card-body cb">
                                <h5 class="card-title text-center mt-1 mb-3">Australia</h5>

                                <p class="card-text cardtext text-center">Show travels</p>
                            </div>
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- navbar -->
    <nav class="navbar nav2 sticky-top navbar-expand-lg" id="nav">
        <div class="container-fluid">
            <a class="navbar-brand ms-5" href="index.php">Mount Everest</a>
            <button class="navbar-toggler border-0" id="navbtn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span><i class="bi bi-caret-down"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav" id="navitem">
                    <li class="nav-item">
                        <a class="nav-link ms-3" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ms-3" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ms-3" href="#sale">Sale</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ms-3" href="#travels">Travels</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ms-3" href="displayAPI/displayAll.php">All information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ms-3" href="displayAPI/ajaxOffers.html">Ajax offers</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- about section -->
    <section id="about">
        <div class="container aboutcontainer">
            <p>Our trips are born out of a desire to share wonderfyl travel experiences. We designed to your interests, tastes, and budcget.</p>
            <div class="aboutpic">
                <img src="travels/pictures/travel2.jpg" alt="">
                <img src="travels/pictures/travel6.jpg" alt="">
                <img src="travels/pictures/travel4.jpg" alt="">
                <img src="travels/pictures/travel7.jpg" alt="">
                <img src="travels/pictures/travel3.jpg" alt="">
                <img src="travels/pictures/travel1.jpg" alt="">
            </div>

        </div>
    </section>

    <!-- sale section -->
    <section id="sale">
        <div class="saleleft">
            <h1>20% OFF</h1>
            <h4>Now we offer special discount!</h4>
        </div>

    </section>

    <!-- travels section  -->
    <section id="travels">
        <div class="container travelcontainer">
            <h2 class="text-center mt-5 pt-5 mb-5 title">Travels</h2>
            <center><a href="travels/create.php"><button class="btn add" type="button">Add tour</button></a></center>

            <div id="europe" class="pb-5">
                <h1 class="m-5">Europe</h1>
                <div class="row g-5">
                    <?= $europeTbody; ?>
                </div>
            </div>
            <div id="africa" class="pb-5">
                <h1 class="m-5">Africa</h1>
                <div class="row g-5">
                    <?= $africaTbody; ?>
                </div>
            </div>
            <div id="northamerica" class="pb-5">
                <h1 class="m-5">North America</h1>
                <div class="row g-5">
                    <?= $northTbody; ?>
            </div>
            </div>
            <div id="southamerica" class="pb-5">
                <h1 class="m-5">South America</h1>
                <div class="row g-5">
                    <?= $southTbody; ?>
                </div>
            </div>
            <div id="asia" class="pb-5">
                <h1 class="m-5">Asia</h1>
                <div class="row g-5">
                    <?= $asiaTbody; ?>
                </div>
            </div>
            <div id="australia" class="pb-5">
                <h1 class="m-5">Australia</h1>
                <div class="row g-5">
                    <?= $australiaTbody; ?>
            </div>
            </div>

           
        </div>
    </section>

    <footer>
        <h2>Mount Everest</h2>
    </footer>

    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>