<?php
require_once '../components/db_connect.php';

if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM travel WHERE id = {$id}";
    $result = mysqli_query($connect, $sql);
    $data = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) == 1) {
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
    <title>Delete tour</title>
    <?php require_once '../components/boot_css.php' ?>
    <style type="text/css">
        fieldset {
            margin: auto;
            margin-top: 30px;
            width: 50%;
            min-width: 250px;
            text-align: center;
        }

        .travelcard {
            margin: auto;
        }

    </style>
</head>

<body>
    <fieldset>
        <legend class='h1 mb-3 fw-bold'> Delete request </legend>
        <h4 class="mb-3">You have selected the data below:</h4>

        <div class="col-lg-8 col-md-8 col-sm-12 travelcard">
            <div class="card border-0 shadow travelc">
                <img src="pictures/<?php echo $picture ?>" class="card-img-top" alt="travel">
                <div class="card-body">
                    <h4 class="card-title text-center"><?php echo  $locationName ?></h4>
                    <h6 class="card-text text-center mb-2">Duration: <?php echo  $duration ?></h6>
                    <h6 class="card-text text-center mb-2">Price: <?php echo  $price ?> €</h6>
                    <p class="card-text text-center mb-2"><?php echo  $description ?></p>
                </div>

            </div>
        </div>

        <h3 class="mb-4 mt-3">Do you really want to delete this product? </h3>
        <form action="actions/a_delete.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id ?>" />
            <input type="hidden" name="picture" value="<?php echo $picture ?>" />
            <button class="btn btn-danger" type="submit"> Yes, delete it! </button>
            <a href="../index.php">
                <button class="btn btn-warning" type="button"> No, go back! </button>
            </a>
        </form>
    </fieldset>
</body>

</html>