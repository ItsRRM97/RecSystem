<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = mysqli_connect("localhost","root","","test");

// Check connection
if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
} 
$r=$_SESSION["code"];
$result= mysqli_query($conn,"SELECT * FROM course where code=$r");

$rating=$_POST["q"];
  if(!empty($rating))
{
    while($v=mysqli_fetch_assoc($result)) {
    $userrate=$v["user_rating"];
    $count=$v["total_people"];
    $count=$count+1;
    $userrate=$userrate+$rating;
    $avg=$userrate/$count;
    $query="UPDATE course SET user_rate_sum=$userrate,user_rating=$avg,total_people=$count WHERE code=$r"; 
    if ($conn->query($query) === TRUE) {
    echo "Record updated successfully";
}
}
}
else
{
header("Location:rating.php");
}
$conn->close();
?>