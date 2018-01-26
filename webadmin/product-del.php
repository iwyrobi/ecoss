<?php
require("connect.php");

if (isset($_GET['del'])){
     
    $id = $_GET['del'];
    
    echo $id;

    $sql = "DELETE FROM tenant WHERE tenant.id = $id";

  
    if ($conn->query($sql) === TRUE) {
        echo "Record Update successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
 
}
$conn->close();

?>

