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
<html>
<head>
  <title>Edit information</title>
  <?php require_once '../components/boot.php'?>
  <style type= "text/css">
      fieldset {
           margin: auto;
           margin-top: 5vw;
           margin-bottom: 5vw;
           width: 50% ;
           min-width: 250px;
           text-align: center;
       }  
       .img-thumbnail {
           margin-top: 3vw;
           width: 20vw;
           min-width: 250px;
           text-align: center;
       }
       .submit {
            background-color: #F54748;
            color: white;
        }

        .back {
            color: white;
            background-color: #FFA900;
        }
        
  </style>
</head>
<body>
<fieldset>
  <legend class='h2'>Update request </legend>
  <img class='img-thumbnail' src='pictures/<?php echo $picture ?>' alt="<?php echo $name ?>">
  <form action="actions/a_update.php" method="post" enctype="multipart/form-data">
      <table class="table">
          <tr>
              <th>Name</th>
              <td><input class="form-control" type="text"  name="name" placeholder ="Product Name" value="<?php echo $name ?>"  /></td>
          </tr>
          <tr>
              <th>Location</th>
              <td><input class="form-control" type= "text"  name="location"  placeholder="location" value ="<?php echo $location ?>" /></td>
          </tr>
          <tr>
              <th>size</th>
              <td><input class="form-control" type= "text"  name="size"  placeholder="size" value ="<?php echo $size ?>" /></td>
          </tr>
          <tr>
              <th>age</th>
              <td><input class="form-control" type= "number"  name="age"  placeholder="age" value ="<?php echo $age ?>" /></td>
          </tr>
          <tr>
              <th>hobbies</th>
              <td><input class="form-control" type= "text"  name="hobbies"  placeholder="hobbies" value ="<?php echo $hobbies ?>" /></td>
          </tr>
          <tr>
              <th>breed</th>
              <td><input class="form-control" type= "text"  name="breed"  placeholder="breed" value ="<?php echo $breed ?>" /></td>
          </tr>
          <tr>
                    <th>Description</th>
                    <td><textarea class="form-control" type="text" name="description" placeholder="Description" rows="3"><?php echo $description ?></textarea></td>
                </tr>
          <tr>
              <th>Picture</th>
              <td><input class="form-control" type="file" name= "picture" /></td>
          </tr>
          <tr>
                    <div class="form-check form-check-inline">
                        <th>Status</th>

                        <td>
                            <input class="form-check-input" type="radio" name="status" value="not adopted" <?php if ($status == "not adopted") { echo "checked"; } ?>>
                            <label class="form-check-label" for="inlineRadio1">not adopted</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" value="adopted" <?php if ($status == "adopted") { echo "checked";} ?>>
                        <label class="form-check-label" for="inlineRadio2">adopted</label>
                    </div>
                    </td>
                    </div>
                </tr>
      </table>
      <input type="hidden" name="id" value="<?php echo $data['pet_id'] ?>" />
              <input type="hidden" name="picture" value="<?php echo $data['picture'] ?>" />
              <td><button class="btn submit mb-3" type="submit">Save Changes</button></td><br>
              <td><a href="../index.php"><button class="btn back" type="button">Back</button></a></td>
  </form>
</fieldset>
</body>
</html>