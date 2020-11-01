<?php
header("location:/FTP-Browser");
	session_start();
	session_unset();
	session_destroy();
	
?>