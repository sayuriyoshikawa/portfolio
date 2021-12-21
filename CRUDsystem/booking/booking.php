<?php
session_start();
require_once '../components/db_connect.php';
// if (isset($_SESSION['user']) != "") {
//    header("Location: home.php");
//    exit;
// }

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

$booking = "";
$result = mysqli_query($connect, "SELECT * FROM booking");



// select logged-in users details - procedural style
$res = mysqli_query($connect, "SELECT * FROM user WHERE id=" . $_SESSION['user']);
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);


if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id = {$id}";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
        $name = $data['name'];
        $price = $data['price'];
        $picture = $data['picture'];
        $description = $data["description"];
       
    } else {
        header("location: error.php");
    }

} else {
    header("location: error.php");
}

$bookuser = $_SESSION['user'];
$bookproduct = $data['id'];

if (isset($_POST["book"])) {
    $sql = "INSERT INTO `booking`(`fk_userId`, `fk_productsId`) VALUES ('$bookuser','$bookproduct')";
    mysqli_query($connect, $sql);
}
$connect->close();
?>


<!DOCTYPE html>
<html>

<head>
    <title>Edit Product</title>
    <?php require_once '../components/boot.php' ?>
    <style type="text/css">
        fieldset {
            margin: auto;
           margin-top: 5vw;
            width: 60%;
            margin-bottom: 100px;
        }

        .img-thumbnail {
    
            width: 30vw;
            min-width: 300px;
            margin: auto;
        }
    </style>
</head>

<body>
    <fieldset>
        <center><legend class='h2 mb-3'> Booking confirmation</legend>
        <img class='img-thumbnail rounded-circle border-0' src='../products/pictures/<?php echo $picture ?>' alt="<?php echo $name ?>"></center>
        <form action="a_book.php" method="post" enctype="multipart/form-data">
            <table class="table mt-5">
                <tr>
                    <th>Name</th>
                    <td><?php echo $name ?></td>
    </tr>
                <tr>
                    <th>Date</th>
                    <td><input class='form-control mt-3 w-50' type="date" name="date"></td>
                </tr>
                <tr>
                    <th>Time</th>
                    <td><select class="form-select" aria-label="Default select example" name="time">
                            <option selected>Select the time</option>
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
                    <td><input class='form-control mt-3 w-50' type="number" name="number"></td>
                </tr>
                <tr>
                    <input type="hidden" name="product_id" value="<?php echo $data['id'] ?>" />
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user'] ?>" />


                    <td> </td>

                    <td><a href="home.php"></a><button class="btn btn-danger" name="book" type="submit">Book now!</button>
                    </td>
                </tr>
            </table>
            <a href="../products/index.php"><button class="btn btn-warning" type="button">Back</button></a>
        </form>
    </fieldset>
</body>

</html>