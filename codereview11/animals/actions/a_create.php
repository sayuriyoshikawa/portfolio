<?php
session_start();

if (isset($_SESSION['user']) != "") {
   header("Location: ../../home.php");
   exit;
}

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
   header("Location: ../../index.php");
   exit;
}

require_once '../../components/db_connect.php';
require_once '../../components/file_upload.php';


if($_POST) {
    $name = $_POST["name"];
    $location = $_POST['location'];
    $description = $_POST["description"];
    $size = $_POST['size'];
    $age = $_POST['age'];
    $hobbies = $_POST['hobbies'];
    $breed = $_POST['breed'];
    $status = $_POST['status'];
    $uploadError = "";
    $picture = file_upload($_FILES['picture'], "animal");  

    
         $sql = "INSERT INTO pet (pet_name, picture, location, description, size, age, hobbies, breed, pet_status) VALUES ('$name', '$picture->fileName', '$location','$description', '$size', $age, '$hobbies', '$breed', '$status')";
      

    if(mysqli_query($connect, $sql) === true) {
        $class = "success";
        $message = "The entry below was successfully created <br>

        <table class='table'>
        <tr> <td> $name </td></tr>
        <tr> <td> $description </td></tr>
        <tr> <td> $location </td></tr>
        <tr> <td> $size </td></tr>
        <tr> <td> $age </td></tr>
        <tr> <td> $hobbies </td></tr>
        <tr> <td> $breed </td></tr>
        <tr> <td> $status </td></tr>
        </table><hr>";
        $uploadError = ($picture->error !=0)? $picture->ErrorMessage :'';
   } else {
       $class = "danger";
       $message = "Error while creating record. Try again: <br>" . $connect->error;
       $uploadError = ($picture->error !=0)? $picture->ErrorMessage :'';
   }
   mysqli_close($connect);
} else {
   header("location: ../error.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once '../../components/boot.php'?>
    <title>Document</title>
    <style>
        h1 {
            text-align: center;
        }
        .alert{
            background-color:#FFEEDB;
            width: 50vw;
            margin: auto;
        }
        table {
            width: 30%;
            min-width: 250px;
        }
    </style>
</head>
<body>
<div class="container">
           <div class="mt-3 mb-3">
               <h1>Create request response</h1>
           </div>
           <div class="alert" role="alert">
               <p><?php echo ($message) ?? ''; ?></p>
               <p><?php echo ($uploadError) ?? ''; ?></p>
               <a href='../../dashBoard.php'><button class="btn btn-danger" type='button'>Home</button></a>
           </div>
       </div>
</body>
</html>