<?php

require_once("Config/ftpConnect.php");
include("Classes/classes.php");
session_start();
//$_SESSION['directory'] = "";
if(isset($_SESSION['ftp_User']) && isset($_SESSION['login_details']) && isset($_SESSION['data'])){
	
	$ftpUser = $_SESSION['ftp_User'];
	$data = $_SESSION['data'];
	
	if($ftpUser->checkLogin()){
		
		if(isset($_POST["submit"])){
			
			$dirLoc = $_SESSION['directory'];
			$uploadFile = $_FILES["file"]["tmp_name"];
			$name = basename($_FILES["file"]["name"]);
			
			if($ftpUser->uploadFile($data, $ftp_conn, $dirLoc."/".$name, $uploadFile)){
?>
<div id="sus" class="w3-modal w3-display-middle" style="z-index:4;display:block" onclick="document.getElementById('sus').style.display = 'none'">
	<span class="w3-modal-content">
	<center>
	<div class="w3-padding w3-green w3-large w3-padding w3-round w3-animate-zoom kel-hover-2" style="max-width:400px;">
		File uploaded succesfully
	</div>
	</center>
	</span>
</div>
<?php
			}
			else{
?>
<div id="fail" class="w3-modal w3-display-middle" style="z-index:4;display:block" onclick="document.getElementById('fail').style.display = 'none'">
	<span class="w3-modal-content">
	<center>
	<div class="w3-padding w3-pale-red w3-text-red w3-large w3-padding w3-round w3-animate-zoom" style="max-width:400px;">
		File did not uploaded
	</div>
	</center>
	</span>
</div>
<?php
			}
			
		}
		
	//user has logged in area
?>
<!DOCTYPE html>
<html>
	<head>
		<title>FTP-Browser | Browse files</title>
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
			input[type='file'] {
    border: 3px dashed #999;
    padding: 140px 50px 10px 50px;
    cursor: move;
    position:relative;
}
input[type='file']:before {
    content: "drag & drop your files here";
    display: block;
    position: absolute;
    text-align: center;
    top: 50%;
    left: 50%;
    width: 200px;
    height: 40px;
    margin: -25px 0 0 -100px;
    font-size: 18px;
    font-weight: bold;
    color: #999;
}
		</style>
	</head>
<body>

<?php
	include("Contains/models.php");
?>

<div>
  <div class="w3-bar w3-padding w3-theme">
    <div class="w3-col s3">
      <a class="w3-padding w3-block w3-theme" style="text-align:left;cursor:context-menu">FTP-BROWSER</a>
    </div>
    
    <div class="w3-col s1 w3-right">
      <a href="logout.php" class="w3-button w3-block w3-theme kel-hover-2 Logout" style="text-align:center">LOGOUT</a>
    </div>
  </div>
</div>

<!-- Sidebar/menu -->	
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px;margin-top:53px" id="mySidebar">
  <div class = "w3-xxlarge w3-padding">
	<b>Only root directory list</b>
  </div>
  <div class="w3-padding-32 w3-large w3-text-grey" style="font-weight:bold">
<?php
	
	$list = $ftpUser->makeListFolder($data, $ftp_conn, "/");
	
	foreach($list as $val){
?>
    <a class="w3-bar-item w3-button w3-border-bottom w3-hover-white w3-text-black" style="cursor:default"><?php echo $val ?></a>
<?php
	}
?>

  </div>
  
</nav>

<div class="w3-main" style="margin-left:250px;">

   
	<div class="w3-bar w3-theme-dark w3-padding">
	<button type="file" class="w3-bar-item w3-button w3-border w3-margin-right kel-hover-2" onclick="openUploadFile()"><i class="fa fa-upload w3-large"></i> Upload File</button>
	<a class="w3-bar-item w3-button w3-border w3-margin-right kel-hover-2" onclick="openFolderModal()"><i class="fa fa-folder-open w3-large"></i> New Folder</a>
	<a class="w3-bar-item w3-button w3-border w3-margin-right kel-hover-2" onclick="previousFolder()"><i class="fa fa-mail-reply w3-large"></i> Previous Folder</a>
	<a class="w3-bar-item w3-button w3-border w3-margin-right kel-hover-2" onclick="rootFolder()"><i class="fa fa-backward w3-large"></i> Root Folder</a>
</div>

<center>
<div class="loader w3-margin-top" id="list_loader"></div>
</center>

<div class="w3-bar-block" id="files&folders_list"></div>
</div>

<script src="JS/fileManager.js"></script>

</body>
</html>

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