<?php
require_once("Config/ftpConnect.php");

session_start();

//When a user loads this page, they will automatically first logged out by them selves for browser
if(isset($_SESSION['ftp_User']) && isset($_SESSION['login_details'])){

	unset($_SESSION['login_details']);
	unset($_SESSION['ftp_User']);
	unset($_SESSION['data']);

}

include("Classes/classes.php");

$error = "-";

if(isset($_POST['username']) && isset($_POST['password'])){

	$ftpUser = new ftpUser($_POST['username']);
	
	$ftpUser->login($ftp_conn, $_POST['username'], $_POST['password']);
	
	if($ftpUser->checkLogin()){
		
		//code if the login is successfull
		echo "successfull login";
		
		$_SESSION['ftp_User'] = $ftpUser;
		$_SESSION['login_details'] = $_POST['username'];
		$_SESSION['directory'] = "/";
		
		$_SESSION['data'] = base64_encode($_POST['username']."#".$_POST['password']);
		
	}
	else{
		//code if the login is fail
		$error = "Incorrect password or username";
	}
	
	if(isset($_SESSION['ftp_User']) && isset($_SESSION['login_details'])){
		
		header("Location:fileManager.php");
		
	}
	
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>FTP-Browser | Login</title>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans:wght@700&display=swap" rel="stylesheet"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="CSS/kel.css">
        <style>
			.loader{
				border: 5px solid #f3f3f3;
				border-radius: 50%;
				border-top: 5px solid #3498db;
				width: 30px;
				height: 30px;
				-webkit-animation: spin 1s linear infinite; /* Safari */
				animation: spin 1s linear infinite;
			}
		</style>
	</head>
<body>
<div id="load" class="w3-modal">
  <span class="w3-modal-content">
    <center><div class="loader" id="loader"></div></center>
  </span>
</div>

<div class="w3-padding w3-black w3-center">FTP-Browser created in XAMPP server by the contributers of <a href="https://github.com/Kelta-King/FTP-browser">FTP-Browser</a></div>
<div class="w3-light-gray w3-container w3-center w3-padding-32" style="z-index:2;">
		<div class="w3-padding-16">
		<div class="w3-margin-bottom w3-text-red" >
		<!--   <center><div class="loader" id="loader" style="display:none;"></div></center> -->
		<div id="error"><?php echo $error ?></div>	
		</div>
		<div class="w3-xxlarge w3-bold w3-margin-top"><b>FTP-Browser</b></div>
		
		<form class="w3-container w3-center w3-margin" id="login">
			
			<div class="w3-section">
				<input type="text" class="w3-padding w3-round w3-border w3-hover-border-black" name="username" placeholder="Username" style="margin:0;width:20%;" <?php if(isset($_GET['u_name'])){echo "value=".$_GET['u_name'];} ?> required><br>
			</div>
			<div class="w3-section">
				<input type="password" class="w3-padding w3-round w3-border w3-hover-border-black" name="password" placeholder="Password" style="margin:0;width:20%;" required><br>
			</div>			
			<div class="w3-section">
				<button type="button" class="w3-black w3-round w3-padding w3-border-0 w3-black" onclick="login()" style="margin:0;width:20%;cursor:pointer">Log In</button>
			</div>
		
		</form>
		</div>
	</div>
	<script src="JS/login.js"></script>
</body>
</html>
<?php

require_once("Config/ftpClose.php");

?>