<?php
session_start();

// if (isset($_SESSION['user']) != "") {
//     header("Location: ../home.php");
//     exit;
// }

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: ../index.php");
    exit;
}

require_once '../components/db_connect.php';

if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM pet WHERE pet_id = {$id}";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
        $name = $data['pet_name'];
        $location = $data['location'];
        $size = $data['size'];
        $age = $data['age'];
        $hobbies = $data['hobbies'];
        $breed = $data['breed'];
        $pet_status = $data['pet_status'];
        $picture = $data['picture'];
        $description = $data["description"];
    } else {
        header("location: error.php");
    }
}
$connect->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animal detail</title>
    <?php require_once '../components/boot.php' ?>
    <style type="text/css">
        .container {
            margin-top: 5vw;
            margin-bottom: 5vw;
            width: 80vw;
            min-width: 250px;
        color: rgb(79, 35, 13);
        }
        .card {
            margin: auto;
            width: 50vw;
            min-width: 250px;
        color: rgb(79, 35, 13);
            text-align: center;
        }
        .take {
            background-color: #DF5E5E;
            color: white;
        }
    </style>
</head>

<body>
    <div class=container>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card border-0">
                <img src="pictures/<?= $picture ?>" class="card-img-top" alt="animal">
                <div class="card-body">
                    <h1 class="card-title text-center"><?= $name ?></h1>
                    <h4 class="card-subtitle mb-2">Size: <?= $size ?></h4>
                    <h4 class="card-subtitle mb-2">Age: <?= $age ?></h4>
                    <h4 class="card-subtitle mb-2">Hobbies: <?= $hobbies ?></h4>
                    <h4 class="card-subtitle mb-2">Breed: <?= $breed ?></h4>
                    <h4 class="card-subtitle mb-2">Location: <?= $location ?></h4>
                    <h5 class="card-text"><?= $description ?></h5>
                </div>
                <center>
                    <a href="../adoption/adoption.php?id=<?= $id ?>"><button class="btn take m-2" type="button">Take me home!</button></a>
                </center>
            </div>
        </div>
    </div>
</body>

</html>