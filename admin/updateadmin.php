<?php
require_once 'config/config.php';
// Initialize the session
session_start();
if(!isset($_SESSION["username"]) || empty($_SESSION["username"]))
	{
		header("location: index2.php");
	exit;
}
$sql1="update course set coursename=:x,course_desc=:y,linker=:p,free=:f where code=:id";
						$stmt1=$pdo1->prepare($sql1);
							$stmt1->bindParam(':x',$param_x,PDO::PARAM_STR);
							$param_x=$_POST["crs-name"];
							$stmt1->bindParam(':y',$param_y,PDO::PARAM_STR);
							$param_y=$_POST["crs-desc"];
							$stmt1->bindParam(':p',$param_p,PDO::PARAM_STR);
							$param_p=$_POST["crs-link"];
							$stmt1->bindParam(':f',$param_f,PDO::PARAM_STR);
							$param_f=$_POST["crs-avai"];
							
							$stmt1->bindParam(':id',$param_id,PDO::PARAM_STR);
							$param_id=$_POST["id"];
							
							
							$stmt1->execute();
						

?>

<!DOCTYPE html>
<html>
<head>
	<title>Finish-course</title>
	<link rel="stylesheet" type="text/css" href="mainpage_style.css">
	<link href="https://fonts.googleapis.com/css?family=Prompt|Work+Sans|Questrial|IBM+Plex+Sans" rel="stylesheet">
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
    	<div class="heading">
		
        	<h1>COURSE UPDATED!!!</h1>
			
      	</div>
		<br><br>
      	<div class="mid" id="yo">
      		<a href="admin.php" id="submit" style="margin-top: 30px;">Go To Home...</a>
			</div>
    </div>
</body>
</html>