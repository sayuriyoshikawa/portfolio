<?PHP
session_start();
require_once "../components/db_connect.php";



$description= "";
if ($_POST) {
    $pet_id = $_POST["pet_id"];
    $user_id = $_POST["user_id"];
    $date = date("Y-m-d", strtotime($_POST['date']));
    $description = $_POST["description"];

    $sql = "INSERT INTO pet_adoption (`fk_user_id`, `fk_pet_id`, `adoption_date`,`adoption_description`) VALUES ('$user_id','$pet_id', '$date', '$description')";

    $sql2 = "UPDATE pet SET pet_status ='adopted' WHERE pet_id = $pet_id";

    
    if (mysqli_query($connect, $sql) && mysqli_query($connect, $sql2)) {

        $message = "Thank you!<br> We are looking forward to seeing you!";
    } 
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
        h1 {
            text-align: center;
            margin-top: 40vh;
            color: rgb(79, 35, 13);
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1><?= $message ?></h1>
        <center><a href="../home.php"><button class='btn btn-danger mt-4' type="button">Home</button></a></center>
    </div>
</body>

</html>