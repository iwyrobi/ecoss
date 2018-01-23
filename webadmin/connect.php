<?

define("dbHost","localhost");
define("dbUname","root");
define("dbPass","");

function connect(){


// Create connection
$conn = new mysqli_connect($dbHost, $dbUname, $dbPass);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

return $conn;

}
?>