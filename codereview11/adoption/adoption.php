<?php
session_start();
require_once '../components/db_connect.php';

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: ../index.php");
    exit;
}

if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM pet WHERE pet_id = {$id}";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
        $name = $data['pet_name'];
        $picture = $data['picture'];
    } else {
        header("location: error.php");
    }
} else {
    header("location: error.php");
}


$connect->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once '../components/boot.php' ?>
    <title>Add animalinfo</title>
    <style>
        fieldset {
            margin: auto;
            margin-top: 5vw;
            margin-bottom: 5vw;
            width: 60%;
            color: rgb(79, 35, 13);
        }
        th {
            width: 40%;
            text-align: center;
            color: rgb(79, 35, 13);
        }
        .take {
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
        <center><legend class='h2 mb-3'>Adoption form</legend>
        <img class='img-thumbnail border-0' src='../animals/pictures/<?php echo $picture ?>' alt="<?php echo $name ?>"></center>
        <form action="a_adoption.php" method="post" enctype="multipart/form-data">
            <table class="table mt-5">
                <tr>
                    <th>Name</th>
                    <td><?php echo $name ?></td>
                    </tr>
               <tr>
                    <th>Date</th>
                    <td><input class='form-control mt-3' type="date" name="date" required>
                    </td>
                </tr>
                <tr>
                       <th>If you have requirement or question, please feel free to write us. We can help you!</th>
                       <td><textarea class="form-control" type="text" name="description"  placeholder="Description" rows="3"></textarea></td>
                   </tr>
                
            </table>
                    <center>
                    <input type="hidden" name="pet_id" value="<?php echo $data['pet_id'] ?>" />
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user'] ?>" />
                    <td><button class="btn take" name="adoption" type="submit">Submit</button><br><br>
                    <a href="../home.php"><button class="btn back" type="button">Back</button></a>
                </center>
            
        </form>
    </fieldset>
</body>