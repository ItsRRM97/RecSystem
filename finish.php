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
			?>	<li><a href="#"><?php echo $ans;?></a></li><?php
			
			while($i>0)
			{
				$row = $stmt->fetch();
		  ?>
            <li><a href="mainpage.php?id=<?php echo $row["code"];?>"><?php echo $row["coursename"];?></a></li>
			<?php
			$i--;
			}
			?>
          </ul>
        </li>
        <li><a href="logout.php">Log out</a></li>
      </ul>
    </div>
    <div class="container">
    	<div class="heading">
        	<h1>Course name</h1>
      	</div>
		
      	<div class="mid" id="yo">
      		<h2 style="padding-bottom: 30px;">Thanks for taking this course.</h2>
      		<label for="file" id="upload">Upload your certificate</label><input type="file" name="img" id="file" accept="application/pdf">
	<input type="hidden" value="<?php echo $_GET["id"];?>" id="id">
      	</div>
      	<div class="mid" style="padding-top: 30px;">
      		<h2 style="padding-bottom: 30px;">Please rate this course.</h2>
      	</div>
		<x-star-rating id="starlet"></x-star-rating>
      	<div class="mid mid1" style="padding-top: 30px;">
      		<h2 style="padding-bottom: 30px;">Leave a comment.</h2>
      		<textarea rows="10" cols="60" id="text-area" name="comment" value="" placeholder="Add a comment..."></textarea><br><br>
		<a href="#" id="submit" style="margin-top: 30px;">Submit</a>
			</div>
    </div>
	 	<script type="text/javascript" src="StarRating.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script type="text/javascript">
  $(function () {
        $("#submit").bind("click", function () {
		if(encodeURIComponent($("#text-area").val()) && encodeURIComponent($("#starlet").val()) && encodeURIComponent($("#file").val()) )
		{
			
			var url = "check.php?name=" + encodeURIComponent($("#text-area").val())+"&starlet="+encodeURIComponent($("#starlet").val())+"&img="+encodeURIComponent($("#file").val())
			+"&id="+encodeURIComponent($("#id").val());
            window.location.href = url;
		}
		else
		{
			alert("Please fill all the fields...");
		}
		 });
  });

</script>

</body>
</html>