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
	<div class="navbar1" >
      <ul style="padding-right: 20px;">
	  <li><a href="view.php" style="float: left;">Hi, <?php echo $_SESSION['username'];?></a>
</li>
 <li><a href="viewprofile.php">View Profile</a></li>
        
        <li><a href="userprofile.php">Edit Profile</a></li>
        <li><a href="#">My Courses</a>
          <ul>
		  <?php
			$sql="    SELECT course.coursename,course.code
      FROM course JOIN user_course
        ON course.code = user_course.code
     WHERE user_course.username=:username and user_course.status='In Progress'";
			$stmt=$pdo->prepare($sql);
			$stmt->bindParam(':username',$param_user,PDO::PARAM_STR);
			$param_user=$_SESSION["username"];
			$stmt->execute();
			$i=$stmt->rowCount();
			$ans="No Courses Taken..";
			if($i==0)
			{
			?>	<li><a href="#"><?php echo $ans;?></a></li><?php
			}
			else
			{
			while($i>0)
			{
				$row = $stmt->fetch();
		  ?>
            <li><a href="mainpage.php?id=<?php echo $row["code"];?>"><?php echo $row["coursename"];?></a></li>
			<?php
			$i--;
			}
			}
			?>
          </ul>
        </li>
        <li><a href="logout.php">Log out</a></li>
      </ul>
    </div>
    <div class="container">
    	<div class="heading">
        	<h1>Congratulations!!!</h1>
      	</div>
		
      	<div class="mid" id="yo">
      		<h1 style="padding-bottom: 30px;">Thank you for taking this course.</h1>
      		<a href="view.php" id="submit" style="margin-top: 30px;">View More Courses...</a>
			</div>
    </div>
	 
</body>
</html>