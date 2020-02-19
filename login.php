<?php
	session_start();
	require_once('db.php');
	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$qr = mysqli_query($con, "SELECT * FROM login");
		while($row = mysqli_fetch_array($qr)){
			$db_use = $row['username'];
			$db_pass = $row['password'];
			if($db_use == $username && $db_pass == $password){

				if($db_use == "admin"){
					$_SESSION['admin'] = $db_use;
					header('Location: admin.php');
				}
				else{
					$_SESSION['user'] = $db_use;
					header('Location: index.php');	
				}
			}
			else{
				$msg = "<h5 style='color:red;'>Email or Password is not correct!</h5>";
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="icon" href="logo2.png">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div style="width: 400px; margin: 150px auto; background: white; border-radius: 15px; box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2); padding: 25px 15px;">
		<h4 style="color: #66A620">Login here:</h4>
		<img src="logo2" width="50" style="margin-left: 310px; margin-top: -70px;">
		<br>
		<form method="post" action="">
			<?php
				if(isset($msg)) echo $msg;
			?>
			<h5 style="color: #7f7f7f; font-weight: bold;" >Email:</h5>
			<input type="text" class="form-control" name="username" placeholder="Enter email">
			<br>
			<h5 style="color: #7f7f7f; font-weight: bold;" >Password:</h5>
			<input type="password" name="password" class="form-control" placeholder="Enter password">
			<br>
			<button type="submit" name="submit" class="btn btn-success">Login</button>
		</form>

	</div>
</body>
</html>