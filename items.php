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
				<button class="btn btn-success" style="">Hi, <?php echo $fullname;?></button>
				<?php
				}
			?>
		</div>
		
	</div>
</div>
<div style="width: 84%; margin: 0 auto;background: #66A620; border-radius: 50px; padding: 1px 30px;">
	<div class="topnav" id="myTopnav">
	  <a href="index.php">Home</a>
	  <a href="items.php"  class="active" style="color: #66A620;">All Medicines</a>
	  <a href="contact_us.php">Contact us</a>
	  
	  <a href="#about">About</a>
	  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
	</div>
</div>
	<div style="width: 85%; margin: 20px auto; ">
		<form method="post">
			<div class="input-group mb-3">
			<form method="post" action="">
			  <input type="text" name="keyword" class="form-control" placeholder="Search here by name or group..." aria-label="" aria-describedby="basic-addon2">
			  <div class="input-group-append">
			    <button type="submit" name="search" class="input-group-text btn btn-success">Search</button>
			  </div>
			</form>
			</div>
		</form>
	</div>
	<div style="width: 85%; margin: 20px auto;" class="row">

		
				<?php

					if(isset($_POST['search'])){
						$keyword = $_POST['keyword'];
						$qr = mysqli_query($con, "SELECT * FROM item WHERE name LIKE '%$keyword%'");
						while($row = mysqli_fetch_array($qr)){
							$id = $row['id'];
							$name = $row['name'];
							$g_name = $row['group_name'];
							$description = mb_substr($row['description'], 0, 300);
							
							$price = $row['price'];
							$image = $row['image'];

					?>
				<div class="col-md-3" style="margin-top: 20px; margin-bottom: 20px;">
					<h4 style="color: green;"><?php echo $name;?></h4>
					<h5  style="color: #7f7f7f;"><?php echo $g_name;?></h5>
					
					<img src="items/<?php echo $image; ?>" width="230">
					<h6><?php echo $description;?></h6>
					
					<h3 style="color: #7f7f7f; font-weight: bold;"><?php echo $price;?>/-</h3>
					<br>
					<a href="order.php?id=<?php echo $id;?>"><button class="btn btn-success" style="border-radius:20px;">Order Now</button></a>
				</div>
					<?php
						}
					}
					else{



						$qr = mysqli_query($con, "SELECT * FROM item");
						while($row = mysqli_fetch_array($qr)){
							$id = $row['id'];
							$name = $row['name'];
							$g_name = $row['group_name'];
							$description = mb_substr($row['description'], 0, 300);
							
							$price = $row['price'];
							$image = $row['image'];
						
				?>
				<div class="col-md-3" style="margin-top: 20px; margin-bottom: 20px;">
					<h4 style="color: green;"><?php echo $name;?></h4>
					<h5  style="color: #7f7f7f;"><?php echo $g_name;?></h5>
					
					<img src="items/<?php echo $image; ?>" width="230">
					<h6><?php echo $description;?></h6>
					
					<h3 style="color: #7f7f7f; font-weight: bold;"><?php echo $price;?>/-</h3>
					<br>
					<a href="order.php?id=<?php echo $id;?>"><button class="btn btn-success" style="border-radius:20px;">Order Now</button></a>
				</div>
				<?php
						}
					}
				?>
	</div>
		


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