<?php
require("connect.php");
$postdata = file_get_contents("php://input");

if (isset($postdata) && !empty($postdata)){
    $request  = json_decode($postdata);
    echo "hello var data";
    var_dump($request);
    $name = $request['Name'];
    $location = $request['Location'];
    $category = $request['Category'];
    $photo = $request['Photo'];
    $description = $request['Description'];
    $email = $request['Email'];
    $contact = $request['Contact'];
    $flag = $request['Flag'];

    $sql = "INSERT INTO tenant (name,location,category,photo,description, email,contact,flag)
            VALUES ($name, $location, $category, $photo, $description, $email,$contact,$flag)";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
 
}
$conn->close();

?>

