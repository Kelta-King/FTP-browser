<?php

require_once("../Config/ftpConnect.php");
include("../Classes/classes.php");
session_start();

if(isset($_SESSION['ftp_User']) && isset($_SESSION['login_details']) && isset($_SESSION['data'])){
	
	$ftpUser = $_SESSION['ftp_User'];
	$data = $_SESSION['data'];
	$name = $_REQUEST['name'];
	//$dirLoc = $ftpUser->updatePath($data, $ftp_conn);
	
	if($ftpUser->checkLogin()){
	//user has logged in area

		if($_SESSION['directory'] = $ftpUser->gotoFolder($data, $ftp_conn, $name)){
			
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