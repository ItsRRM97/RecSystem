<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$conn = new PDO('mysql:host=127.0.0.1;dbname=test','root','');

// Check connection
if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
} 
else
{
$search = $_GET['q'];
$searche = explode(" ", $search);
$x = 0;
$construct = "";
$params = array();

foreach ($searche as $term) {
	$x++;
	if ($x == 1) {
		$construct .= "coursename LIKE CONCAT('%',:search$x,'%') OR code LIKE CONCAT('%',:search$x,'%') OR link LIKE CONCAT('%',:search$x,'%')";
	} else {
		$construct .= " AND coursename LIKE CONCAT('%',:search$x,'%') OR code LIKE CONCAT('%',:search$x,'%') OR link LIKE CONCAT('%',:search$x,'%')";
	}
	$params[":search$x"] = $term;
}

$results = $conn->prepare("SELECT * FROM `course` WHERE $construct ORDER BY user_rating DESC");
$results->execute($params);
if ($results->rowCount() == 0) {
	echo "No Results found! <hr>";
} else {
	echo $results->rowCount()." results found! <hr>";
        foreach ($results->fetchAll() as $result) {
        echo "<form action='des.php' method='post'>";
        echo $result["coursename"]."&emsp;"."&emsp;".$result["link"]."&emsp;"."&emsp;".$result["user_rating"]."&emsp;"."&emsp;".$result["our_rating"];
        $j=$result["code"];
	echo "<button name='zero' value=$j>"."click"."</button>";
        echo "</form>";
	echo "<hr>";
}
}
}