<?php
require_once '../components/db_connect.php';
// Set Content-Type header to application/json
// header("Content-Type:application/json");
$responce = array();

if ($connect) {
    $sql = "SELECT * FROM travel";
    $result = mysqli_query($connect, $sql);
    if($result){
        header("Content-Type:application/json");
        $i = 0;
        while($row = mysqli_fetch_assoc($result)){
            $responce[$i]['id'] = $row['id'];
            $responce[$i]['locationName'] = $row['locationName'];
            $responce[$i]['price'] = $row['price'];
            $responce[$i]['longitude'] = $row['longitude'];
            $responce[$i]['latitude'] = $row['latitude'];
            $responce[$i]['description'] = $row['description'];
            $responce[$i]['duration'] = $row['duration'];
            $responce[$i]['continent'] = $row['continent'];
            $responce[$i]['picture'] = $row['picture'];
            $i++;
        }
        echo json_encode($responce, JSON_PRETTY_PRINT);
    }
} else { 
    echo "Database connection failed";
}
?>