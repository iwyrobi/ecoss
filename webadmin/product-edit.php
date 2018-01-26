<?php
require("connect.php");
$postdata = file_get_contents("php://input");

if (isset($postdata) && !empty($postdata)){
     
    $request  = json_decode($postdata);    
    $id = $request->Id;
    $name = $request->Name;
    $location = $request->Location;
    $category = $request->Category;
    $photo = $request->Photo;
    $description = $request->Description;
    $email = mysqli_real_escape_string($conn,$request->Email);
    $contact = $request->Contact;
    $flag = $request->Flag;

    $sql = "UPDATE tenant SET 
                   name='$name',
                   location=$location,
                   category=$category,
                   photo = '$photo',
                   description='$description',
                   email = '$email',
                   contact = '$contact',
                   flag = $flag
                   WHERE id=$id";

    //$sql = "INSERT INTO tenant (name,location,category,photo,description,email,contact,flag)
    //        VALUES ('$name', $location, $category, '$photo', '$description','$email','$contact',$flag)";

    if ($conn->query($sql) === TRUE) {
        echo "Record Update successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
 
}
$conn->close();

?>

