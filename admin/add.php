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
		<?php 		
		if($_GET["crs-pass"])
		{
					$sql="select * from admin where username=:user";
							$stmt=$pdo->prepare($sql);
							$stmt->bindParam(':user',$param_user,PDO::PARAM_STR);
							$param_user=$_GET["crs-name"];
							
							$stmt->execute();
							if($stmt->rowCount()==1)
							{
		
						?>
        	<h1>ADMIN ALREADY EXISTS!!!</h1>
			<?php 
						}
						
						else
						{
							$sql1="insert into admin values(:user,:pass)";
							$stmt1=$pdo1->prepare($sql1);
							$stmt1->bindParam(':user',$param_user,PDO::PARAM_STR);
							$param_user=$_GET["crs-name"];
							$stmt1->bindParam(':pass',$param_pass,PDO::PARAM_STR);
							$param_pass=$_GET["crs-pass"];
							
							$stmt1->execute();
							
			?>
			<h1>Admin Added!!!</h1>
						<?php }
		}
		else
		{
			?>
			<h1>Could Not Add Admin...
			Fields are empty!!!</h1>
						<?php 
		}?>
      	</div>
		<br><br>
      	<div class="mid" id="yo">
      		<a href="addadmin.php" id="submit" style="margin-top: 30px;">Add New Admin...</a>
			</div>
    </div>
	 
</body>
</html>