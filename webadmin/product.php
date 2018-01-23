<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require "connect.php";


$conn = connect();

$tenant = array();

$sql = "select * from tenant";

if ($result = mysqli_query($conn,$sql)){
    $count = mysqli_num_row($result);

    $cr =0;
    while($row = mysqli_fetch_assoc($result)){
        $tenant[$cr]['id'] = $row['id'];
        $tenant[$cr]['name'] = $row['name'];
        $tenant[$cr][''] = $row['name'];
        $cr++;
    }

}

?>