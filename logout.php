<?php
// Initialize the session
session_start();
 
// Unset all of the session variables
$_SESSION = array();
// $path='C:\xampp\htdocs\Course';
// Destroy the session.
session_destroy();

header("location:index2.php");
exit;
?>
PREVIOUS PAGE