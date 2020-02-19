<?php
	session_start();
	require_once('db.php');
	if(isset($_SESSION['user'])){
		$user = $_SESSION['user'];
	}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Drug Store</title>
	<link rel="icon" href="logo2.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script src="js/bal.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
</head>
<body>
<div style="width: 87%; margin: 0px auto;" class="row">
	<div class="col-md-9">
		<img src="logo1.png" width="250">
	</div>
	<div class="col-md-3">
		<div class="button-group" style="margin-left: 70px;">
			<?php
				if(!isset($user)){


			?>
			<a href="login.php"><button class="btn btn-success" style="">Log in</button></a>
			<a href="register.php"><button class="btn btn-success" style="">Sign Up</button></a>
			<?php
				}
				else{
					$qr = mysqli_query($con, "SELECT * FROM login WHERE username = '$user'");
					$row = mysqli_fetch_array($qr);
					$fullname = $row['full_name'];
				?>
				<button class="btn btn-success form-control" style="">Hi, <?php echo $fullname;?></button>
				<a href="logout.php"><button class="btn btn-danger form-control">Logout</button></a>
				<?php
				}
			?>
		</div>
		
	</div>
</div>
<div style="width: 84%; margin: 0 auto;background: #66A620; border-radius: 50px; padding: 1px 30px;">
	<div class="topnav" id="myTopnav">
	  <a href="index.php" class="active" style="color: #66A620;">Home</a>
	  <a href="items.php">All Medicines</a>
	  <a href="contact_us.php">Contact us</a>
	  
	  <a href="#about">About</a>
	  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
	</div>
</div>

	<div style="width: 85%; margin: 20px auto;" class="row">
		<div class="col-md-7" style="background: white; border-radius: 15px; box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2); padding: 20px;">
			<h4 style="color: #335E2E">Type your message here, we will contact you soon.</h4>
			<br>
			<form method="post">
				<h5>Enter Your Name:</h5>
				<input type="text" name="dfname" class="form-control" placeholder="Enter Your Name:">
				<h5>Email:</h5>
				<input type="text" name="sdfsemail" class="form-control" placeholder="Enter Your Name:">
				<h5>Your Message:</h5>
				<textarea class="form-control"></textarea>
				<br>
				<button type="submit" class="btn btn-success">Send</button>
			</form>
		</div>
	</div>
	<br>
	<div style="width: 100%; background:#335E2E; padding: 10px;">
		<h6 style="color: white; font-style: italic; font-weight: bold; text-align: center;">Copyright &copy; All Rights Reserved by Drug Store</h6>
	</div>

<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>
</body>
</html>