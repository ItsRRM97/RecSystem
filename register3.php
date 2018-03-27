
<?php
// Include config file
require_once 'config/config.php';
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
		 // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = 'Please enter username.';
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST['password']))){
        $password_err = 'Please enter your password.';
    } else{
        $password = trim($_POST['password']);
    }
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
		 $sql = "SELECT * FROM user WHERE username = :username";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(':username', $param_username, PDO::PARAM_STR);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
           
            // Attempt to execute the prepared statement
            $stmt->execute();

                // Check if username exists, if yes then verify password
                if($stmt->rowCount() == 0){
					
        $sql1 = "insert into user(username,password) values(:username,:password)";
        
        if($stmt1 = $pdo->prepare($sql1)){
            // Bind variables to the prepared statement as parameters
            $stmt1->bindParam(':username', $param_username, PDO::PARAM_STR);
            $stmt1->bindParam(':password', $param_password, PDO::PARAM_STR);
            // Set parameters
            $param_username = trim($_POST["username"]);
            $param_password = trim($_POST["password"]);
            // Attempt to execute the prepared statement
            if($stmt1->execute()){
							session_start();
                            $_SESSION['username'] = $param_username;      
                            header("location: view.php");
			}
		}
	}  
	else{
				$username_err= "Username already taken";
		}
}
			
			else{
                echo "Oops! Something went wrong. Please try again later.";
				}
        
        
        // Close statement
        unset($stmt);
    }
    
    // Close connection
    unset($pdo);
}
?>
<DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
	<section>
		<div class="container">
			<div class="form_content">
				<h2>Project Name</h2>
				<p>Take your favourite course right now.</p>
				<a href="#">Read More</a>
			</div>
			<div class="login_form">
				<h1>Register</h1>
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username"class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control"value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Register">
            </div>
            <a href="index2.php">Already registered?</a>
        </form>
				
			</div>
		</div>
	</section>
</body>
</html>