<?php
	$user = $_GET['user'];
	$token = $_GET['token'];
	$qr = mysqli_query($con, "SELECT * FROM login WHERE username = '$user' AND token = '$token'");
	if(mysqli_num_rows($qr)>0){
		echo "Activated".
	}
?>