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
            <li><a href="mainpage.php?id=<?php echo substr($row["code"],0,15);?>"><?php echo $row["coursename"];?></a></li>
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
    	
      	<div class="mid" >
      		<p><b>Change Password:</b></p>&nbsp;<input type="password" id="pass1" name="password1" placeholder="Enter your new password here..."style="width: 350px;height:40px; border-radius:5%; font-size:20px; padding-right:20px">
		<input type="password" name="password2" id="pass2" placeholder="Re-Enter your password here..."style="width: 350px;height:40px; border-radius:5%; font-size:20px">
      		</div><br><br>
			<div class="mid" >
      		<p><b>Enter email:</b></p>&nbsp;<input type="email" name="email1" id="email1"placeholder="Enter your email id here..."style="width: 350px;height:40px; border-radius:5%; font-size:20px;"><br><br>
			<p><b>Enter Contact no:</b></p>&nbsp;<input type="text" name="contact" id="contact"placeholder="Enter your number here..."style="width: 350px;height:40px; border-radius:5%; font-size:20px;"><br><br>
			
			<a href="#" id="submit" style="margin-top: 30px;">Save Changes</a>
			</div>
    </div>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script type="text/javascript">
  $(function () {
        $("#submit").bind("click", function () {
		if(encodeURIComponent($("#pass1").val())==encodeURIComponent($("#pass2").val()) )
		{
			
			var url = "prac.php?pass=" + encodeURIComponent($("#pass1").val())+"&email="+encodeURIComponent($("#email1").val())+"&contact="+encodeURIComponent($("#contact").val());
            window.location.href = url;
		}
		else
		{
			alert("Entering wrong credentials");
		}
		 });
  });

</script>
 
</body>
</html>