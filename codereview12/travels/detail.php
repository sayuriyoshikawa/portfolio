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
}

//weather
require_once 'RESTful.php';

$city = "$latitude,$longitude";
$url = 'https://api.darksky.net/forecast/e329256a741df2bcccffedd3600287c2/' . $city . '?exclude=minutely,hourly,daily,alerts,flags';
$result = curl_get($url);
$weather = json_decode($result); //it turns the json into an object
$fahrenheit = $weather->currently->temperature; //fetch the value from the temperature option
$celsius = round(($fahrenheit - 32) * (5 / 9), 2); //convert fahrenheit into celsius

$whetherbody = "
                    <div class='card text-center text-white bg-primary' style='width: 18rem; font-size: 1.2rem'>
                        <p class='card-title'> {$weather->timezone} </p>
                        <div class='card-body'>
                            <p class='card-text'> {$weather->currently->summary} </p>
                            <p class='card-text'>{$celsius}°C</p>
                            <p class='card-text'>{$fahrenheit}°F</p>
                        </div>
                    </div>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel information</title>
    <?php require_once '../components/boot_css.php' ?>
    <style type="text/css">
        .hero {
            width: 98.6vw;
            height: 100vh;
            background-image: url("pictures/detailbg.jpg");
            background-size: cover;
        }

        .herorow {
            width: 98vw;
        }

        .left {
            background-color: rgba(221, 221, 221, 0.07);
            backdrop-filter: blur(2px);
            height: 100vh;
            position: relative;
        }

        .left h1 {
            width: 95%;
            position: absolute;
            top: 10%;
            left: 5%;
            color: rgba(240, 240, 240, 0.95);
            font-size: calc(35px + 2vw);
            text-shadow: 1px 1px 3px #fff5be;
        }

        .left h5 {
            position: absolute;
            top: 50%;
            left: 5%;
            font-size: calc(15px + 1.5vw);
            color: rgba(240, 240, 240, 0.95);
            text-shadow: 1px 1px 3px #fff5be;
        }

        .container {
            margin-top: 5vw;
            margin-bottom: 5vw;
            width: 80vw;
            min-width: 300px;
            color: rgb(79, 35, 13);
        }

        .card {
            margin: auto;
            width: 35vw;
            min-width: 250px;
            color: rgb(79, 35, 13);
            text-align: center;
        }

        .take {
            background-color: #DF5E5E;
            color: white;
        }

        #map {
            width: 30vw;
            height: 30vw;
            min-width: 250px;
            min-height: 250px;
        }

        #weather {
            width: 20vw;
            height: 20vw;
        }
        .weatherbtn {
            border-radius: 8px;
            background: #e4d9f2;
            box-shadow:  20px 20px 60px #c2b8ce,
             -20px -20px 60px #fffaff;
        }
        footer {
            margin-top: 5vw;
            color: white;
            text-shadow: 1px 2px 3px rgba(255, 248, 211);
            height: 100px;
            background-image: url("pictures/travelbg.jpg");
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
    </style>
</head>

<body>
    <!-- hero -->
    <div class="hero">
        <div class="row herorow">
            <div class="col-lg-5 col-md-5 col-sm-5 left">
                <h1>Go to <?= $locationName ?></h1>
                <h5><?= $description ?></h5>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8"></div>
        </div>
    </div>


    <div class="container">
        <div class="row g-5">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="card border-0">
                <img src="pictures/<?= $picture ?>" class="card-img-top" alt="animal">
                <div class="card-body">
                    <h1 class="card-title text-center"> <?= $locationName ?></h1>
                    <h4 class="card-subtitle mb-2 mt-3">Price: <?= $price ?></h4>
                    <h4 class="card-subtitle mb-2">Duration: <?= $duration ?></h4>
                    <h5 class="card-text"><?= $description ?></h5>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div id="map"></div>
            <button class="btn m-3 weatherbtn" id="btn">Weather</button>
            <div id="weather"></div>

        </div>
        </div>
    </div>
    <footer>
        <h2>Mount Everest</h2>
    </footer>

    <script>
        //map
        var map;

        function initMap() {
            var <?= $locationName ?> = {
                lat: <?= $latitude ?>,
                lng: <?= $longitude ?>
            };
            map = new google.maps.Map(document.getElementById('map'), {
                center: <?= $locationName ?>,
                zoom: 8

            });

            var pinpoint = new google.maps.Marker({
                position: <?= $locationName ?>,
                map: map
            });
        }

        //whether
        document.getElementById("btn").addEventListener("click", show);

        function show() {
            console.log("<? echo $whetherbody ?>")
            document.getElementById("weather").innerHTML = `<?php echo $whetherbody; ?>`;
        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtjaD-saUZQ47PbxigOg25cvuO6_SuX3M&callback=initMap" async defer>

    </script>
</body>


</html>