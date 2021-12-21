<?php
session_start();

// if (isset($_SESSION['user']) != "") {
//    header("Location: ../home.php");
//    exit;
// }

// if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
//    header("Location: ../index.php");
//    exit;
// }


require_once '../components/db_connect.php';

if ($_GET['id']) {
   $id = $_GET['id'];
   $sql = "SELECT *
   FROM booking
   JOIN products on products.id = booking.fk_productsId
   JOIN user on user.id = booking.fk_userId
   WHERE bookingId = {$id}";
   $result = mysqli_query($connect, $sql);
   $data = mysqli_fetch_assoc($result);
   if (mysqli_num_rows($result) == 1) {
    $product_picture = $data['picture'];
    $reservation_date = $data['reservation_date'];
    $time = $data['time'];
    $number_people = $data['number_people'];
    $productname = $data['name'];
   } else {
       header("location: error.php");
   }
   mysqli_close($connect);
} else {
   header("location: error.php");
}  
?>


<!DOCTYPE html>
<html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Delete Reservation</title>
       <?php require_once '../components/boot.php'?>
       <style type= "text/css">
           fieldset {
               margin: auto;
               margin-top: 100px;
               width: 70% ;
           }    
           .img-thumbnail{
               width: 70px !important;
               height: 70px !important;
           }    
       </style>
   </head>
   <body>
   <nav class="navbar navbar-expand-lg navbar">
      <div class="container-fluid">
         <a class="navbar-brand text-white fw-bold" href="index.php">Restaurant booking system</a>

      </div>
   </nav>
       <fieldset>
           <legend class='h2 mb-3'>Delete reservation</legend>
           <h5>You have selected the data below:</h5>
           <table class="table w-75 mt-3">
               <tr>
                    <th>Restaurant Name</th>
                    <td><?php echo $productname ?></td>
                </tr>
                <tr>
                    <th>Reservation Date</th>
                    <td><?=$reservation_date?></td>
                </tr>
                <tr>
                    <th>Time</th>
                    <td>
                            <?=$time?></td>
                </tr>
                <tr>
                    <th>Number of people</th>
                    <td><?= $number_people ?></td>
                </tr>
               </tr>
           </table>

           <h3 class="mb-4">Do you really want to delete thisreservation?</h3>
           <form action ="a_delete.php" method="post">
               <input type="hidden" name="id" value="<?php echo $id ?>" />
               <button class="btn btn-danger" type="submit">Yes, delete it!</button>
               <a href="../home.php"><button class="btn btn-warning" type="button">No, go back!</button></a>
           </form>
       </fieldset>
   </body>
</html>