<?php 


// Function for delivering a JSON response
function response_all($status,$status_message,$data = null){
     
    // $response array
    $response['status']=$status;
    $response['status_message']=$status_message;
    $response['data']= $data;
 
    //Generating JSON from the $response array
    $json_response=json_encode($response);
 
    // Outputting JSON to the client
    echo $json_response;
 }

?>