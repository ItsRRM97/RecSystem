<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rank";

// Create connection
//$conn = new mysqli($servername, $username, $password);
$conn = mysqli_connect("localhost","root","","rank");

// Check connection
if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
} 
else
{
$name = $_POST["name"];
$username = $_POST["username"];
$password = $_POST["password"];
$email = $_POST["email"];
$sql = "INSERT INTO user (name,username,password, email)
VALUES ('$name','$username','$password','$email')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

$conn->close();
?>
