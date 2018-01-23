<?php
require("connect.php");
$postdata = file_get_contents("php://input");

if (isset($postdata) && !empty($postdata)){
   
    $request  = json_decode($postdata);
    var_dump($postdata);
    $name = $_POST['Name'];
    $location = $_POST['Location'];
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

