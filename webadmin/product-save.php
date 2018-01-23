<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if (if ($_SERVER["REQUEST_METHOD"] == "POST")){

    $name = $_POST["name"];
    $location = $_POST["location"];
    $category = $_POST["category"];
    $photo = $_POST["photo"];
    $description = $_POST["description"];
    $email = $_POST["email"];
    $kontak = $_POST["kontak"];

    $sql = "INSERT INTO tenant (name,location,category,photo,description, email,kontak)
            VALUES ($name, $location, $category, $photo, $description, $email,$kontak)";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();

?>

