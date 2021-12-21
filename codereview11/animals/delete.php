<?php
session_start();

if (isset($_SESSION['user']) != "") {
   header("Location: ../home.php");
   exit;
}

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
   header("Location: ../index.php");
   exit;
}


require_once '../components/db_connect.php';

if ($_GET['id']) {
  $id = $_GET['id'];
  $sql = "SELECT * FROM pet WHERE pet_id = {$id}" ;
  $result = $connect->query($sql);
  $data = $result->fetch_assoc();
  if ($result->num_rows == 1) {
   $name = $data['pet_name'];
       $location = $data['location'];
       $size = $data['size'];
       $age = $data['age'];
       $hobbies = $data['hobbies'];
       $breed = $data['breed'];
       $pet_status = $data['pet_status'];
       $picture = $data['picture'];
       $description = $data["description"];
       $status = $data["pet_status"];
} else {
   header("location: error.php");
}
$connect->close();
} else {
header("location: error.php");
}  
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Delete User</title>
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
<fieldset>
<legend class='h2 mb-3'>Delete request <img class='img-thumbnail rounded-circle' src='pictures/<?php echo $picture ?>' alt="<?php echo $name ?>"></legend>
<h5>You have selected the data below:</h5>
<table class="table w-75 mt-3">
<tr>
           <td><?php echo $name?></td>
</tr>
</table>

<h3 class="mb-4">Do you really want to delete this product?</h3>
<form action ="actions/a_delete.php" method="post">
  <input type="hidden" name="id" value="<?php echo $id ?>" />
  <input type="hidden" name="picture" value="<?php echo $picture ?>" />
  <button class="btn btn-danger" type="submit">Yes, delete it!</button >
  <a href="../dashBoard.php"><button class="btn btn-warning" type="button">No, go back!</button></a>
</form>
</fieldset>
</body>
</html>