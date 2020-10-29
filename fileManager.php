<?php

require_once("Config/ftpConnect.php");
include("Classes/classes.php");
session_start();

if(isset($_SESSION['ftp_User']) && isset($_SESSION['login_details']) && isset($_SESSION['data'])){
	
	$ftpUser = $_SESSION['ftp_User'];
	
	if($ftpUser->checkLogin()){
	//user has logged in area
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
<div class="w3-top">
  <div class="w3-row w3-padding w3-theme">
    <div class="w3-col s3">
      <a href="#" class="w3-button w3-block w3-theme kel-hover-2">HOME</a>
    </div>
    <div class="w3-col s3">
      <a href="#about" class="w3-button w3-block w3-theme kel-hover-2">ABOUT</a>
    </div>
    <div class="w3-col s3">
      <a href="#menu" class="w3-button w3-block w3-theme kel-hover-2">MENU</a>
    </div>
    <div class="w3-col s3">
      <a href="logout.php" class="w3-button w3-block w3-theme kel-hover-2 Logout">LOGOUT</a>
    </div>
  </div>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px;margin-top:53px" id="mySidebar">
  <div class = "w3-xxlarge w3-padding">
	<b>Directory list</b>
  </div>
  <div class="w3-padding-32 w3-large w3-text-grey" style="font-weight:bold">
    <a href="#" class="w3-bar-item w3-button">Shirts</a>
    <a href="#" class="w3-bar-item w3-button">Dresses</a>
    <a onclick="myAccFunc()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
      Jeans <i class="fa fa-caret-down"></i>
    </a>
    <div id="demoAcc" class="w3-bar-block w3-hide w3-padding-large w3-medium">
      <a href="#" class="w3-bar-item w3-button w3-light-grey"><i class="fa fa-caret-right w3-margin-right"></i>Skinny</a>
      <a href="#" class="w3-bar-item w3-button">Relaxed</a>
      <a href="#" class="w3-bar-item w3-button">Bootcut</a>
      <a href="#" class="w3-bar-item w3-button">Straight</a>
    </div>
    <a href="#" class="w3-bar-item w3-button">Jackets</a>
    <a href="#" class="w3-bar-item w3-button">Gymwear</a>
    <a href="#" class="w3-bar-item w3-button">Blazers</a>
    <a href="#" class="w3-bar-item w3-button">Shoes</a>  <a href="#" class="w3-bar-item w3-button">Jackets</a>
    <a href="#" class="w3-bar-item w3-button">Gymwear</a>
    <a href="#" class="w3-bar-item w3-button">Blazers</a>
    <a href="#" class="w3-bar-item w3-button">Shoes</a>  <a href="#" class="w3-bar-item w3-button">Jackets</a>
    <a href="#" class="w3-bar-item w3-button">Gymwear</a>
    <a href="#" class="w3-bar-item w3-button">Blazers</a>
    <a href="#" class="w3-bar-item w3-button">Shoes</a>  <a href="#" class="w3-bar-item w3-button">Jackets</a>
    <a href="#" class="w3-bar-item w3-button">Gymwear</a>
    <a href="#" class="w3-bar-item w3-button">Blazers</a>
    <a href="#" class="w3-bar-item w3-button">Shoes</a>
  </div>
  
</nav>

<div class="w3-main" style="margin-left:250px;margin-top:53px">

<div class="w3-bar w3-theme-dark w3-padding">
	<a href="#" class="w3-bar-item w3-button w3-border w3-margin-right kel-hover-2"><i class="fa fa-folder-open w3-large"></i> New Folder</a>
    <a href="#" class="w3-bar-item w3-button w3-border w3-margin-right kel-hover-2"><i class="fa fa-upload w3-large"></i> Upload File</a>
</div>

<div class="w3-bar w3-theme-l1 w3-padding">

	<a class="w3-bar-item w3-large"><b>Operations:</b></a>
    <a href="#" class="w3-bar-item w3-button w3-border w3-border-black w3-hover-white w3-margin-right kel-hover-2"><i class="fa fa-i-cursor w3-large"></i> Rename</a>
	<a href="#" class="w3-bar-item w3-button w3-border w3-border-black w3-hover-white w3-margin-right kel-hover-2"><i class="fa fa-remove w3-large"></i> Remove</a>
	<a href="#" class="w3-bar-item w3-button w3-border w3-border-black w3-hover-white w3-margin-right kel-hover-2"><i class="fa fa-download w3-large"></i> Download</a>
	<a href="#" class="w3-bar-item w3-button w3-border w3-border-black w3-hover-white w3-margin-right kel-hover-2"><i class="fa fa-arrows w3-large"></i> Move</a>

</div>

<div class="w3-bar-block">

	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-folder w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-folder w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-folder w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-folder w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-file-o w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-file-o w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-file-o w3-large"></i> Rename</span>

</div>
</div>


</body>
</html>
<!-- user has logged in 
You are successfully logged in
<a href="logout.php">Logout</a>
<br><br>
<input type="text" id="name">
<button onclick="addDir()">Add</button>
<script>

let addDir = () => {
	
	let name = document.getElementById("name").value;
	
	let str = "Name="+name;
	let xhttp = new XMLHttpRequest();
	//let loader = document.getElementById('loader');
	xhttp.onreadystatechange = function() {
		//loader.style.display = "block";
		if(this.readyState == 4 && this.status == 200){
			//document.getElementById('error').innerHTML = this.responseText;
			//loader.style.display = "none";
				alert(this.responseText);
		}
	}
	xhttp.open("POST", "Action/addDir.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(str);
	
}

</script>
-->
<?php	
	}
	else{
		echo "You are not logged in";
		header("Location:logout.php");
	}
}
else{
	header("Location:logout.php");
}
require_once("Config/ftpClose.php");
?><?php

require_once("Config/ftpConnect.php");
include("Classes/classes.php");
session_start();

if(isset($_SESSION['ftp_User']) && isset($_SESSION['login_details']) && isset($_SESSION['data'])){
	
	$ftpUser = $_SESSION['ftp_User'];
	
	if($ftpUser->checkLogin()){
	//user has logged in area
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
<div class="w3-top">
  <div class="w3-row w3-padding w3-theme">
    <div class="w3-col s3">
      <a href="#" class="w3-button w3-block w3-theme kel-hover-2">HOME</a>
    </div>
    <div class="w3-col s3">
      <a href="#about" class="w3-button w3-block w3-theme kel-hover-2">ABOUT</a>
    </div>
    <div class="w3-col s3">
      <a href="#menu" class="w3-button w3-block w3-theme kel-hover-2">MENU</a>
    </div>
    <div class="w3-col s3">
      <a href="logout.php" class="w3-button w3-block w3-theme kel-hover-2 Logout">LOGOUT</a>
    </div>
  </div>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px;margin-top:53px" id="mySidebar">
  <div class = "w3-xxlarge w3-padding">
	<b>Directory list</b>
  </div>
  <div class="w3-padding-32 w3-large w3-text-grey" style="font-weight:bold">
    <a href="#" class="w3-bar-item w3-button">Shirts</a>
    <a href="#" class="w3-bar-item w3-button">Dresses</a>
    <a onclick="myAccFunc()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
      Jeans <i class="fa fa-caret-down"></i>
    </a>
    <div id="demoAcc" class="w3-bar-block w3-hide w3-padding-large w3-medium">
      <a href="#" class="w3-bar-item w3-button w3-light-grey"><i class="fa fa-caret-right w3-margin-right"></i>Skinny</a>
      <a href="#" class="w3-bar-item w3-button">Relaxed</a>
      <a href="#" class="w3-bar-item w3-button">Bootcut</a>
      <a href="#" class="w3-bar-item w3-button">Straight</a>
    </div>
    <a href="#" class="w3-bar-item w3-button">Jackets</a>
    <a href="#" class="w3-bar-item w3-button">Gymwear</a>
    <a href="#" class="w3-bar-item w3-button">Blazers</a>
    <a href="#" class="w3-bar-item w3-button">Shoes</a>  <a href="#" class="w3-bar-item w3-button">Jackets</a>
    <a href="#" class="w3-bar-item w3-button">Gymwear</a>
    <a href="#" class="w3-bar-item w3-button">Blazers</a>
    <a href="#" class="w3-bar-item w3-button">Shoes</a>  <a href="#" class="w3-bar-item w3-button">Jackets</a>
    <a href="#" class="w3-bar-item w3-button">Gymwear</a>
    <a href="#" class="w3-bar-item w3-button">Blazers</a>
    <a href="#" class="w3-bar-item w3-button">Shoes</a>  <a href="#" class="w3-bar-item w3-button">Jackets</a>
    <a href="#" class="w3-bar-item w3-button">Gymwear</a>
    <a href="#" class="w3-bar-item w3-button">Blazers</a>
    <a href="#" class="w3-bar-item w3-button">Shoes</a>
  </div>
  
</nav>

<div class="w3-main" style="margin-left:250px;margin-top:53px">

<div class="w3-bar w3-theme-dark w3-padding">
	<a href="#" class="w3-bar-item w3-button w3-border w3-margin-right kel-hover-2"><i class="fa fa-folder-open w3-large"></i> New Folder</a>
    <a href="#" class="w3-bar-item w3-button w3-border w3-margin-right kel-hover-2"><i class="fa fa-upload w3-large"></i> Upload File</a>
</div>

<div class="w3-bar w3-theme-l1 w3-padding">

	<a class="w3-bar-item w3-large"><b>Operations:</b></a>
    <a href="#" class="w3-bar-item w3-button w3-border w3-border-black w3-hover-white w3-margin-right kel-hover-2"><i class="fa fa-i-cursor w3-large"></i> Rename</a>
	<a href="#" class="w3-bar-item w3-button w3-border w3-border-black w3-hover-white w3-margin-right kel-hover-2"><i class="fa fa-remove w3-large"></i> Remove</a>
	<a href="#" class="w3-bar-item w3-button w3-border w3-border-black w3-hover-white w3-margin-right kel-hover-2"><i class="fa fa-download w3-large"></i> Download</a>
	<a href="#" class="w3-bar-item w3-button w3-border w3-border-black w3-hover-white w3-margin-right kel-hover-2"><i class="fa fa-arrows w3-large"></i> Move</a>

</div>

<div class="w3-bar-block">

	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-folder w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-folder w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-folder w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-folder w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-file-o w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-file-o w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-file-o w3-large"></i> Rename</span>

</div>
</div>


</body>
</html>
<!-- user has logged in 
You are successfully logged in
<a href="logout.php">Logout</a>
<br><br>
<input type="text" id="name">
<button onclick="addDir()">Add</button>
<script>

let addDir = () => {
	
	let name = document.getElementById("name").value;
	
	let str = "Name="+name;
	let xhttp = new XMLHttpRequest();
	//let loader = document.getElementById('loader');
	xhttp.onreadystatechange = function() {
		//loader.style.display = "block";
		if(this.readyState == 4 && this.status == 200){
			//document.getElementById('error').innerHTML = this.responseText;
			//loader.style.display = "none";
				alert(this.responseText);
		}
	}
	xhttp.open("POST", "Action/addDir.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(str);
	
}

</script>
-->
<?php	
	}
	else{
		echo "You are not logged in";
		header("Location:logout.php");
	}
}
else{
	header("Location:logout.php");
}
require_once("Config/ftpClose.php");
?><?php

require_once("Config/ftpConnect.php");
include("Classes/classes.php");
session_start();

if(isset($_SESSION['ftp_User']) && isset($_SESSION['login_details']) && isset($_SESSION['data'])){
	
	$ftpUser = $_SESSION['ftp_User'];
	
	if($ftpUser->checkLogin()){
	//user has logged in area
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
<div class="w3-top">
  <div class="w3-row w3-padding w3-theme">
    <div class="w3-col s3">
      <a href="#" class="w3-button w3-block w3-theme kel-hover-2">HOME</a>
    </div>
    <div class="w3-col s3">
      <a href="#about" class="w3-button w3-block w3-theme kel-hover-2">ABOUT</a>
    </div>
    <div class="w3-col s3">
      <a href="#menu" class="w3-button w3-block w3-theme kel-hover-2">MENU</a>
    </div>
    <div class="w3-col s3">
      <a href="logout.php" class="w3-button w3-block w3-theme kel-hover-2 Logout">LOGOUT</a>
    </div>
  </div>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px;margin-top:53px" id="mySidebar">
  <div class = "w3-xxlarge w3-padding">
	<b>Directory list</b>
  </div>
  <div class="w3-padding-32 w3-large w3-text-grey" style="font-weight:bold">
    <a href="#" class="w3-bar-item w3-button">Shirts</a>
    <a href="#" class="w3-bar-item w3-button">Dresses</a>
    <a onclick="myAccFunc()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
      Jeans <i class="fa fa-caret-down"></i>
    </a>
    <div id="demoAcc" class="w3-bar-block w3-hide w3-padding-large w3-medium">
      <a href="#" class="w3-bar-item w3-button w3-light-grey"><i class="fa fa-caret-right w3-margin-right"></i>Skinny</a>
      <a href="#" class="w3-bar-item w3-button">Relaxed</a>
      <a href="#" class="w3-bar-item w3-button">Bootcut</a>
      <a href="#" class="w3-bar-item w3-button">Straight</a>
    </div>
    <a href="#" class="w3-bar-item w3-button">Jackets</a>
    <a href="#" class="w3-bar-item w3-button">Gymwear</a>
    <a href="#" class="w3-bar-item w3-button">Blazers</a>
    <a href="#" class="w3-bar-item w3-button">Shoes</a>  <a href="#" class="w3-bar-item w3-button">Jackets</a>
    <a href="#" class="w3-bar-item w3-button">Gymwear</a>
    <a href="#" class="w3-bar-item w3-button">Blazers</a>
    <a href="#" class="w3-bar-item w3-button">Shoes</a>  <a href="#" class="w3-bar-item w3-button">Jackets</a>
    <a href="#" class="w3-bar-item w3-button">Gymwear</a>
    <a href="#" class="w3-bar-item w3-button">Blazers</a>
    <a href="#" class="w3-bar-item w3-button">Shoes</a>  <a href="#" class="w3-bar-item w3-button">Jackets</a>
    <a href="#" class="w3-bar-item w3-button">Gymwear</a>
    <a href="#" class="w3-bar-item w3-button">Blazers</a>
    <a href="#" class="w3-bar-item w3-button">Shoes</a>
  </div>
  
</nav>

<div class="w3-main" style="margin-left:250px;margin-top:53px">

<div class="w3-bar w3-theme-dark w3-padding">
	<a href="#" class="w3-bar-item w3-button w3-border w3-margin-right kel-hover-2"><i class="fa fa-folder-open w3-large"></i> New Folder</a>
    <a href="#" class="w3-bar-item w3-button w3-border w3-margin-right kel-hover-2"><i class="fa fa-upload w3-large"></i> Upload File</a>
</div>

<div class="w3-bar w3-theme-l1 w3-padding">

	<a class="w3-bar-item w3-large"><b>Operations:</b></a>
    <a href="#" class="w3-bar-item w3-button w3-border w3-border-black w3-hover-white w3-margin-right kel-hover-2"><i class="fa fa-i-cursor w3-large"></i> Rename</a>
	<a href="#" class="w3-bar-item w3-button w3-border w3-border-black w3-hover-white w3-margin-right kel-hover-2"><i class="fa fa-remove w3-large"></i> Remove</a>
	<a href="#" class="w3-bar-item w3-button w3-border w3-border-black w3-hover-white w3-margin-right kel-hover-2"><i class="fa fa-download w3-large"></i> Download</a>
	<a href="#" class="w3-bar-item w3-button w3-border w3-border-black w3-hover-white w3-margin-right kel-hover-2"><i class="fa fa-arrows w3-large"></i> Move</a>

</div>

<div class="w3-bar-block">

	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-folder w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-folder w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-folder w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-folder w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-file-o w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-file-o w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-file-o w3-large"></i> Rename</span>

</div>
</div>


</body>
</html>
<!-- user has logged in 
You are successfully logged in
<a href="logout.php">Logout</a>
<br><br>
<input type="text" id="name">
<button onclick="addDir()">Add</button>
<script>

let addDir = () => {
	
	let name = document.getElementById("name").value;
	
	let str = "Name="+name;
	let xhttp = new XMLHttpRequest();
	//let loader = document.getElementById('loader');
	xhttp.onreadystatechange = function() {
		//loader.style.display = "block";
		if(this.readyState == 4 && this.status == 200){
			//document.getElementById('error').innerHTML = this.responseText;
			//loader.style.display = "none";
				alert(this.responseText);
		}
	}
	xhttp.open("POST", "Action/addDir.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(str);
	
}

</script>
-->
<?php	
	}
	else{
		echo "You are not logged in";
		header("Location:logout.php");
	}
}
else{
	header("Location:logout.php");
}
require_once("Config/ftpClose.php");
?><?php

require_once("Config/ftpConnect.php");
include("Classes/classes.php");
session_start();

if(isset($_SESSION['ftp_User']) && isset($_SESSION['login_details']) && isset($_SESSION['data'])){
	
	$ftpUser = $_SESSION['ftp_User'];
	
	if($ftpUser->checkLogin()){
	//user has logged in area
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
<div class="w3-top">
  <div class="w3-row w3-padding w3-theme">
    <div class="w3-col s3">
      <a href="#" class="w3-button w3-block w3-theme kel-hover-2">HOME</a>
    </div>
    <div class="w3-col s3">
      <a href="#about" class="w3-button w3-block w3-theme kel-hover-2">ABOUT</a>
    </div>
    <div class="w3-col s3">
      <a href="#menu" class="w3-button w3-block w3-theme kel-hover-2">MENU</a>
    </div>
    <div class="w3-col s3">
      <a href="logout.php" class="w3-button w3-block w3-theme kel-hover-2 Logout">LOGOUT</a>
    </div>
  </div>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px;margin-top:53px" id="mySidebar">
  <div class = "w3-xxlarge w3-padding">
	<b>Directory list</b>
  </div>
  <div class="w3-padding-32 w3-large w3-text-grey" style="font-weight:bold">
    <a href="#" class="w3-bar-item w3-button">Shirts</a>
    <a href="#" class="w3-bar-item w3-button">Dresses</a>
    <a onclick="myAccFunc()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
      Jeans <i class="fa fa-caret-down"></i>
    </a>
    <div id="demoAcc" class="w3-bar-block w3-hide w3-padding-large w3-medium">
      <a href="#" class="w3-bar-item w3-button w3-light-grey"><i class="fa fa-caret-right w3-margin-right"></i>Skinny</a>
      <a href="#" class="w3-bar-item w3-button">Relaxed</a>
      <a href="#" class="w3-bar-item w3-button">Bootcut</a>
      <a href="#" class="w3-bar-item w3-button">Straight</a>
    </div>
    <a href="#" class="w3-bar-item w3-button">Jackets</a>
    <a href="#" class="w3-bar-item w3-button">Gymwear</a>
    <a href="#" class="w3-bar-item w3-button">Blazers</a>
    <a href="#" class="w3-bar-item w3-button">Shoes</a>  <a href="#" class="w3-bar-item w3-button">Jackets</a>
    <a href="#" class="w3-bar-item w3-button">Gymwear</a>
    <a href="#" class="w3-bar-item w3-button">Blazers</a>
    <a href="#" class="w3-bar-item w3-button">Shoes</a>  <a href="#" class="w3-bar-item w3-button">Jackets</a>
    <a href="#" class="w3-bar-item w3-button">Gymwear</a>
    <a href="#" class="w3-bar-item w3-button">Blazers</a>
    <a href="#" class="w3-bar-item w3-button">Shoes</a>  <a href="#" class="w3-bar-item w3-button">Jackets</a>
    <a href="#" class="w3-bar-item w3-button">Gymwear</a>
    <a href="#" class="w3-bar-item w3-button">Blazers</a>
    <a href="#" class="w3-bar-item w3-button">Shoes</a>
  </div>
  
</nav>

<div class="w3-main" style="margin-left:250px;margin-top:53px">

<div class="w3-bar w3-theme-dark w3-padding">
	<a href="#" class="w3-bar-item w3-button w3-border w3-margin-right kel-hover-2"><i class="fa fa-folder-open w3-large"></i> New Folder</a>
    <a href="#" class="w3-bar-item w3-button w3-border w3-margin-right kel-hover-2"><i class="fa fa-upload w3-large"></i> Upload File</a>
</div>

<div class="w3-bar w3-theme-l1 w3-padding">

	<a class="w3-bar-item w3-large"><b>Operations:</b></a>
    <a href="#" class="w3-bar-item w3-button w3-border w3-border-black w3-hover-white w3-margin-right kel-hover-2"><i class="fa fa-i-cursor w3-large"></i> Rename</a>
	<a href="#" class="w3-bar-item w3-button w3-border w3-border-black w3-hover-white w3-margin-right kel-hover-2"><i class="fa fa-remove w3-large"></i> Remove</a>
	<a href="#" class="w3-bar-item w3-button w3-border w3-border-black w3-hover-white w3-margin-right kel-hover-2"><i class="fa fa-download w3-large"></i> Download</a>
	<a href="#" class="w3-bar-item w3-button w3-border w3-border-black w3-hover-white w3-margin-right kel-hover-2"><i class="fa fa-arrows w3-large"></i> Move</a>

</div>

<div class="w3-bar-block">

	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-folder w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-folder w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-folder w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-folder w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-file-o w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-file-o w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-file-o w3-large"></i> Rename</span>

</div>
</div>


</body>
</html>
<!-- user has logged in 
You are successfully logged in
<a href="logout.php">Logout</a>
<br><br>
<input type="text" id="name">
<button onclick="addDir()">Add</button>
<script>

let addDir = () => {
	
	let name = document.getElementById("name").value;
	
	let str = "Name="+name;
	let xhttp = new XMLHttpRequest();
	//let loader = document.getElementById('loader');
	xhttp.onreadystatechange = function() {
		//loader.style.display = "block";
		if(this.readyState == 4 && this.status == 200){
			//document.getElementById('error').innerHTML = this.responseText;
			//loader.style.display = "none";
				alert(this.responseText);
		}
	}
	xhttp.open("POST", "Action/addDir.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(str);
	
}

</script>
-->
<?php	
	}
	else{
		echo "You are not logged in";
		header("Location:logout.php");
	}
}
else{
	header("Location:logout.php");
}
require_once("Config/ftpClose.php");
?><?php

require_once("Config/ftpConnect.php");
include("Classes/classes.php");
session_start();

if(isset($_SESSION['ftp_User']) && isset($_SESSION['login_details']) && isset($_SESSION['data'])){
	
	$ftpUser = $_SESSION['ftp_User'];
	
	if($ftpUser->checkLogin()){
	//user has logged in area
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
<div class="w3-top">
  <div class="w3-row w3-padding w3-theme">
    <div class="w3-col s3">
      <a href="#" class="w3-button w3-block w3-theme kel-hover-2">HOME</a>
    </div>
    <div class="w3-col s3">
      <a href="#about" class="w3-button w3-block w3-theme kel-hover-2">ABOUT</a>
    </div>
    <div class="w3-col s3">
      <a href="#menu" class="w3-button w3-block w3-theme kel-hover-2">MENU</a>
    </div>
    <div class="w3-col s3">
      <a href="logout.php" class="w3-button w3-block w3-theme kel-hover-2 Logout">LOGOUT</a>
    </div>
  </div>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px;margin-top:53px" id="mySidebar">
  <div class = "w3-xxlarge w3-padding">
	<b>Directory list</b>
  </div>
  <div class="w3-padding-32 w3-large w3-text-grey" style="font-weight:bold">
    <a href="#" class="w3-bar-item w3-button">Shirts</a>
    <a href="#" class="w3-bar-item w3-button">Dresses</a>
    <a onclick="myAccFunc()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
      Jeans <i class="fa fa-caret-down"></i>
    </a>
    <div id="demoAcc" class="w3-bar-block w3-hide w3-padding-large w3-medium">
      <a href="#" class="w3-bar-item w3-button w3-light-grey"><i class="fa fa-caret-right w3-margin-right"></i>Skinny</a>
      <a href="#" class="w3-bar-item w3-button">Relaxed</a>
      <a href="#" class="w3-bar-item w3-button">Bootcut</a>
      <a href="#" class="w3-bar-item w3-button">Straight</a>
    </div>
    <a href="#" class="w3-bar-item w3-button">Jackets</a>
    <a href="#" class="w3-bar-item w3-button">Gymwear</a>
    <a href="#" class="w3-bar-item w3-button">Blazers</a>
    <a href="#" class="w3-bar-item w3-button">Shoes</a>  <a href="#" class="w3-bar-item w3-button">Jackets</a>
    <a href="#" class="w3-bar-item w3-button">Gymwear</a>
    <a href="#" class="w3-bar-item w3-button">Blazers</a>
    <a href="#" class="w3-bar-item w3-button">Shoes</a>  <a href="#" class="w3-bar-item w3-button">Jackets</a>
    <a href="#" class="w3-bar-item w3-button">Gymwear</a>
    <a href="#" class="w3-bar-item w3-button">Blazers</a>
    <a href="#" class="w3-bar-item w3-button">Shoes</a>  <a href="#" class="w3-bar-item w3-button">Jackets</a>
    <a href="#" class="w3-bar-item w3-button">Gymwear</a>
    <a href="#" class="w3-bar-item w3-button">Blazers</a>
    <a href="#" class="w3-bar-item w3-button">Shoes</a>
  </div>
  
</nav>

<div class="w3-main" style="margin-left:250px;margin-top:53px">

<div class="w3-bar w3-theme-dark w3-padding">
	<a href="#" class="w3-bar-item w3-button w3-border w3-margin-right kel-hover-2"><i class="fa fa-folder-open w3-large"></i> New Folder</a>
    <a href="#" class="w3-bar-item w3-button w3-border w3-margin-right kel-hover-2"><i class="fa fa-upload w3-large"></i> Upload File</a>
</div>

<div class="w3-bar w3-theme-l1 w3-padding">

	<a class="w3-bar-item w3-large"><b>Operations:</b></a>
    <a href="#" class="w3-bar-item w3-button w3-border w3-border-black w3-hover-white w3-margin-right kel-hover-2"><i class="fa fa-i-cursor w3-large"></i> Rename</a>
	<a href="#" class="w3-bar-item w3-button w3-border w3-border-black w3-hover-white w3-margin-right kel-hover-2"><i class="fa fa-remove w3-large"></i> Remove</a>
	<a href="#" class="w3-bar-item w3-button w3-border w3-border-black w3-hover-white w3-margin-right kel-hover-2"><i class="fa fa-download w3-large"></i> Download</a>
	<a href="#" class="w3-bar-item w3-button w3-border w3-border-black w3-hover-white w3-margin-right kel-hover-2"><i class="fa fa-arrows w3-large"></i> Move</a>

</div>

<div class="w3-bar-block">

	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-folder w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-folder w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-folder w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-folder w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-file-o w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-file-o w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-file-o w3-large"></i> Rename</span>

</div>
</div>


</body>
</html>
<!-- user has logged in 
You are successfully logged in
<a href="logout.php">Logout</a>
<br><br>
<input type="text" id="name">
<button onclick="addDir()">Add</button>
<script>

let addDir = () => {
	
	let name = document.getElementById("name").value;
	
	let str = "Name="+name;
	let xhttp = new XMLHttpRequest();
	//let loader = document.getElementById('loader');
	xhttp.onreadystatechange = function() {
		//loader.style.display = "block";
		if(this.readyState == 4 && this.status == 200){
			//document.getElementById('error').innerHTML = this.responseText;
			//loader.style.display = "none";
				alert(this.responseText);
		}
	}
	xhttp.open("POST", "Action/addDir.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(str);
	
}

</script>
-->
<?php	
	}
	else{
		echo "You are not logged in";
		header("Location:logout.php");
	}
}
else{
	header("Location:logout.php");
}
require_once("Config/ftpClose.php");
?><?php

require_once("Config/ftpConnect.php");
include("Classes/classes.php");
session_start();

if(isset($_SESSION['ftp_User']) && isset($_SESSION['login_details']) && isset($_SESSION['data'])){
	
	$ftpUser = $_SESSION['ftp_User'];
	
	if($ftpUser->checkLogin()){
	//user has logged in area
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
<div class="w3-top">
  <div class="w3-row w3-padding w3-theme">
    <div class="w3-col s3">
      <a href="#" class="w3-button w3-block w3-theme kel-hover-2">HOME</a>
    </div>
    <div class="w3-col s3">
      <a href="#about" class="w3-button w3-block w3-theme kel-hover-2">ABOUT</a>
    </div>
    <div class="w3-col s3">
      <a href="#menu" class="w3-button w3-block w3-theme kel-hover-2">MENU</a>
    </div>
    <div class="w3-col s3">
      <a href="logout.php" class="w3-button w3-block w3-theme kel-hover-2 Logout">LOGOUT</a>
    </div>
  </div>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px;margin-top:53px" id="mySidebar">
  <div class = "w3-xxlarge w3-padding">
	<b>Directory list</b>
  </div>
  <div class="w3-padding-32 w3-large w3-text-grey" style="font-weight:bold">
    <a href="#" class="w3-bar-item w3-button">Shirts</a>
    <a href="#" class="w3-bar-item w3-button">Dresses</a>
    <a onclick="myAccFunc()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
      Jeans <i class="fa fa-caret-down"></i>
    </a>
    <div id="demoAcc" class="w3-bar-block w3-hide w3-padding-large w3-medium">
      <a href="#" class="w3-bar-item w3-button w3-light-grey"><i class="fa fa-caret-right w3-margin-right"></i>Skinny</a>
      <a href="#" class="w3-bar-item w3-button">Relaxed</a>
      <a href="#" class="w3-bar-item w3-button">Bootcut</a>
      <a href="#" class="w3-bar-item w3-button">Straight</a>
    </div>
    <a href="#" class="w3-bar-item w3-button">Jackets</a>
    <a href="#" class="w3-bar-item w3-button">Gymwear</a>
    <a href="#" class="w3-bar-item w3-button">Blazers</a>
    <a href="#" class="w3-bar-item w3-button">Shoes</a>  <a href="#" class="w3-bar-item w3-button">Jackets</a>
    <a href="#" class="w3-bar-item w3-button">Gymwear</a>
    <a href="#" class="w3-bar-item w3-button">Blazers</a>
    <a href="#" class="w3-bar-item w3-button">Shoes</a>  <a href="#" class="w3-bar-item w3-button">Jackets</a>
    <a href="#" class="w3-bar-item w3-button">Gymwear</a>
    <a href="#" class="w3-bar-item w3-button">Blazers</a>
    <a href="#" class="w3-bar-item w3-button">Shoes</a>  <a href="#" class="w3-bar-item w3-button">Jackets</a>
    <a href="#" class="w3-bar-item w3-button">Gymwear</a>
    <a href="#" class="w3-bar-item w3-button">Blazers</a>
    <a href="#" class="w3-bar-item w3-button">Shoes</a>
  </div>
  
</nav>

<div class="w3-main" style="margin-left:250px;margin-top:53px">

<div class="w3-bar w3-theme-dark w3-padding">
	<a href="#" class="w3-bar-item w3-button w3-border w3-margin-right kel-hover-2"><i class="fa fa-folder-open w3-large"></i> New Folder</a>
    <a href="#" class="w3-bar-item w3-button w3-border w3-margin-right kel-hover-2"><i class="fa fa-upload w3-large"></i> Upload File</a>
</div>

<div class="w3-bar w3-theme-l1 w3-padding">

	<a class="w3-bar-item w3-large"><b>Operations:</b></a>
    <a href="#" class="w3-bar-item w3-button w3-border w3-border-black w3-hover-white w3-margin-right kel-hover-2"><i class="fa fa-i-cursor w3-large"></i> Rename</a>
	<a href="#" class="w3-bar-item w3-button w3-border w3-border-black w3-hover-white w3-margin-right kel-hover-2"><i class="fa fa-remove w3-large"></i> Remove</a>
	<a href="#" class="w3-bar-item w3-button w3-border w3-border-black w3-hover-white w3-margin-right kel-hover-2"><i class="fa fa-download w3-large"></i> Download</a>
	<a href="#" class="w3-bar-item w3-button w3-border w3-border-black w3-hover-white w3-margin-right kel-hover-2"><i class="fa fa-arrows w3-large"></i> Move</a>

</div>

<div class="w3-bar-block">

	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-folder w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-folder w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-folder w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-folder w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-file-o w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-file-o w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-file-o w3-large"></i> Rename</span>

</div>
</div>


</body>
</html>
<!-- user has logged in 
You are successfully logged in
<a href="logout.php">Logout</a>
<br><br>
<input type="text" id="name">
<button onclick="addDir()">Add</button>
<script>

let addDir = () => {
	
	let name = document.getElementById("name").value;
	
	let str = "Name="+name;
	let xhttp = new XMLHttpRequest();
	//let loader = document.getElementById('loader');
	xhttp.onreadystatechange = function() {
		//loader.style.display = "block";
		if(this.readyState == 4 && this.status == 200){
			//document.getElementById('error').innerHTML = this.responseText;
			//loader.style.display = "none";
				alert(this.responseText);
		}
	}
	xhttp.open("POST", "Action/addDir.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(str);
	
}

</script>
-->
<?php	
	}
	else{
		echo "You are not logged in";
		header("Location:logout.php");
	}
}
else{
	header("Location:logout.php");
}
require_once("Config/ftpClose.php");
?><?php

require_once("Config/ftpConnect.php");
include("Classes/classes.php");
session_start();

if(isset($_SESSION['ftp_User']) && isset($_SESSION['login_details']) && isset($_SESSION['data'])){
	
	$ftpUser = $_SESSION['ftp_User'];
	
	if($ftpUser->checkLogin()){
	//user has logged in area
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
<div class="w3-top">
  <div class="w3-row w3-padding w3-theme">
    <div class="w3-col s3">
      <a href="#" class="w3-button w3-block w3-theme kel-hover-2">HOME</a>
    </div>
    <div class="w3-col s3">
      <a href="#about" class="w3-button w3-block w3-theme kel-hover-2">ABOUT</a>
    </div>
    <div class="w3-col s3">
      <a href="#menu" class="w3-button w3-block w3-theme kel-hover-2">MENU</a>
    </div>
    <div class="w3-col s3">
      <a href="logout.php" class="w3-button w3-block w3-theme kel-hover-2 Logout">LOGOUT</a>
    </div>
  </div>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px;margin-top:53px" id="mySidebar">
  <div class = "w3-xxlarge w3-padding">
	<b>Directory list</b>
  </div>
  <div class="w3-padding-32 w3-large w3-text-grey" style="font-weight:bold">
    <a href="#" class="w3-bar-item w3-button">Shirts</a>
    <a href="#" class="w3-bar-item w3-button">Dresses</a>
    <a onclick="myAccFunc()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
      Jeans <i class="fa fa-caret-down"></i>
    </a>
    <div id="demoAcc" class="w3-bar-block w3-hide w3-padding-large w3-medium">
      <a href="#" class="w3-bar-item w3-button w3-light-grey"><i class="fa fa-caret-right w3-margin-right"></i>Skinny</a>
      <a href="#" class="w3-bar-item w3-button">Relaxed</a>
      <a href="#" class="w3-bar-item w3-button">Bootcut</a>
      <a href="#" class="w3-bar-item w3-button">Straight</a>
    </div>
    <a href="#" class="w3-bar-item w3-button">Jackets</a>
    <a href="#" class="w3-bar-item w3-button">Gymwear</a>
    <a href="#" class="w3-bar-item w3-button">Blazers</a>
    <a href="#" class="w3-bar-item w3-button">Shoes</a>  <a href="#" class="w3-bar-item w3-button">Jackets</a>
    <a href="#" class="w3-bar-item w3-button">Gymwear</a>
    <a href="#" class="w3-bar-item w3-button">Blazers</a>
    <a href="#" class="w3-bar-item w3-button">Shoes</a>  <a href="#" class="w3-bar-item w3-button">Jackets</a>
    <a href="#" class="w3-bar-item w3-button">Gymwear</a>
    <a href="#" class="w3-bar-item w3-button">Blazers</a>
    <a href="#" class="w3-bar-item w3-button">Shoes</a>  <a href="#" class="w3-bar-item w3-button">Jackets</a>
    <a href="#" class="w3-bar-item w3-button">Gymwear</a>
    <a href="#" class="w3-bar-item w3-button">Blazers</a>
    <a href="#" class="w3-bar-item w3-button">Shoes</a>
  </div>
  
</nav>

<div class="w3-main" style="margin-left:250px;margin-top:53px">

<div class="w3-bar w3-theme-dark w3-padding">
	<a href="#" class="w3-bar-item w3-button w3-border w3-margin-right kel-hover-2"><i class="fa fa-folder-open w3-large"></i> New Folder</a>
    <a href="#" class="w3-bar-item w3-button w3-border w3-margin-right kel-hover-2"><i class="fa fa-upload w3-large"></i> Upload File</a>
</div>

<div class="w3-bar w3-theme-l1 w3-padding">

	<a class="w3-bar-item w3-large"><b>Operations:</b></a>
    <a href="#" class="w3-bar-item w3-button w3-border w3-border-black w3-hover-white w3-margin-right kel-hover-2"><i class="fa fa-i-cursor w3-large"></i> Rename</a>
	<a href="#" class="w3-bar-item w3-button w3-border w3-border-black w3-hover-white w3-margin-right kel-hover-2"><i class="fa fa-remove w3-large"></i> Remove</a>
	<a href="#" class="w3-bar-item w3-button w3-border w3-border-black w3-hover-white w3-margin-right kel-hover-2"><i class="fa fa-download w3-large"></i> Download</a>
	<a href="#" class="w3-bar-item w3-button w3-border w3-border-black w3-hover-white w3-margin-right kel-hover-2"><i class="fa fa-arrows w3-large"></i> Move</a>

</div>

<div class="w3-bar-block">

	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-folder w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-folder w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-folder w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-folder w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-file-o w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-file-o w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-file-o w3-large"></i> Rename</span>

</div>
</div>


</body>
</html>
<!-- user has logged in 
You are successfully logged in
<a href="logout.php">Logout</a>
<br><br>
<input type="text" id="name">
<button onclick="addDir()">Add</button>
<script>

let addDir = () => {
	
	let name = document.getElementById("name").value;
	
	let str = "Name="+name;
	let xhttp = new XMLHttpRequest();
	//let loader = document.getElementById('loader');
	xhttp.onreadystatechange = function() {
		//loader.style.display = "block";
		if(this.readyState == 4 && this.status == 200){
			//document.getElementById('error').innerHTML = this.responseText;
			//loader.style.display = "none";
				alert(this.responseText);
		}
	}
	xhttp.open("POST", "Action/addDir.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(str);
	
}

</script>
-->
<?php	
	}
	else{
		echo "You are not logged in";
		header("Location:logout.php");
	}
}
else{
	header("Location:logout.php");
}
require_once("Config/ftpClose.php");
?><?php

require_once("Config/ftpConnect.php");
include("Classes/classes.php");
session_start();

if(isset($_SESSION['ftp_User']) && isset($_SESSION['login_details']) && isset($_SESSION['data'])){
	
	$ftpUser = $_SESSION['ftp_User'];
	
	if($ftpUser->checkLogin()){
	//user has logged in area
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
<div class="w3-top">
  <div class="w3-row w3-padding w3-theme">
    <div class="w3-col s3">
      <a href="#" class="w3-button w3-block w3-theme kel-hover-2">HOME</a>
    </div>
    <div class="w3-col s3">
      <a href="#about" class="w3-button w3-block w3-theme kel-hover-2">ABOUT</a>
    </div>
    <div class="w3-col s3">
      <a href="#menu" class="w3-button w3-block w3-theme kel-hover-2">MENU</a>
    </div>
    <div class="w3-col s3">
      <a href="logout.php" class="w3-button w3-block w3-theme kel-hover-2 Logout">LOGOUT</a>
    </div>
  </div>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px;margin-top:53px" id="mySidebar">
  <div class = "w3-xxlarge w3-padding">
	<b>Directory list</b>
  </div>
  <div class="w3-padding-32 w3-large w3-text-grey" style="font-weight:bold">
    <a href="#" class="w3-bar-item w3-button">Shirts</a>
    <a href="#" class="w3-bar-item w3-button">Dresses</a>
    <a onclick="myAccFunc()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
      Jeans <i class="fa fa-caret-down"></i>
    </a>
    <div id="demoAcc" class="w3-bar-block w3-hide w3-padding-large w3-medium">
      <a href="#" class="w3-bar-item w3-button w3-light-grey"><i class="fa fa-caret-right w3-margin-right"></i>Skinny</a>
      <a href="#" class="w3-bar-item w3-button">Relaxed</a>
      <a href="#" class="w3-bar-item w3-button">Bootcut</a>
      <a href="#" class="w3-bar-item w3-button">Straight</a>
    </div>
    <a href="#" class="w3-bar-item w3-button">Jackets</a>
    <a href="#" class="w3-bar-item w3-button">Gymwear</a>
    <a href="#" class="w3-bar-item w3-button">Blazers</a>
    <a href="#" class="w3-bar-item w3-button">Shoes</a>  <a href="#" class="w3-bar-item w3-button">Jackets</a>
    <a href="#" class="w3-bar-item w3-button">Gymwear</a>
    <a href="#" class="w3-bar-item w3-button">Blazers</a>
    <a href="#" class="w3-bar-item w3-button">Shoes</a>  <a href="#" class="w3-bar-item w3-button">Jackets</a>
    <a href="#" class="w3-bar-item w3-button">Gymwear</a>
    <a href="#" class="w3-bar-item w3-button">Blazers</a>
    <a href="#" class="w3-bar-item w3-button">Shoes</a>  <a href="#" class="w3-bar-item w3-button">Jackets</a>
    <a href="#" class="w3-bar-item w3-button">Gymwear</a>
    <a href="#" class="w3-bar-item w3-button">Blazers</a>
    <a href="#" class="w3-bar-item w3-button">Shoes</a>
  </div>
  
</nav>

<div class="w3-main" style="margin-left:250px;margin-top:53px">

<div class="w3-bar w3-theme-dark w3-padding">
	<a href="#" class="w3-bar-item w3-button w3-border w3-margin-right kel-hover-2"><i class="fa fa-folder-open w3-large"></i> New Folder</a>
    <a href="#" class="w3-bar-item w3-button w3-border w3-margin-right kel-hover-2"><i class="fa fa-upload w3-large"></i> Upload File</a>
</div>

<div class="w3-bar w3-theme-l1 w3-padding">

	<a class="w3-bar-item w3-large"><b>Operations:</b></a>
    <a href="#" class="w3-bar-item w3-button w3-border w3-border-black w3-hover-white w3-margin-right kel-hover-2"><i class="fa fa-i-cursor w3-large"></i> Rename</a>
	<a href="#" class="w3-bar-item w3-button w3-border w3-border-black w3-hover-white w3-margin-right kel-hover-2"><i class="fa fa-remove w3-large"></i> Remove</a>
	<a href="#" class="w3-bar-item w3-button w3-border w3-border-black w3-hover-white w3-margin-right kel-hover-2"><i class="fa fa-download w3-large"></i> Download</a>
	<a href="#" class="w3-bar-item w3-button w3-border w3-border-black w3-hover-white w3-margin-right kel-hover-2"><i class="fa fa-arrows w3-large"></i> Move</a>

</div>

<div class="w3-bar-block">

	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-folder w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-folder w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-folder w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-folder w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-file-o w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-file-o w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-file-o w3-large"></i> Rename</span>

</div>
</div>


</body>
</html>
<!-- user has logged in 
You are successfully logged in
<a href="logout.php">Logout</a>
<br><br>
<input type="text" id="name">
<button onclick="addDir()">Add</button>
<script>

let addDir = () => {
	
	let name = document.getElementById("name").value;
	
	let str = "Name="+name;
	let xhttp = new XMLHttpRequest();
	//let loader = document.getElementById('loader');
	xhttp.onreadystatechange = function() {
		//loader.style.display = "block";
		if(this.readyState == 4 && this.status == 200){
			//document.getElementById('error').innerHTML = this.responseText;
			//loader.style.display = "none";
				alert(this.responseText);
		}
	}
	xhttp.open("POST", "Action/addDir.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(str);
	
}

</script>
-->
<?php	
	}
	else{
		echo "You are not logged in";
		header("Location:logout.php");
	}
}
else{
	header("Location:logout.php");
}
require_once("Config/ftpClose.php");
?><?php

require_once("Config/ftpConnect.php");
include("Classes/classes.php");
session_start();

if(isset($_SESSION['ftp_User']) && isset($_SESSION['login_details']) && isset($_SESSION['data'])){
	
	$ftpUser = $_SESSION['ftp_User'];
	
	if($ftpUser->checkLogin()){
	//user has logged in area
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
<div class="w3-top">
  <div class="w3-row w3-padding w3-theme">
    <div class="w3-col s3">
      <a href="#" class="w3-button w3-block w3-theme kel-hover-2">HOME</a>
    </div>
    <div class="w3-col s3">
      <a href="#about" class="w3-button w3-block w3-theme kel-hover-2">ABOUT</a>
    </div>
    <div class="w3-col s3">
      <a href="#menu" class="w3-button w3-block w3-theme kel-hover-2">MENU</a>
    </div>
    <div class="w3-col s3">
      <a href="logout.php" class="w3-button w3-block w3-theme kel-hover-2 Logout">LOGOUT</a>
    </div>
  </div>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px;margin-top:53px" id="mySidebar">
  <div class = "w3-xxlarge w3-padding">
	<b>Directory list</b>
  </div>
  <div class="w3-padding-32 w3-large w3-text-grey" style="font-weight:bold">
    <a href="#" class="w3-bar-item w3-button">Shirts</a>
    <a href="#" class="w3-bar-item w3-button">Dresses</a>
    <a onclick="myAccFunc()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
      Jeans <i class="fa fa-caret-down"></i>
    </a>
    <div id="demoAcc" class="w3-bar-block w3-hide w3-padding-large w3-medium">
      <a href="#" class="w3-bar-item w3-button w3-light-grey"><i class="fa fa-caret-right w3-margin-right"></i>Skinny</a>
      <a href="#" class="w3-bar-item w3-button">Relaxed</a>
      <a href="#" class="w3-bar-item w3-button">Bootcut</a>
      <a href="#" class="w3-bar-item w3-button">Straight</a>
    </div>
    <a href="#" class="w3-bar-item w3-button">Jackets</a>
    <a href="#" class="w3-bar-item w3-button">Gymwear</a>
    <a href="#" class="w3-bar-item w3-button">Blazers</a>
    <a href="#" class="w3-bar-item w3-button">Shoes</a>  <a href="#" class="w3-bar-item w3-button">Jackets</a>
    <a href="#" class="w3-bar-item w3-button">Gymwear</a>
    <a href="#" class="w3-bar-item w3-button">Blazers</a>
    <a href="#" class="w3-bar-item w3-button">Shoes</a>  <a href="#" class="w3-bar-item w3-button">Jackets</a>
    <a href="#" class="w3-bar-item w3-button">Gymwear</a>
    <a href="#" class="w3-bar-item w3-button">Blazers</a>
    <a href="#" class="w3-bar-item w3-button">Shoes</a>  <a href="#" class="w3-bar-item w3-button">Jackets</a>
    <a href="#" class="w3-bar-item w3-button">Gymwear</a>
    <a href="#" class="w3-bar-item w3-button">Blazers</a>
    <a href="#" class="w3-bar-item w3-button">Shoes</a>
  </div>
  
</nav>

<div class="w3-main" style="margin-left:250px;margin-top:53px">

<div class="w3-bar w3-theme-dark w3-padding">
	<a href="#" class="w3-bar-item w3-button w3-border w3-margin-right kel-hover-2"><i class="fa fa-folder-open w3-large"></i> New Folder</a>
    <a href="#" class="w3-bar-item w3-button w3-border w3-margin-right kel-hover-2"><i class="fa fa-upload w3-large"></i> Upload File</a>
</div>

<div class="w3-bar w3-theme-l1 w3-padding">

	<a class="w3-bar-item w3-large"><b>Operations:</b></a>
    <a href="#" class="w3-bar-item w3-button w3-border w3-border-black w3-hover-white w3-margin-right kel-hover-2"><i class="fa fa-i-cursor w3-large"></i> Rename</a>
	<a href="#" class="w3-bar-item w3-button w3-border w3-border-black w3-hover-white w3-margin-right kel-hover-2"><i class="fa fa-remove w3-large"></i> Remove</a>
	<a href="#" class="w3-bar-item w3-button w3-border w3-border-black w3-hover-white w3-margin-right kel-hover-2"><i class="fa fa-download w3-large"></i> Download</a>
	<a href="#" class="w3-bar-item w3-button w3-border w3-border-black w3-hover-white w3-margin-right kel-hover-2"><i class="fa fa-arrows w3-large"></i> Move</a>

</div>

<div class="w3-bar-block">

	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-folder w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-folder w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-folder w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-folder w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-file-o w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-file-o w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-file-o w3-large"></i> Rename</span>

</div>
</div>


</body>
</html>
<!-- user has logged in 
You are successfully logged in
<a href="logout.php">Logout</a>
<br><br>
<input type="text" id="name">
<button onclick="addDir()">Add</button>
<script>

let addDir = () => {
	
	let name = document.getElementById("name").value;
	
	let str = "Name="+name;
	let xhttp = new XMLHttpRequest();
	//let loader = document.getElementById('loader');
	xhttp.onreadystatechange = function() {
		//loader.style.display = "block";
		if(this.readyState == 4 && this.status == 200){
			//document.getElementById('error').innerHTML = this.responseText;
			//loader.style.display = "none";
				alert(this.responseText);
		}
	}
	xhttp.open("POST", "Action/addDir.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(str);
	
}

</script>
-->
<?php	
	}
	else{
		echo "You are not logged in";
		header("Location:logout.php");
	}
}
else{
	header("Location:logout.php");
}
require_once("Config/ftpClose.php");
?><?php

require_once("Config/ftpConnect.php");
include("Classes/classes.php");
session_start();

if(isset($_SESSION['ftp_User']) && isset($_SESSION['login_details']) && isset($_SESSION['data'])){
	
	$ftpUser = $_SESSION['ftp_User'];
	
	if($ftpUser->checkLogin()){
	//user has logged in area
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
<div class="w3-top">
  <div class="w3-row w3-padding w3-theme">
    <div class="w3-col s3">
      <a href="#" class="w3-button w3-block w3-theme kel-hover-2">HOME</a>
    </div>
    <div class="w3-col s3">
      <a href="#about" class="w3-button w3-block w3-theme kel-hover-2">ABOUT</a>
    </div>
    <div class="w3-col s3">
      <a href="#menu" class="w3-button w3-block w3-theme kel-hover-2">MENU</a>
    </div>
    <div class="w3-col s3">
      <a href="logout.php" class="w3-button w3-block w3-theme kel-hover-2 Logout">LOGOUT</a>
    </div>
  </div>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px;margin-top:53px" id="mySidebar">
  <div class = "w3-xxlarge w3-padding">
	<b>Directory list</b>
  </div>
  <div class="w3-padding-32 w3-large w3-text-grey" style="font-weight:bold">
    <a href="#" class="w3-bar-item w3-button">Shirts</a>
    <a href="#" class="w3-bar-item w3-button">Dresses</a>
    <a onclick="myAccFunc()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
      Jeans <i class="fa fa-caret-down"></i>
    </a>
    <div id="demoAcc" class="w3-bar-block w3-hide w3-padding-large w3-medium">
      <a href="#" class="w3-bar-item w3-button w3-light-grey"><i class="fa fa-caret-right w3-margin-right"></i>Skinny</a>
      <a href="#" class="w3-bar-item w3-button">Relaxed</a>
      <a href="#" class="w3-bar-item w3-button">Bootcut</a>
      <a href="#" class="w3-bar-item w3-button">Straight</a>
    </div>
    <a href="#" class="w3-bar-item w3-button">Jackets</a>
    <a href="#" class="w3-bar-item w3-button">Gymwear</a>
    <a href="#" class="w3-bar-item w3-button">Blazers</a>
    <a href="#" class="w3-bar-item w3-button">Shoes</a>  <a href="#" class="w3-bar-item w3-button">Jackets</a>
    <a href="#" class="w3-bar-item w3-button">Gymwear</a>
    <a href="#" class="w3-bar-item w3-button">Blazers</a>
    <a href="#" class="w3-bar-item w3-button">Shoes</a>  <a href="#" class="w3-bar-item w3-button">Jackets</a>
    <a href="#" class="w3-bar-item w3-button">Gymwear</a>
    <a href="#" class="w3-bar-item w3-button">Blazers</a>
    <a href="#" class="w3-bar-item w3-button">Shoes</a>  <a href="#" class="w3-bar-item w3-button">Jackets</a>
    <a href="#" class="w3-bar-item w3-button">Gymwear</a>
    <a href="#" class="w3-bar-item w3-button">Blazers</a>
    <a href="#" class="w3-bar-item w3-button">Shoes</a>
  </div>
  
</nav>

<div class="w3-main" style="margin-left:250px;margin-top:53px">

<div class="w3-bar w3-theme-dark w3-padding">
	<a href="#" class="w3-bar-item w3-button w3-border w3-margin-right kel-hover-2"><i class="fa fa-folder-open w3-large"></i> New Folder</a>
    <a href="#" class="w3-bar-item w3-button w3-border w3-margin-right kel-hover-2"><i class="fa fa-upload w3-large"></i> Upload File</a>
</div>

<div class="w3-bar w3-theme-l1 w3-padding">

	<a class="w3-bar-item w3-large"><b>Operations:</b></a>
    <a href="#" class="w3-bar-item w3-button w3-border w3-border-black w3-hover-white w3-margin-right kel-hover-2"><i class="fa fa-i-cursor w3-large"></i> Rename</a>
	<a href="#" class="w3-bar-item w3-button w3-border w3-border-black w3-hover-white w3-margin-right kel-hover-2"><i class="fa fa-remove w3-large"></i> Remove</a>
	<a href="#" class="w3-bar-item w3-button w3-border w3-border-black w3-hover-white w3-margin-right kel-hover-2"><i class="fa fa-download w3-large"></i> Download</a>
	<a href="#" class="w3-bar-item w3-button w3-border w3-border-black w3-hover-white w3-margin-right kel-hover-2"><i class="fa fa-arrows w3-large"></i> Move</a>

</div>

<div class="w3-bar-block">

	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-folder w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-folder w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-folder w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-folder w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-file-o w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-file-o w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-file-o w3-large"></i> Rename</span>

</div>
</div>


</body>
</html>
<!-- user has logged in 
You are successfully logged in
<a href="logout.php">Logout</a>
<br><br>
<input type="text" id="name">
<button onclick="addDir()">Add</button>
<script>

let addDir = () => {
	
	let name = document.getElementById("name").value;
	
	let str = "Name="+name;
	let xhttp = new XMLHttpRequest();
	//let loader = document.getElementById('loader');
	xhttp.onreadystatechange = function() {
		//loader.style.display = "block";
		if(this.readyState == 4 && this.status == 200){
			//document.getElementById('error').innerHTML = this.responseText;
			//loader.style.display = "none";
				alert(this.responseText);
		}
	}
	xhttp.open("POST", "Action/addDir.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(str);
	
}

</script>
-->
<?php	
	}
	else{
		echo "You are not logged in";
		header("Location:logout.php");
	}
}
else{
	header("Location:logout.php");
}
require_once("Config/ftpClose.php");
?><?php

require_once("Config/ftpConnect.php");
include("Classes/classes.php");
session_start();

if(isset($_SESSION['ftp_User']) && isset($_SESSION['login_details']) && isset($_SESSION['data'])){
	
	$ftpUser = $_SESSION['ftp_User'];
	
	if($ftpUser->checkLogin()){
	//user has logged in area
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
<div class="w3-top">
  <div class="w3-row w3-padding w3-theme">
    <div class="w3-col s3">
      <a href="#" class="w3-button w3-block w3-theme kel-hover-2">HOME</a>
    </div>
    <div class="w3-col s3">
      <a href="#about" class="w3-button w3-block w3-theme kel-hover-2">ABOUT</a>
    </div>
    <div class="w3-col s3">
      <a href="#menu" class="w3-button w3-block w3-theme kel-hover-2">MENU</a>
    </div>
    <div class="w3-col s3">
      <a href="logout.php" class="w3-button w3-block w3-theme kel-hover-2 Logout">LOGOUT</a>
    </div>
  </div>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px;margin-top:53px" id="mySidebar">
  <div class = "w3-xxlarge w3-padding">
	<b>Directory list</b>
  </div>
  <div class="w3-padding-32 w3-large w3-text-grey" style="font-weight:bold">
    <a href="#" class="w3-bar-item w3-button">Shirts</a>
    <a href="#" class="w3-bar-item w3-button">Dresses</a>
    <a onclick="myAccFunc()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
      Jeans <i class="fa fa-caret-down"></i>
    </a>
    <div id="demoAcc" class="w3-bar-block w3-hide w3-padding-large w3-medium">
      <a href="#" class="w3-bar-item w3-button w3-light-grey"><i class="fa fa-caret-right w3-margin-right"></i>Skinny</a>
      <a href="#" class="w3-bar-item w3-button">Relaxed</a>
      <a href="#" class="w3-bar-item w3-button">Bootcut</a>
      <a href="#" class="w3-bar-item w3-button">Straight</a>
    </div>
    <a href="#" class="w3-bar-item w3-button">Jackets</a>
    <a href="#" class="w3-bar-item w3-button">Gymwear</a>
    <a href="#" class="w3-bar-item w3-button">Blazers</a>
    <a href="#" class="w3-bar-item w3-button">Shoes</a>  <a href="#" class="w3-bar-item w3-button">Jackets</a>
    <a href="#" class="w3-bar-item w3-button">Gymwear</a>
    <a href="#" class="w3-bar-item w3-button">Blazers</a>
    <a href="#" class="w3-bar-item w3-button">Shoes</a>  <a href="#" class="w3-bar-item w3-button">Jackets</a>
    <a href="#" class="w3-bar-item w3-button">Gymwear</a>
    <a href="#" class="w3-bar-item w3-button">Blazers</a>
    <a href="#" class="w3-bar-item w3-button">Shoes</a>  <a href="#" class="w3-bar-item w3-button">Jackets</a>
    <a href="#" class="w3-bar-item w3-button">Gymwear</a>
    <a href="#" class="w3-bar-item w3-button">Blazers</a>
    <a href="#" class="w3-bar-item w3-button">Shoes</a>
  </div>
  
</nav>

<div class="w3-main" style="margin-left:250px;margin-top:53px">

<div class="w3-bar w3-theme-dark w3-padding">
	<a href="#" class="w3-bar-item w3-button w3-border w3-margin-right kel-hover-2"><i class="fa fa-folder-open w3-large"></i> New Folder</a>
    <a href="#" class="w3-bar-item w3-button w3-border w3-margin-right kel-hover-2"><i class="fa fa-upload w3-large"></i> Upload File</a>
</div>

<div class="w3-bar w3-theme-l1 w3-padding">

	<a class="w3-bar-item w3-large"><b>Operations:</b></a>
    <a href="#" class="w3-bar-item w3-button w3-border w3-border-black w3-hover-white w3-margin-right kel-hover-2"><i class="fa fa-i-cursor w3-large"></i> Rename</a>
	<a href="#" class="w3-bar-item w3-button w3-border w3-border-black w3-hover-white w3-margin-right kel-hover-2"><i class="fa fa-remove w3-large"></i> Remove</a>
	<a href="#" class="w3-bar-item w3-button w3-border w3-border-black w3-hover-white w3-margin-right kel-hover-2"><i class="fa fa-download w3-large"></i> Download</a>
	<a href="#" class="w3-bar-item w3-button w3-border w3-border-black w3-hover-white w3-margin-right kel-hover-2"><i class="fa fa-arrows w3-large"></i> Move</a>

</div>

<div class="w3-bar-block">

	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-folder w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-folder w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-folder w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-folder w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-file-o w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-file-o w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-file-o w3-large"></i> Rename</span>

</div>
</div>


</body>
</html>
<!-- user has logged in 
You are successfully logged in
<a href="logout.php">Logout</a>
<br><br>
<input type="text" id="name">
<button onclick="addDir()">Add</button>
<script>

let addDir = () => {
	
	let name = document.getElementById("name").value;
	
	let str = "Name="+name;
	let xhttp = new XMLHttpRequest();
	//let loader = document.getElementById('loader');
	xhttp.onreadystatechange = function() {
		//loader.style.display = "block";
		if(this.readyState == 4 && this.status == 200){
			//document.getElementById('error').innerHTML = this.responseText;
			//loader.style.display = "none";
				alert(this.responseText);
		}
	}
	xhttp.open("POST", "Action/addDir.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(str);
	
}

</script>
-->
<?php	
	}
	else{
		echo "You are not logged in";
		header("Location:logout.php");
	}
}
else{
	header("Location:logout.php");
}
require_once("Config/ftpClose.php");
?><?php

require_once("Config/ftpConnect.php");
include("Classes/classes.php");
session_start();

if(isset($_SESSION['ftp_User']) && isset($_SESSION['login_details']) && isset($_SESSION['data'])){
	
	$ftpUser = $_SESSION['ftp_User'];
	
	if($ftpUser->checkLogin()){
	//user has logged in area
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
<div class="w3-top">
  <div class="w3-row w3-padding w3-theme">
    <div class="w3-col s3">
      <a href="#" class="w3-button w3-block w3-theme kel-hover-2">HOME</a>
    </div>
    <div class="w3-col s3">
      <a href="#about" class="w3-button w3-block w3-theme kel-hover-2">ABOUT</a>
    </div>
    <div class="w3-col s3">
      <a href="#menu" class="w3-button w3-block w3-theme kel-hover-2">MENU</a>
    </div>
    <div class="w3-col s3">
      <a href="logout.php" class="w3-button w3-block w3-theme kel-hover-2 Logout">LOGOUT</a>
    </div>
  </div>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px;margin-top:53px" id="mySidebar">
  <div class = "w3-xxlarge w3-padding">
	<b>Directory list</b>
  </div>
  <div class="w3-padding-32 w3-large w3-text-grey" style="font-weight:bold">
    <a href="#" class="w3-bar-item w3-button">Shirts</a>
    <a href="#" class="w3-bar-item w3-button">Dresses</a>
    <a onclick="myAccFunc()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
      Jeans <i class="fa fa-caret-down"></i>
    </a>
    <div id="demoAcc" class="w3-bar-block w3-hide w3-padding-large w3-medium">
      <a href="#" class="w3-bar-item w3-button w3-light-grey"><i class="fa fa-caret-right w3-margin-right"></i>Skinny</a>
      <a href="#" class="w3-bar-item w3-button">Relaxed</a>
      <a href="#" class="w3-bar-item w3-button">Bootcut</a>
      <a href="#" class="w3-bar-item w3-button">Straight</a>
    </div>
    <a href="#" class="w3-bar-item w3-button">Jackets</a>
    <a href="#" class="w3-bar-item w3-button">Gymwear</a>
    <a href="#" class="w3-bar-item w3-button">Blazers</a>
    <a href="#" class="w3-bar-item w3-button">Shoes</a>  <a href="#" class="w3-bar-item w3-button">Jackets</a>
    <a href="#" class="w3-bar-item w3-button">Gymwear</a>
    <a href="#" class="w3-bar-item w3-button">Blazers</a>
    <a href="#" class="w3-bar-item w3-button">Shoes</a>  <a href="#" class="w3-bar-item w3-button">Jackets</a>
    <a href="#" class="w3-bar-item w3-button">Gymwear</a>
    <a href="#" class="w3-bar-item w3-button">Blazers</a>
    <a href="#" class="w3-bar-item w3-button">Shoes</a>  <a href="#" class="w3-bar-item w3-button">Jackets</a>
    <a href="#" class="w3-bar-item w3-button">Gymwear</a>
    <a href="#" class="w3-bar-item w3-button">Blazers</a>
    <a href="#" class="w3-bar-item w3-button">Shoes</a>
  </div>
  
</nav>

<div class="w3-main" style="margin-left:250px;margin-top:53px">

<div class="w3-bar w3-theme-dark w3-padding">
	<a href="#" class="w3-bar-item w3-button w3-border w3-margin-right kel-hover-2"><i class="fa fa-folder-open w3-large"></i> New Folder</a>
    <a href="#" class="w3-bar-item w3-button w3-border w3-margin-right kel-hover-2"><i class="fa fa-upload w3-large"></i> Upload File</a>
</div>

<div class="w3-bar w3-theme-l1 w3-padding">

	<a class="w3-bar-item w3-large"><b>Operations:</b></a>
    <a href="#" class="w3-bar-item w3-button w3-border w3-border-black w3-hover-white w3-margin-right kel-hover-2"><i class="fa fa-i-cursor w3-large"></i> Rename</a>
	<a href="#" class="w3-bar-item w3-button w3-border w3-border-black w3-hover-white w3-margin-right kel-hover-2"><i class="fa fa-remove w3-large"></i> Remove</a>
	<a href="#" class="w3-bar-item w3-button w3-border w3-border-black w3-hover-white w3-margin-right kel-hover-2"><i class="fa fa-download w3-large"></i> Download</a>
	<a href="#" class="w3-bar-item w3-button w3-border w3-border-black w3-hover-white w3-margin-right kel-hover-2"><i class="fa fa-arrows w3-large"></i> Move</a>

</div>

<div class="w3-bar-block">

	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-folder w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-folder w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-folder w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-folder w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-file-o w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-file-o w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-file-o w3-large"></i> Rename</span>

</div>
</div>


</body>
</html>
<!-- user has logged in 
You are successfully logged in
<a href="logout.php">Logout</a>
<br><br>
<input type="text" id="name">
<button onclick="addDir()">Add</button>
<script>

let addDir = () => {
	
	let name = document.getElementById("name").value;
	
	let str = "Name="+name;
	let xhttp = new XMLHttpRequest();
	//let loader = document.getElementById('loader');
	xhttp.onreadystatechange = function() {
		//loader.style.display = "block";
		if(this.readyState == 4 && this.status == 200){
			//document.getElementById('error').innerHTML = this.responseText;
			//loader.style.display = "none";
				alert(this.responseText);
		}
	}
	xhttp.open("POST", "Action/addDir.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(str);
	
}

</script>
-->
<?php	
	}
	else{
		echo "You are not logged in";
		header("Location:logout.php");
	}
}
else{
	header("Location:logout.php");
}
require_once("Config/ftpClose.php");
?><?php

require_once("Config/ftpConnect.php");
include("Classes/classes.php");
session_start();

if(isset($_SESSION['ftp_User']) && isset($_SESSION['login_details']) && isset($_SESSION['data'])){
	
	$ftpUser = $_SESSION['ftp_User'];
	
	if($ftpUser->checkLogin()){
	//user has logged in area
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
<div class="w3-top">
  <div class="w3-row w3-padding w3-theme">
    <div class="w3-col s3">
      <a href="#" class="w3-button w3-block w3-theme kel-hover-2">HOME</a>
    </div>
    <div class="w3-col s3">
      <a href="#about" class="w3-button w3-block w3-theme kel-hover-2">ABOUT</a>
    </div>
    <div class="w3-col s3">
      <a href="#menu" class="w3-button w3-block w3-theme kel-hover-2">MENU</a>
    </div>
    <div class="w3-col s3">
      <a href="logout.php" class="w3-button w3-block w3-theme kel-hover-2 Logout">LOGOUT</a>
    </div>
  </div>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px;margin-top:53px" id="mySidebar">
  <div class = "w3-xxlarge w3-padding">
	<b>Directory list</b>
  </div>
  <div class="w3-padding-32 w3-large w3-text-grey" style="font-weight:bold">
    <a href="#" class="w3-bar-item w3-button">Shirts</a>
    <a href="#" class="w3-bar-item w3-button">Dresses</a>
    <a onclick="myAccFunc()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
      Jeans <i class="fa fa-caret-down"></i>
    </a>
    <div id="demoAcc" class="w3-bar-block w3-hide w3-padding-large w3-medium">
      <a href="#" class="w3-bar-item w3-button w3-light-grey"><i class="fa fa-caret-right w3-margin-right"></i>Skinny</a>
      <a href="#" class="w3-bar-item w3-button">Relaxed</a>
      <a href="#" class="w3-bar-item w3-button">Bootcut</a>
      <a href="#" class="w3-bar-item w3-button">Straight</a>
    </div>
    <a href="#" class="w3-bar-item w3-button">Jackets</a>
    <a href="#" class="w3-bar-item w3-button">Gymwear</a>
    <a href="#" class="w3-bar-item w3-button">Blazers</a>
    <a href="#" class="w3-bar-item w3-button">Shoes</a>  <a href="#" class="w3-bar-item w3-button">Jackets</a>
    <a href="#" class="w3-bar-item w3-button">Gymwear</a>
    <a href="#" class="w3-bar-item w3-button">Blazers</a>
    <a href="#" class="w3-bar-item w3-button">Shoes</a>  <a href="#" class="w3-bar-item w3-button">Jackets</a>
    <a href="#" class="w3-bar-item w3-button">Gymwear</a>
    <a href="#" class="w3-bar-item w3-button">Blazers</a>
    <a href="#" class="w3-bar-item w3-button">Shoes</a>  <a href="#" class="w3-bar-item w3-button">Jackets</a>
    <a href="#" class="w3-bar-item w3-button">Gymwear</a>
    <a href="#" class="w3-bar-item w3-button">Blazers</a>
    <a href="#" class="w3-bar-item w3-button">Shoes</a>
  </div>
  
</nav>

<div class="w3-main" style="margin-left:250px;margin-top:53px">

<div class="w3-bar w3-theme-dark w3-padding">
	<a href="#" class="w3-bar-item w3-button w3-border w3-margin-right kel-hover-2"><i class="fa fa-folder-open w3-large"></i> New Folder</a>
    <a href="#" class="w3-bar-item w3-button w3-border w3-margin-right kel-hover-2"><i class="fa fa-upload w3-large"></i> Upload File</a>
</div>

<div class="w3-bar w3-theme-l1 w3-padding">

	<a class="w3-bar-item w3-large"><b>Operations:</b></a>
    <a href="#" class="w3-bar-item w3-button w3-border w3-border-black w3-hover-white w3-margin-right kel-hover-2"><i class="fa fa-i-cursor w3-large"></i> Rename</a>
	<a href="#" class="w3-bar-item w3-button w3-border w3-border-black w3-hover-white w3-margin-right kel-hover-2"><i class="fa fa-remove w3-large"></i> Remove</a>
	<a href="#" class="w3-bar-item w3-button w3-border w3-border-black w3-hover-white w3-margin-right kel-hover-2"><i class="fa fa-download w3-large"></i> Download</a>
	<a href="#" class="w3-bar-item w3-button w3-border w3-border-black w3-hover-white w3-margin-right kel-hover-2"><i class="fa fa-arrows w3-large"></i> Move</a>

</div>

<div class="w3-bar-block">

	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-folder w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-folder w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-folder w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-folder w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-file-o w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-file-o w3-large"></i> Rename</span>
	<span href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2"><input type="checkbox" class="w3-margin-right"> <i class="fa fa-file-o w3-large"></i> Rename</span>

</div>
</div>


</body>
</html>
<!-- user has logged in 
You are successfully logged in
<a href="logout.php">Logout</a>
<br><br>
<input type="text" id="name">
<button onclick="addDir()">Add</button>
<script>

let addDir = () => {
	
	let name = document.getElementById("name").value;
	
	let str = "Name="+name;
	let xhttp = new XMLHttpRequest();
	//let loader = document.getElementById('loader');
	xhttp.onreadystatechange = function() {
		//loader.style.display = "block";
		if(this.readyState == 4 && this.status == 200){
			//document.getElementById('error').innerHTML = this.responseText;
			//loader.style.display = "none";
				alert(this.responseText);
		}
	}
	xhttp.open("POST", "Action/addDir.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(str);
	
}

</script>
-->
<?php	
	}
	else{
		echo "You are not logged in";
		header("Location:logout.php");
	}
}
else{
	header("Location:logout.php");
}
require_once("Config/ftpClose.php");
?>