<?php

	require_once 'config/config.php';
								
		// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION["username"]) || empty($_SESSION["username"]))
	{
		header("location: index2.php");
	exit;
}

// If session variable is not set it will redirect to login page


?>
<!DOCTYPE html>
<html>
<head>
  <title>Add Course</title>
  <link rel="stylesheet" type="text/css" href="addstyle.css">
  <link rel="stylesheet" type="text/css" href="mainpage_style.css">
	
  <link href="https://fonts.googleapis.com/css?family=Prompt|Work+Sans" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="StarRating.css">
  <link rel="stylesheet" type="text/css" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

</head>
<body>
 <div class="navbar1">
      <ul>
        <li><a href="admin.php">Home</a></li>
       
		<li><a href="addcourse.php">Add Course</a>
          
        </li>
		<li><a href="addadmin.php">Add Admin</a>
          
        </li>
       <li><a href="\Course\logout.php">Log out</a></li>
      </ul>
    </div>

    <div class="container">
      <form class="sub-form" method="post" action="insert.php" >
	    <label for="crs-name">
          Course Name : 
        </label>
        <input type="text" name="crs-name"  id="crs-name" required>
		 <label for="crs-code">
          Course Code : 
        </label>
        <input type="text" name="crs-code"  id="crs-code" required>
		
		<label for="crs-desc">
          Course Desc : 
        </label>
        <input type="text" name="crs-desc"  id="crs-desc" required>
        <label for="crs-link">
          Course Link : 
        </label>
        <input type="text" name="crs-link"  id="crs-link" required>
		<label for="tot-people">
          Total People : 
        </label>
		<input type="number" name="tot-people"  id="tot-people" required>
        <label for="crs-rate">
          Rating :
        </label>
		<x-star-rating name="crs-rate" id="crs-rate" required></x-star-rating>
      	
<div class="mid" id="yo">
			<br>
      		<a href="#" id="submit" style="margin-top: 30px;">Submit</a>
			</div>
      </form>
    </div>
					<script type="text/javascript" src="StarRating.js"></script>
		
					 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script type="text/javascript">
  $(function () {
        $("#submit").bind("click", function () {
		
			
			var url = "insert.php?crs-name=" + encodeURIComponent($("#crs-name").val())+"&crs-code=" + encodeURIComponent($("#crs-code").val())+"&crs-desc=" + encodeURIComponent($("#crs-desc").val())+"&crs-link=" + encodeURIComponent($("#crs-link").val())+"&tot-people=" + encodeURIComponent($("#tot-people").val())+"&crs-rate=" + encodeURIComponent($("#crs-rate").val());
            window.location.href = url;
		
		 });
  });

</script>
 

</body>
</html>