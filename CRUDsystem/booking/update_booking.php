<?php
session_start();
require_once "../components/db_connect.php";
// if session is not set this will redirect to login page
if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}


//fetch and populate form
if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT *
    FROM booking
    JOIN products on products.id = booking.fk_productsId
    JOIN user on user.id = booking.fk_userId
    WHERE bookingId = {$id}";
    $result = mysqli_query($connect, $sql);
    $data = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) >= 0) {

        $product_picture = $data['picture'];
        $reservation_date = $data['reservation_date'];
        $time = $data['time'];
        $number_people = $data['number_people'];
        $productname = $data['name'];
    }
}

//update
if (isset($_POST["submit"])) {
    $reservation_date = date("Y-m-d", strtotime($_POST['reservation_date']));
    $time = $_POST["time"];
    $number_people = $_POST['number_people'];
   

    $sql = "UPDATE booking SET reservation_date='$reservation_date', number_people='$number_people',time='$time' WHERE bookingId = {$id}";

    if (mysqli_query($connect, $sql) === true) {
        $class = "alert alert-success";
        $message = "The reservation was successfully updated";
       
        header("refresh:3;url=update_booking.php?id={$id}");
    } else {
        $class = "alert alert-danger";
        $message = "Error while updating reservation : <br>" . 
        header("refresh:3;url=update_booking.php?id={$id}");
    }
}

$class = "show";
$class2 ="hidden";
if (isset($_SESSION["adm"])) {
    $class = "hidden";
    $class2 = "show";
}


mysqli_close($connect);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <?php require_once '../components/boot.php' ?>
    <style type="text/css">
        fieldset {
            margin: auto;
            margin-top: 100px;
            width: 60%;
        }

        .hidden{
            display: none;
        }

        .img-thumbnail {
            width: 70px !important;
            height: 70px !important;
        }


        .hidden {
            display: none;
        }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar">
      <div class="container-fluid">
         <a class="navbar-brand text-white fw-bold" href="index.php">Restaurant booking system</a>

      </div>
   </nav>
    <div class="container">
    <div class="<?php echo $class; ?>" role="alert">
            <p><?php echo ($message) ?? ''; ?></p>
            <p><?php echo ($uploadError) ?? ''; ?></p>
    </div>
    <fieldset>
        <center>
            <legend class='h2 mb-3'>Update Booking</legend>
        </center>
        <form method="post" enctype="multipart/form-data">
            <table class="table mt-5">
                <tr>
                    <th>Restaurant Name</th>
                    <td><?php echo $productname ?></td>
                </tr>
                <tr>
                    <th>Reservation Date</th>
                    <td><input class='form-control mt-3 w-50' type="date" name="reservation_date" value="<?=$reservation_date?>"></td>
                </tr>
                <tr>
                    <th>Time</th>
                    <td><select class="form-select" aria-label="Default select example" name="time">
                            <option selected><?=$time?></option>
                            <option value="10:00">10:00</option>
                            <option value="10:30">10:30</option>
                            <option value="11:00">11:00</option>
                            <option value="11:30">11:30</option>
                            <option value="12:00">12:00</option>
                            <option value="12:30">12:30</option>
                            <option value="13:00">13:00</option>
                            <option value="13:30">13:30</option>
                            <option value="14:00">14:00</option>
                            <option value="14:30">14:30</option>
                            <option value="15:00">15:00</option>
                            <option value="15:30">15:30</option>
                            <option value="16:00">16:00</option>
                            <option value="16:30">16:30</option>
                            <option value="17:00">17:00</option>
                            <option value="17:30">17:30</option>
                        </select></td>
                </tr>
                <tr>
                    <th>Number of people</th>
                    <td><input class='form-control mt-3 w-50' type="number" name="number_people" value="<?= $number_people ?>"></td>
                </tr>
                <tr>


                    <td> </td>

                    <td><a href="home.php"></a><button class="btn btn-danger" name="submit" type="submit">Update</button>
                    </td>
                </tr>
            </table>
            <a href="../home.php"><button class="btn btn-warning <?=$class?>>" type="button">Back</button></a>
            <a href="../dashBoard.php"><button class="btn btn-warning <?=$class2?>" type="button">Back</button></a>
        </form>
    </fieldset>
    </div>
    </div>
</body>

</html>