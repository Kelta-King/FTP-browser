<?php

require_once("../Config/ftpConnect.php");
include("../Classes/classes.php");
session_start();

if(isset($_SESSION['ftp_User']) && isset($_SESSION['login_details']) && isset($_SESSION['data'])){
	
	$ftpUser = $_SESSION['ftp_User'];
	$data = $_SESSION['data'];
	$dirLoc = $_SESSION['directory'];
	$uploadFile = $_REQUEST['path'];
	
	$name = explode("\\",$uploadFile);
	$name = $name[count($name)-1];
	
	if($ftpUser->checkLogin()){
	//user has logged in area

		if($_SESSION['directory'] = $ftpUser->uploadFile($data, $ftp_conn, $dirLoc, $uploadFile)){
			
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