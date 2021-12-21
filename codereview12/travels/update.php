<?php
require_once '../components/db_connect.php';

if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM travel WHERE id = {$id}";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
        $locationName = $data['locationName'];
        $price = $data['price'];
        $picture = $data['picture'];
        $description = $data['description'];
        $longitude = $data['longitude'];
        $latitude = $data['latitude'];
        $duration = $data['duration'];
        $continent = $data['continent'];
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
    <?php require_once '../components/boot_css.php' ?>
    <style type="text/css">
        fieldset {
            margin: auto;
            margin-top: 5vw;
            margin-bottom: 5vw;
            width: 50%;
            min-width: 300px;
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
        <img class='img-thumbnail' src='pictures/<?php echo $picture ?>' alt="<?php echo $locationName ?>">
        <form action="actions/a_update.php" method="post" enctype="multipart/form-data">
            <table class="table">
                <tr>
                    <th>Location name</th>
                    <td><input class="form-control" type="text" name="locationName" placeholder="Location Name" value="<?php echo $locationName ?>" /></td>
                </tr>
                <tr>
                    <th>Continent</th>
                    <td>
                        <select class="form-select" aria-label="continent" name="continent" value="<?php echo $continent ?>">
                            <option selected><?php echo $continent ?></option>
                            <option value="Europe">Europe</option>
                            <option value="Africa">Africa</option>
                            <option value="North America">North America</option>
                            <option value="South America">South America</option>
                            <option value="Asia">Asia</option>
                            <option value="Australia">Australia</option>
                    </select>
                    </td>
                </tr>
                <tr>
                    <th>price</th>
                    <td><input class="form-control" type="text" name="price" placeholder="price" value="<?php echo $price ?>" /></td>
                </tr>
                <tr>
                    <th>duration</th>
                    <td><input class="form-control" type="text" name="duration" placeholder="duration" value="<?php echo $duration ?>" /></td>
                </tr>
                <tr>
                    <th>latitude</th>
                    <td><input class="form-control" type="text" name="latitude" placeholder="latitude" value="<?php echo $latitude ?>" /></td>
                </tr>
                <tr>
                    <th>longitude</th>
                    <td><input class="form-control" type="text" name="longitude" placeholder="longitude" value="<?php echo $longitude ?>" /></td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td><textarea class="form-control" type="text" name="description" placeholder="Description" rows="3"><?php echo $description ?></textarea></td>
                </tr>
                <tr>
                    <th>Picture</th>
                    <td><input class="form-control" type="file" name="picture" /></td>
                </tr>

            </table>
            <input type="hidden" name="id" value="<?php echo $data['id'] ?>" />
            <input type="hidden" name="picture" value="<?php echo $data['picture'] ?>" />
            <td><button class="btn submit mb-3" type="submit">Save Changes</button></td><br>
            <td><a href="../index.php"><button class="btn back" type="button">Back</button></a></td>
        </form>
    </fieldset>
</body>

</html>