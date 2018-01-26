<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require("connect.php");

if (isset($_GET['loc'])) {
    $result = $conn->query("SELECT * FROM location");

    $outp = "";
    while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
        if ($outp != "") {$outp .= ",";}
        $outp .= '{"Id":"'  . $rs["id"] . '",';
        $outp .= '"Location":"'   . $rs["location"]        . '",';
        $outp .= '"Level":"'. $rs["level"]     . '"}';
      
    }
    $outp ='{"records":['.$outp.']}';
    echo($outp);

}

if (isset($_GET['cat'])) {
    $result = $conn->query("SELECT * FROM category");

    $outp = "";
    while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
        if ($outp != "") {$outp .= ",";}
        $outp .= '{"Id":"'  . $rs["id"] . '",';
        $outp .= '"Category":"'. $rs["category"]     . '"}';
      
    }
    $outp ='{"records":['.$outp.']}';
    echo($outp);

}

if (isset($_GET['list'])){

$result = $conn->query("SELECT tenant.*, location.location as tloc, category.category as tcat
FROM tenant  LEFT OUTER JOIN location ON tenant.location = location.id
LEFT OUTER JOIN category ON tenant.category = category.id
ORDER BY tenant.id");

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
    $outp .= '"Tloc":"'   . $rs["tloc"]        . '",';
    $outp .= '"Tcat":"'   . $rs["tcat"]        . '",';
    $outp .= '"Flag":"'. $rs["flag"]     . '"}';
  
}
$outp ='{"records":['.$outp.']}';
echo($outp);
}



if (isset($_GET['id'])){
$result = $conn->query("SELECT tenant.*, location.location as tloc, category.category as tcat
    FROM tenant  LEFT OUTER JOIN location ON tenant.location = location.id
    LEFT OUTER JOIN category ON tenant.category = category.id
    where tenant.id = ". $_GET["id"] ."
    ORDER BY tenant.id");
    
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
        $outp .= '"Tloc":"'   . $rs["tloc"]        . '",';
        $outp .= '"Tcat":"'   . $rs["tcat"]        . '",';
        $outp .= '"Flag":"'. $rs["flag"]     . '"}';
      
    }
    $outp ='{"records":['.$outp.']}';
    echo($outp);
    }
    

$conn->close();
?>