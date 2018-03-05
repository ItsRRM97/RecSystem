<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rank";

// Create connection
$conn = mysqli_connect("localhost","root","","rank");

// Check connection
if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
} 
$user = $_POST["username"];
$pass = $_POST["password"];

$sql = "SELECT username,password FROM user";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if($row["username"]==$user && $row["password"]==$pass)
    echo "You are a validated user.";
else
    echo"Sorry, your credentials are not valid, Please try again.";
    }
} else {
    echo "0 results";
}
$conn->close();

?>
