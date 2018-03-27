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
				
					$sql1="insert into archives(username,password,image,comment,rating) values(:username,:code,:cer,:com,:rate)";
							$stmt1=$pdo1->prepare($sql1);
							$stmt1->bindParam(':username',$param_username,PDO::PARAM_STR);
							$param_username=$_SESSION["username"];
							$stmt1->bindParam(':code',$param_code,PDO::PARAM_STR);
							$param_code=$_GET["id"];
							$stmt1->bindParam(':cer',$param_cer,PDO::PARAM_STR);
							$param_cer=$_GET["img"];
							$stmt1->bindParam(':rate',$rate,PDO::PARAM_INT);
							$rate=htmlspecialchars($_GET["starlet"]);
							
							$stmt1->bindParam(':com',$param_com,PDO::PARAM_STR);
							$param_com=htmlspecialchars($_GET["name"]);
							$stmt1->execute();
					
					$sql2="delete from user_course where username=:username and code=:code";
					$stmt2=$pdo1->prepare($sql2);
							$stmt2->bindParam(':username',$param_username,PDO::PARAM_STR);
							$param_username=$_SESSION["username"];
							$stmt2->bindParam(':code',$param_code,PDO::PARAM_STR);
							$param_code=$_GET["id"];
							$stmt2->execute();
							
				// Updating the our_rating
					$sql3="select our_rating,total_people from course where code=:code";
					$stmt3=$pdo1->prepare($sql3);
							$stmt3->bindParam(':code',$param_code1,PDO::PARAM_STR);
							$param_code1=$_GET["id"];
						if($stmt3->execute())
						{
						$row3=$stmt3->fetch();
					$sql="update course set our_rating=:x where code=:code";
					$stmt=$pdo1->prepare($sql);
							$stmt->bindParam(':x',$param_x,PDO::PARAM_INT);
							$param_x=($row3["our_rating"]+$rate)/2;
							$stmt->bindParam(':code',$param_code1,PDO::PARAM_STR);
							$param_code1=$_GET["id"];
							$stmt->execute();
							
						}
			
		header("location: thanks.php");
							
		?>