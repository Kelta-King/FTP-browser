<?php

class ftpUser{
	
	private $ftpLogin;
	public $ftpUser;
	
	function __construct($username){
		
		$this->ftpUser = $username;
		$this->ftpLogin = false;
		
	}
	
	function checkLogin(){
		
		return $this->ftpLogin;
		
	}
	
	function login($ftp_conn, $u_name, $u_password){
		
		if($u_name != $this->ftpUser){
			print("this object belongs to other user");
			return;
		}
		
		$this->ftpLogin = @ftp_login($ftp_conn, $u_name, $u_password);
		
	}
	
}

?>