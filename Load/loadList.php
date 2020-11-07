<?php

require_once("../Config/ftpConnect.php");
include("../Classes/classes.php");
session_start();

if(isset($_SESSION['ftp_User']) && isset($_SESSION['login_details']) && isset($_SESSION['data'])){
	
	$ftpUser = $_SESSION['ftp_User'];
	$data = $_SESSION['data'];
	$dirLoc = $_SESSION['directory'];
	
	if($ftpUser->checkLogin()){
	//user has logged in area

	$list = $ftpUser->makeListFolder($data, $ftp_conn, $dirLoc);
	
	
?>
<div class="w3-theme w3-padding" id="path">

<?php

echo "File Path: ".$_SESSION['directory']."/";

?>
 
</div>
<?php

	$val1 = count($list);
	foreach($list as $val){

?>

	<div class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-light-gray w3-margin-right kel-hover-2">
	<span onclick="gotoFolder('<?php echo $dirLoc."/".$val ?>')"><i class="fa fa-folder w3-large"></i> <?php echo $val ?></span>
		<a class="w3-right w3-button w3-border w3-border-black w3-margin-right kel-hover-2 w3-hover-blue" onclick="openRenameModal('<?php echo $dirLoc."/".$val ?>')"><i class="fa fa-i-cursor"></i> Rename</a>
		<a class="w3-right w3-button w3-border w3-border-black w3-margin-right kel-hover-2 w3-hover-red" onclick="openDeleteFolderModal('<?php echo $dirLoc."/".$val ?>')"><i class="fa fa-remove"></i> Remove</a>
	</div>
	
<?php
	}

	$list = $ftpUser->makeListFile($data, $ftp_conn, $dirLoc);
	$val2 = count($list);
	
	foreach($list as $val){

?>
	<div class="w3-bar-item w3-button w3-border-bottom w3-border-black w3-hover-light-gray w3-margin-right kel-hover-2">
	<i class="fa fa-file w3-large"></i> <?php echo $val ?>
		<a class="w3-right w3-button w3-border w3-border-black w3-margin-right kel-hover-2 w3-hover-blue" onclick="openRenameModal('<?php echo $dirLoc."/".$val ?>')"><i class="fa fa-i-cursor"></i> Rename</a>
		<a class="w3-right w3-button w3-border w3-border-black w3-margin-right kel-hover-2 w3-hover-red" onclick="openDeleteFileModal('<?php echo $dirLoc."/".$val ?>')"><i class="fa fa-remove"></i> Remove</a>
		<a class="w3-right w3-button w3-border w3-border-black w3-margin-right kel-hover-2 w3-hover-green" onclick="openDownloadFileModal('<?php echo $val ?>')"><i class="fa fa-download"></i> Download</a>
	</div>
<?php
	}

	if($val1 == 0 && $val2 == 0){
?>
<div class="w3-center w3-margin-top w3-large">There are no files and directories in this folder</div>
<?php
	}

	}
	else{
		
	//user has not logged in
		header("Location:../logout.php");
		
	}
}
else{
	header("Location:../logout.php");
}
require_once("../Config/ftpClose.php");
?>