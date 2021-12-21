<?php 
require_once '../../components/db_connect.php';

if  ($_POST) {
   $id = $_POST['id'];
   $picture = $_POST['picture'];
   ($picture == "travel.png")?: unlink("../pictures/$picture");

   $sql = "DELETE FROM travel WHERE id = {$id}" ;
   if (mysqli_query($connect, $sql) === TRUE) {
       $class = "success";
       $message = "Successfully Deleted!";
   } else  {
       $class = "danger";
       $message = "The entry was not deleted due to: <br>"  . $connect->error;
   }
   mysqli_close($connect);
} else {
   header("location: ../error.php" );
}
?>


<!DOCTYPE html>
<html lang= "en">
   <head>
        <meta charset="UTF-8">
        <title>Delete</title>
        <?php require_once '../../components/boot_css.php'?> 
        <style>
            .container {
                text-align: center;
                width: 40%;
                min-width: 250px;
                margin-top: 30vh;
            }
        </style>
    </head>
   <body>
        <div class="container">
            <div class="mt-5 mb-5">
                <h1>Delete request response</h1>
           </div>
            <div class="alert alert-<?=$class;?>"  role="alert">
                <p><?=$message;?></p>
               <a href ='../../index.php'><button class ="btn btn-success" type='button' >Home</button></a >
           </div>
       </div>
    </body>
</html >