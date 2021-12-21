<?PHP
session_start();
require_once "../components/db_connect.php";

if($_POST){
    $product_id = $_POST["product_id"];
    $user_id= $_POST["user_id"];
    $date = date("Y-m-d", strtotime($_POST['date']));
    $time = $_POST["time"];
    $number = $_POST["number"];

    $sql = "INSERT INTO `booking`(`fk_userId`, `fk_productsId`, `reservation_date`,`time`, `number_people`) VALUES ('$user_id','$product_id', '$date', '$time', '$number')";

    if(mysqli_query($connect, $sql)){
        $message = "Thank you for your booking!";
    };

}


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
        h1{
            text-align: center;
            margin-top: 40vh;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
    <h1><?= $message ?></h1>
    <center><a href="../index.php"><button class='btn btn-danger mt-4' type="button">Home</button></a></center>
</div>
</body>
</html>