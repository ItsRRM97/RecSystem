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
				if($_GET["pass"])
				{
				$sql1="update user set password=:pass where username= :username";
							$stmt1=$pdo1->prepare($sql1);
							$stmt1->bindParam(':username',$param_username,PDO::PARAM_STR);
							$param_username=$_SESSION["username"];
							$stmt1->bindParam(':pass',$param_pass,PDO::PARAM_STR);
							$param_pass=$_GET["pass"];
							$stmt1->execute();
				}
				if($_GET["email"])
				{
					$sql1="update user set email=:email where username= :username";
							$stmt1=$pdo1->prepare($sql1);
							$stmt1->bindParam(':username',$param_username,PDO::PARAM_STR);
							$param_username=$_SESSION["username"];
							$stmt1->bindParam(':email',$param_email,PDO::PARAM_STR);
							$param_email=$_GET["email"];
							$stmt1->execute();
				}
				if($_GET["contact"])
				{
					$sql1="update user set contact=:contact where username= :username";
							$stmt1=$pdo1->prepare($sql1);
							$stmt1->bindParam(':username',$param_username,PDO::PARAM_STR);
							$param_username=$_SESSION["username"];
				
							$stmt1->bindParam(':contact',$param_contact,PDO::PARAM_INT);
							$param_contact=htmlspecialchars($_GET["contact"]);
							$stmt1->execute();
							
				}			
								
								header("location: viewprofile.php");
						
		
							
		?>