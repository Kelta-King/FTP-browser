<?php

require_once("Config/ftpConnect.php");
include("Classes/classes.php");
session_start();

if(isset($_SESSION['ftp_User']) && isset($_SESSION['login_details']) && isset($_SESSION['data'])){
	
	$ftpUser = $_SESSION['ftp_User'];
	$data = $_SESSION['data'];
	
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
<div id="addFolder" class="w3-modal w3-display-middle" style="z-index:4">
	<span class="w3-modal-content">
	<center>
	<div class="w3-padding w3-theme w3-round w3-animate-zoom" style="max-width:400px;">
	<div class="">
		<span class="w3-right kel-hover-2" onclick="closeFolderModal()"><i class="fa fa-times"></i></span>
	</div>
	<span class="w3-xlarge">Add Folder</span>
	<div class="loader" id="loader-fold" style="display:none"></div>
	<div class="w3-text-red" id="error-fold"></div>
		<div class="w3-section">
			<input type="" id="fileName" class="w3-input w3-border" style="width:80%" placeholder="File name">
		</div>
		<div class="w3-section">
			<button class="w3-input w3-border kel-hover-2" onclick="addDir()" style="width:80%">Add Folder</button>
		</div>
	</div>
	</center>
	</span>
</div>

<div id="renameFile" class="w3-modal w3-display-middle" style="z-index:4">
	<span class="w3-modal-content">
	<center>
	<div class="w3-padding w3-theme w3-round w3-animate-zoom" style="max-width:400px;">
	<div class="">
		<span class="w3-right kel-hover-2" onclick="closeRenameModal()"><i class="fa fa-times"></i></span>
	</div>
	<span class="w3-xlarge">Rename</span>
	<div class="loader" id="loader-rename" style="display:none"></div>
	<div class="w3-text-red" id="error-rename"></div>
		<div class="w3-section">
		Old Name
			<input type="" id="oldName" class="w3-input w3-border" style="width:80%" placeholder="Old name">
		</div>
		<div class="w3-section">
		New Name
			<input type="" id="newName" class="w3-input w3-border" style="width:80%" placeholder="New name">
		</div>
		<div class="w3-section">
			<button class="w3-input kel-hover-2 w3-black" onclick="renameThing()" style="width:80%">Rename</button>
		</div>
	</div>
	</center>
	</span>
</div>

<div id="deleteFile" class="w3-modal w3-display-middle" style="z-index:4">
	<span class="w3-modal-content">
	<center>
	<div class="w3-padding w3-theme w3-round w3-animate-zoom" style="max-width:400px;">
	<div class="">
		<span class="w3-right kel-hover-2" onclick="closeDeleteFileModal()"><i class="fa fa-times"></i></span>
	</div>
	<span class="w3-xlarge">Are you sure?</span>
	<div class="loader" id="loader-del-file" style="display:none"></div>
	<div class="w3-text-red" id="error-del-file"></div>
	<span>
	Do you really want to delete <span id="filename_del"></span> file?
	</span>
		<div class="w3-bar w3-margin-top">
			<button class="w3-bar-item kel-hover-2 w3-light-gray w3-right" onclick="closeDeleteFileModal()" >cancel</button>
			<button class="w3-bar-item kel-hover-2 w3-black w3-right w3-margin-right" onclick="deleteFile()" >Yes</button>
		</div>
	</div>
	</center>
	</span>
</div>

<div id="deleteFolder" class="w3-modal w3-display-middle" style="z-index:4">
	<span class="w3-modal-content">
	<center>
	<div class="w3-padding w3-theme w3-round w3-animate-zoom" style="max-width:400px;">
	<div class="">
		<span class="w3-right kel-hover-2" onclick="closeDeleteFolderModal()"><i class="fa fa-times"></i></span>
	</div>
	<span class="w3-xlarge">Are you sure?</span>
	<div class="loader" id="loader-del-folder" style="display:none"></div>
	<div class="w3-text-red" id="error-del-folder"></div>
	<span>
	Do you really want to delete <span id="foldername_del"></span> Folder?
	</span>
		<div class="w3-bar w3-margin-top">
			<button class="w3-bar-item kel-hover-2 w3-light-gray w3-right" onclick="closeDeleteFolderModal()" >cancel</button>
			<button class="w3-bar-item kel-hover-2 w3-black w3-right w3-margin-right" onclick="deleteFolder()" >Yes</button>
		</div>
	</div>
	</center>
	</span>
</div>

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
	<b>Only directory list</b>
  </div>
  <div class="w3-padding-32 w3-large w3-text-grey" style="font-weight:bold">
<?php
	
	$list = $ftpUser->makeListFolder($data, $ftp_conn, ".");
	
	foreach($list as $val){
?>
    <a href="#" class="w3-bar-item w3-button w3-border-bottom kel-hover-2"><?php echo $val ?></a>
<?php
	}
?>

  </div>
  
</nav>

<div class="w3-main" style="margin-left:250px;margin-top:53px">

<div class="w3-bar w3-theme-dark w3-padding">
	<a class="w3-bar-item w3-button w3-border w3-margin-right kel-hover-2" onclick="openFolderModal()"><i class="fa fa-folder-open w3-large"></i> New Folder</a>
    <a class="w3-bar-item w3-button w3-border w3-margin-right kel-hover-2"><i class="fa fa-upload w3-large"></i> Upload File</a>
</div>

<div class="w3-bar w3-theme w3-padding">

	
 
</div>

<div class="w3-bar-block">
<?php

	$list = $ftpUser->makeListFolder($data, $ftp_conn, ".");
	
	foreach($list as $val){

?>
	<div href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2">
	<input type="checkbox" class="w3-margin-right"> <i class="fa fa-folder w3-large"></i> <?php echo $val ?>
		<a class="w3-right w3-button w3-border w3-border-black w3-margin-right kel-hover-2 w3-hover-blue" onclick="openRenameModal('<?php echo $val ?>')"><i class="fa fa-i-cursor"></i> Rename</a>
		<a class="w3-right w3-button w3-border w3-border-black w3-margin-right kel-hover-2 w3-hover-red" onclick="openDeleteFolderModal('<?php echo $val ?>')"><i class="fa fa-remove"></i> Remove</a>
		<a class="w3-right w3-button w3-border w3-border-black w3-margin-right kel-hover-2 w3-hover-green"><i class="fa fa-download"></i> Download</a>
		<a class="w3-right w3-button w3-border w3-border-black w3-margin-right kel-hover-2 w3-hover-yellow"><i class="fa fa-arrows"></i> Move</a>
	</div>
	
<?php
	}

	$list = $ftpUser->makeListFile($data, $ftp_conn, ".");
	
	foreach($list as $val){

?>
	<div href="#" class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-white w3-margin-right kel-hover-2">
	<input type="checkbox" class="w3-margin-right"> <i class="fa fa-file w3-large"></i> <?php echo $val ?>
		<a class="w3-right w3-button w3-border w3-border-black w3-margin-right kel-hover-2 w3-hover-blue" onclick="openRenameModal('<?php echo $val ?>')"><i class="fa fa-i-cursor"></i> Rename</a>
		<a class="w3-right w3-button w3-border w3-border-black w3-margin-right kel-hover-2 w3-hover-red" onclick="openDeleteFileModal('<?php echo $val ?>')"><i class="fa fa-remove"></i> Remove</a>
		<a class="w3-right w3-button w3-border w3-border-black w3-margin-right kel-hover-2 w3-hover-green"><i class="fa fa-download"></i> Download</a>
		<a class="w3-right w3-button w3-border w3-border-black w3-margin-right kel-hover-2 w3-hover-yellow"><i class="fa fa-arrows"></i> Move</a>
	</div>
<?php
	}
?>
</div>
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