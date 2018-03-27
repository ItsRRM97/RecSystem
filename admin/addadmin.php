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
      <form class="sub-form" method="post" action="add.php" >
	 
	    <label for="crs-name">
          Username : 
        </label>
        <input type="text" name="crs-user"  id="crs-user" required>
		    
		 <label for="crs-code">
          Password : 
        </label>
        <input type="password" name="crs-user"  id="crs-pass" required>
		   
		
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
		
			
			var url = "add.php?crs-name=" + encodeURIComponent($("#crs-user").val())+"&crs-pass=" + encodeURIComponent($("#crs-pass").val());
            window.location.href = url;
		
		 });
  });

</script>
 

</body>
</html>