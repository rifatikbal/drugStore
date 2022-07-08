<?php
	session_start();
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    // use Exception;
    require_once('PHPMailer/src/PHPMailer.php');
    require_once('PHPMailer/src/Exception.php');
    require_once('PHPMailer/src/SMTP.php');
    require_once('db.php');

	function generateRandomString($length = 32) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
	}
	
	if(isset($_POST['submit'])){
		$token = generateRandomString();

		$full_name = $_POST['full_name'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$qr = mysqli_query($con, "INSERT INTO `login` (`id`, `username`, `password`, `full_name`, `token`) VALUES (NULL, '$username', '$password', '$full_name','$token')");
		if($qr)echo "Done";
		$sendfrom = "hussain0296@gmail.com";
        $name1 =  "Drug Store , Rajshahi";
        $subject = 'Account Confirmation';
        $mesg = '<p>Hi '.$full_name.', Please follow the link to verify your account</p>
						    <a href="https://www.nakibhossain.com/rifat/confirm.php?token=<?php echo $token;?>&user=<?php echo $username ?>"><p style="font-weight:bold">Link</p></a>';
        
        $mail = new PHPMailer();
    
        $mail->Host = "smtp.gmail.com";
    
        $mail-isSMTP();
    
        $mail->SMTPAuth = true;
    
        $mail->Username = "nakib143048@gmail.com";
    
        $mail->Password = "";
    
        $mail->SMTPSecure = "ssl";
    
        $mail->Port = 465;
    
        $mail->Subject = $subject;
    
        $mail->isHTML(true);
        
        $mail->Body = "<div style='padding: 10%; background: #f2f2f2;'><div style='background: white; padding: 10px;'>$mesg</div></div> ";
    
        $mail->setFrom($sendfrom,$name1);
    
        $mail->addAddress($user);
        
        $mail->addAttachment('logo2.png', 'Green Leaf');
    
        if($mail->send()){
            $msg = "<h4 style='color: grren; font-weight: bold; text-align:center;'>We have received your request, Please check your email for details.</h4>";
        }
        else{
            $msg = "<h4 style='color: red; font-weight: bold;'>Something wrong</h4>";
        }
	}

?>

<?php
    
  /*  
    if(isset($_POST['submit'])){
        

        $sendfrom = "hussain0296@gmail.com";
        $name1 =  "Online Medical Helpline , Rajshahi";
        $subject = 'Setting Appointment  with '.$doctor_name.'.';
        $mesg = '<h4 style="color:green;">Congratulations '.$name.',</h4><br> You have successfully set an appointment with Dr. '.$doctor_name.'.<br>Plese come at '.$time.' in '.$chamber_location.'.<br> Your seriel number is '.$ct.'.';
        
        $mail = new PHPMailer();
    
        $mail->Host = "smtp.gmail.com";
    
        $mail-isSMTP();
    
        $mail->SMTPAuth = true;
    
        $mail->Username = "nakib143048@gmail.com";
    
        $mail->Password = "";
    
        $mail->SMTPSecure = "ssl";
    
        $mail->Port = 465;
    
        $mail->Subject = $subject;
    
        $mail->isHTML(true);
        
        $mail->Body = "<div style='padding: 10%; background: #f2f2f2;'><div style='background: white; padding: 10px;'>$mesg</div></div>
        ";
    
        $mail->setFrom($sendfrom,$name1);
    
        $mail->addAddress($user);
        
        $mail->addAttachment('logo2.png', 'Green Leaf');
    
        if($mail->send()){
            $msg = "<h4 style='color: grren; font-weight: bold; text-align:center;'>We have received your request, Please check your email for details.</h4>";
        }
        else{
            $msg = "<h4 style='color: red; font-weight: bold;'>Something wrong</h4>";
        }
    }

    */
    
?> 


<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="icon" href="logo2.png">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div style="width: 400px; margin: 110px auto; background: white; border-radius: 15px; box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2); padding: 25px 15px;">
		<h4 style="color: #66A620">Register here:</h4>
		<img src="logo3" width="60" style="margin-left: 310px; margin-top: -70px;">
		<br>
		<form method="post" action="">
			<?php
				if(isset($msg)){
					echo $msg;
				}
			?>
			<h5 style="color: #7f7f7f; font-weight: bold;">Full Name:</h5>
			<input type="text" class="form-control" name="full_name" placeholder="Enter your full name">
			<br>
			<h5 style="color: #7f7f7f; font-weight: bold;">Email:</h5>
			<input type="text" class="form-control" name="username" placeholder="Enter your email">
			<br>
			<h5 style="color: #7f7f7f; font-weight: bold;">Password:</h5>
			<input type="password" name="password" class="form-control" placeholder="Enter password">
			<br>
			<button type="submit" name="submit" class="btn btn-success">Register</button>
		</form>

	</div>
</body>
</html>