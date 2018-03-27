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

					
						$sql1="insert into user_course(code,username,status) values(:code,:username,:x)";
						$stmt1=$pdo1->prepare($sql1);
							$stmt1->bindParam(':x',$param_x,PDO::PARAM_STR);
							$param_x="In Progress";
							$stmt1->bindParam(':code',$param_id,PDO::PARAM_STR);
							$param_id=$_GET["id"];
							$stmt1->bindParam(':username',$param_username,PDO::PARAM_STR);
							$param_username=$_SESSION["username"];
							
							$stmt1->execute();
						$sql="update course set total_people=total_people+1 where code=:code";
						$stmt=$pdo1->prepare($sql);
						
						$stmt->bindParam(':code',$param_id1,PDO::PARAM_STR);
							$param_id1=$_GET["id"];
							
						$stmt->execute();
						
				   
							$link=$_GET["link"];
							header("location: $link");

					
		?>