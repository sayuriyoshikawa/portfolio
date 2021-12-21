<?php
session_start();
require_once '../components/db_connect.php';
if (isset($_SESSION['user']) != "") {
    header("Location: ../home.php");
    exit;
}

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: ../index.php");
    exit;
}
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
        <legend class='h2'>Add animal information</legend>
        <form action="actions/a_create.php" method="post" enctype="multipart/form-data">
            <table class="table">
                <tr>
                    <th>Name</th>
                    <td><input class="form-control" type="text" name="name" placeholder="Animal Name" required/></td>
                </tr>
                <tr>
                    <th>Location</th>
                    <td><input class="form-control" type="text" name="location" placeholder="location" required/></td>
                </tr>
                <tr>
                    <th>size</th>
                    <td><input class="form-control" type="text" name="size" placeholder="size" required/></td>
                </tr>
                <tr>
                    <th>age</th>
                    <td><input class="form-control" type="number" name="age" placeholder="age" required/></td>
                </tr>
                <tr>
                    <th>hobbies</th>
                    <td><input class="form-control" type="text" name="hobbies" placeholder="hobbies" required/></td>
                </tr>
                <tr>
                    <th>breed</th>
                    <td><input class="form-control" type="text" name="breed" placeholder="breed" required/></td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td><textarea class="form-control" type="text" name="description" placeholder="Description" rows="3"></textarea></td>
                </tr>
                <tr>
                    <th>Picture</th>
                    <td><input class="form-control" type="file" name="picture"/></td>
                </tr>
                <tr>
                    <div class="form-check form-check-inline">
                        <th>Status</th>
                        <td>
                            <input class="form-check-input" type="radio" name="status" value="not adopted" required>
                            <label class="form-check-label" for="inlineRadio1">not adopted</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" value="adopted" required>
                        <label class="form-check-label" for="inlineRadio2">adopted</label>
                    </div>
                    </td>
                </tr>
            </table>
            <td><button class='btn submit mb-3' type="submit">Insert information</button></td><br>
                    <td><a href="../dashBoard.php"><button class='btn back' type="button">Home</button></a></td>
        </form>
    </fieldset>
</body>

</html>