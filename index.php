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
	<div class="col-md-8" style="margin-bottom: 20px;">
		<img src="slide1_image.png" width="100%">
	</div>
	<div class="col-md-4">
		<div style="background: #66A620; padding: 30px 15px; border-radius: 25px 0px 0px 0px;">
			<h1 style="color: #D6F52B; font-size: 60px; font-style: italic;font-weight: bold;">10%</h1>
			<h3 style="width: 200px; margin-left: 130px; margin-top: -70px; color: white;"><b><i>off on BKash Payment</i></b></h3>
		</div>
		<div style="background: #4A8C43; padding: 20px 20px;">
			<h1 style="color: #F7CD00; font-size: 60px; font-style: italic;font-weight: bold;">5%</h1>
			<h3 style="width: 200px; margin-left: 100px; margin-top: -50px; color: white;"><b><i>off on</i></b></h3>
			<h5 style="color: white;"><i>Square Pharmaceutical Products</i></h5>
		</div>
		<div style="background: #335E2E; padding: 30px 20px; border-radius: 0px 0px 25px 0px;">
			<h2 style="color: white;"><b><i>Free Shipping</i></b></h2>
			<h5 style="color: white;"><i>on orders over 1000/=</i></h5>
		</div>
		
	</div>
</div>
	<div style="width: 85%; margin: 20px auto;" class="row">
		<div class="col-md-8" style="padding: 10px;">
			<h3 style="color: #335E2E;">Featured Products</h3>
			<hr>
			<div class="row">
				<?php
					$qr = mysqli_query($con, "SELECT * FROM item");
					$ct = mysqli_num_rows($qr);
					if($ct>3)$ct = 3;
					for($i=0; $i<$ct; $i++){
						$row = mysqli_fetch_array($qr);
						$id = $row['id'];
						$name = $row['name'];
						$g_name = $row['group_name'];
						$description = mb_substr($row['description'], 0, 300);
						
						$price = $row['price'];
						$image = $row['image'];
					
				?>
				<div class="col-md-4" style="margin-top: 20px; margin-bottom: 20px;">
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
				?>
			</div>
		</div>
		<div class="col-md-1">
		</div>
		<div class="col-md-3" style="padding: 10px;">
			<?php
				if(isset($user)){
			?>
			<h3 style="color: #335E2E; text-align: right;">Recommended for you:</h3>
			<hr>
			<?php
					$a1 = mysqli_query($con, "SELECT * FROM recommend WHERE username = '$user'");
					if(mysqli_num_rows($a1)>0){
						while($row=mysqli_fetch_array($a1)){
							$group_name = $row['group_name'];
							$a2 = mysqli_query($con, "SELECT * FROM item WHERE group_name = '$group_name' ORDER BY price ASC LIMIT 1");
							while($row2 = mysqli_fetch_array($a2)){
								$image = $row2['image'];
								$name = $row2['name'];
								$price = $row2['price'];

					?>
					<div>
						<img src="items/<?php echo $image;?>" width="160">
					</div>

					<div>
						<h3 style="text-align: left;"><?php echo $name;?></h3>
						<h5 style="color: #335E2E; font-weight: bold;"><?php echo $price; ?>/-</h5>
						<button class="btn btn-success" style="border-radius:20px;">Order Now</button>
					</div>
					<br>
					<?php
							}
						}
					}
					else{

				?>
				<h5 style="text-align: center; color: #7f7f7f; font-style: italic;">Nothing to show</h5>
				<?php

					}
				}
				else{


			?>
			<h3 style="color: #335E2E; text-align: right;">Products on Sale:</h3>
			<hr>
			<div >
				<img src="12.jpg" width="160">
			</div>

			<div>
				<h3 style="text-align: left;">Regab</h3>
				<h5 style="color: #335E2E; font-weight: bold;"><del style="color: #7f7f7f;">70 tk</del> 50 tk</h5>
				<button class="btn btn-success" style="border-radius:20px;">Order Now</button>
			</div>
			<br>
			<div >
				<img src="13.jpg" width="160">
			</div>
			<div>
				<h3>Veripel SR</h3>
				<h5 style="color: #335E2E; font-weight: bold;"><del style="color: #7f7f7f;">50 tk</del> 40 tk</h5>
				<button class="btn btn-success" style="border-radius:20px;">Order Now</button>
			</div>
			<?php
				}
			?>
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