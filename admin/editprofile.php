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
?>
<!DOCTYPE html>
<html>
<head>
  <title>Add Course</title>
  <link rel="stylesheet" type="text/css" href="addstyle.css">
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

	<?php
	$sql1="SELECT * from course where code= :idname";
					$stmt1=$pdo1->prepare($sql1);
					$stmt1->bindParam(':idname',$param_id,PDO::PARAM_STR);
					$param_id=$_GET["id"];

					$stmt1->execute();

					if($stmt1->rowCount()==1)
					{
						$row1=$stmt1->fetch();
?>
    <div class="container">
      <form class="sub-form" method="post" action="updateadmin.php" >
	  <input type="hidden" name="id" value="<?php echo $row1["code"];?>" >
        <label for="crs-name">
          Course Name : 
        </label>
        <input type="text" name="crs-name" value="<?php echo $row1["coursename"];?>" id="crs-name">
		<label for="crs-desc">
          Course Desc : 
        </label>
        <input type="text" name="crs-desc" value="<?php echo $row1["course_desc"];?>" id="crs-desc">
        <label for="crs-link">
          Course Link : 
        </label>
        <input type="text" name="crs-link" value="<?php echo $row1["linker"];?>" id="crs-link">
		<label for="crs-avai">
          Make Available: 
        </label>
        <input type="text" name="crs-avai" value="<?php echo $row1["free"];?>" id="crs-avai">

        <input type="submit" name="submit" value="Save Changes" id="add-crs">
      </form>
    </div>
					<?php
					}
					?>
					 <script type="text/javascript" src="StarRating.js"></script>
 

</body>
</html>