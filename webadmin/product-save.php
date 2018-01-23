<?php


if (if ($_SERVER["REQUEST_METHOD"] == "POST")){

    $name = $_POST["name"];
    $location = $_POST["location"];
    $category = $_POST["category"];
    $photo = $_POST["photo"];
    $description = $_POST["description"];
    $email = $_POST["email"];
    $contact = $_POST["contact"];
    $flag = $_POST["flag"];

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

