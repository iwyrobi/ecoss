<?php
//header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");

//require "connect.php";

/*
$conn = connect();

$tenant = array();

$sql = "select * from tenant";

if ($result = mysqli_query($conn,$sql)){
    $count = mysqli_num_row($result);

    $cr =0;
    while($row = mysqli_fetch_assoc($result)){
        $tenant[$cr]['id'] = $row['id'];
        $tenant[$cr]['name'] = $row['name'];
        $tenant[$cr]['location'] = $row['location'];
        $tenant[$cr]['category'] = $row['category'];
        $tenant[$cr]['photo'] = $row['photo'];
        $tenant[$cr]['description'] = $row['description'];
        $tenant[$cr]['email'] = $row['email'];
        $tenant[$cr]['contact'] = $row['contact'];
        $tenant[$cr]['flag'] =  $row['flag'];
        $cr++;
    }

}
$json = json_encode($tenant);
exit;
*/
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//$conn = new mysqli("localhost", "root", "", "ecoss");

require("connect.php");
$result = $conn->query("SELECT * FROM tenant");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"Id":"'  . $rs["id"] . '",';
    $outp .= '"Name":"'   . $rs["name"]        . '",';
    $outp .= '"Location":"'   . $rs["location"]        . '",';
    $outp .= '"Category":"'   . $rs["category"]        . '",';
    $outp .= '"Photo":"'   . $rs["photo"]        . '",';
    $outp .= '"Description":"'   . $rs["description"]        . '",';
    $outp .= '"Email":"'   . $rs["email"]        . '",';
    $outp .= '"Contact":"'   . $rs["contact"]        . '",';
    $outp .= '"Flag":"'. $rs["flag"]     . '"}';
  
}
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);
?>