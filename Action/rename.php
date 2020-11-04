<?php

require_once("../Config/ftpConnect.php");
include("../Classes/classes.php");
session_start();

if(isset($_SESSION['ftp_User']) && isset($_SESSION['login_details']) && isset($_SESSION['data'])){
	
	$ftpUser = $_SESSION['ftp_User'];
	$data = $_SESSION['data'];
	
	if($ftpUser->checkLogin()){
	//user has logged in area

		$newName = $_REQUEST['newName'];
		$oldName = $_REQUEST['oldName'];
		$dirLoc = $_SESSION['directory'];
	
		if($ftpUser->renameFile($data, $ftp_conn, $oldName, $dirLoc."/".$newName)){
			
		}
		else{
			echo "Something went wrong";
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