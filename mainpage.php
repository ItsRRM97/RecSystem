<?php
require_once 'config/config.php';
// Initialize the session
session_start();

// If session variable is not set it will redirect to login page
if(!isset($_SESSION["username"]) || empty($_SESSION["username"])){
  header("location: index2.php");
  exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>MainPage</title>
  <link rel="stylesheet" type="text/css" href="mainpage_style.css">
  <link href="https://fonts.googleapis.com/css?family=Prompt|Work+Sans" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="StarRating.css">
  <link rel="stylesheet" type="text/css" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
</head>
<body>
    <div class="navbar1">
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
			{?>	<li><a href="#"><?php echo $ans;?></a></li><?php
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
	<?php
		$sql="SELECT * FROM user_course where username= :username and code= :code";
		$f=0;
		if($stmt=$pdo->prepare($sql))
		{
			$stmt->bindParam(':username',$param_user,PDO::PARAM_STR);
			$param_user=$_SESSION["username"];
			$stmt->bindParam(':code',$param_code,PDO::PARAM_STR);
			$param_code=$_GET["id"];
			if($stmt->execute())
				{
					$row = $stmt->fetch();
					$sql1="SELECT * from course where code= :idname";
					$stmt1=$pdo1->prepare($sql1);
					$stmt1->bindParam(':idname',$param_id,PDO::PARAM_STR);
					$param_id=$_GET["id"];

					$stmt1->execute();

					if($stmt1->rowCount()==1)
					{
						$row1=$stmt1->fetch();
?>
      <div class="heading">
        <h1><?php echo $row1["coursename"]?></h1>
      </div>
      <div class="desc">
        <p><?php echo $row1["course_desc"]?></p>
        <img src="page-break.png" alt="page break" width="900px">
      </div>
      <div class="rate">
        <div class="rating">
          <h3>Overall rating</h3>
		  <x-star-rating id="rating" value=<?php echo $row1["our_rating"];?>></x-star-rating>
		
		  </div>
			<div class="number">
          <h3>Taken by</h3>
		  <h4><?php echo $row1["total_people"];?></h4>
        </div>
      </div>
      <div class="buttons">
	  <?php
			if($row["status"]=="In Progress")
			{?>
        <a href="<?php echo $row1["linker"];?>" target="blank">In Progress</a>
        <a href="finish.php?id=<?php echo $_GET["id"];?>">Finish this course</a>
		<?php
			}
			else
			{?>
		 <a href="update.php?id=<?php echo $_GET["id"];?>&link=<?php echo $row1["linker"];?>&status=<?php echo $row["status"];?>">Take Course</a>
        
		<?php
			}
		?>
      </div>
      <div class="comment">
        
      </div>
    </div>
	<?php
					}
				}
		}
	?>
	<script type="text/javascript" src="StarRating1.js"></script>
	
</body>
</html>