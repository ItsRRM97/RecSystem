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

if(isset($_POST['zero'])){
   $_SESSION["code"]=$_POST['zero'];
   header("Location:rating.php") ;
}
$conn->close();
?>