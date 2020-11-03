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
		if($this->ftpLogin){
			return true;
		}
		else{
			return false;
		}
		
	}
	
	//rename a file or directory
	function renameFile($data, $ftp_conn, $oldname, $newname){
		
		//this $data varable will contain the data related to password and username of user
		$data = base64_decode($data);
		$data = explode("#", $data);
		$u_name = $data[0];
		$u_pass = $data[1];
		
		$this->login($ftp_conn, $u_name, $u_pass);
		
		if($this->checkLogin()){
			
			return ftp_rename($ftp_conn, $oldname, $newname);
			
		}
		
	}
	
	//make a directory
	function makeDir($data, $ftp_conn, $dir){
		
		//this $data varable will contain the data related to password and username of user
		$data = base64_decode($data);
		$data = explode("#", $data);
		$u_name = $data[0];
		$u_pass = $data[1];
		
		$this->login($ftp_conn, $u_name, $u_pass);
		
		if($this->checkLogin()){
			
			return ftp_mkdir($ftp_conn, $dir);
			
		}
		
	}
	
	//delete a file
	function deleteFile($data, $ftp_conn, $file){
		
		//this $data varable will contain the data related to password and username of user
		$data = base64_decode($data);
		$data = explode("#", $data);
		$u_name = $data[0];
		$u_pass = $data[1];
		
		$this->login($ftp_conn, $u_name, $u_pass);
		
		if($this->checkLogin()){
			
			return ftp_delete($ftp_conn, $file);
			
		}
		
	}
	
	//remove a directory
	function deleteFolder($data, $ftp_conn, $dir){
		
		//this $data varable will contain the data related to password and username of user
		$data = base64_decode($data);
		$data = explode("#", $data);
		$u_name = $data[0];
		$u_pass = $data[1];
		
		$this->login($ftp_conn, $u_name, $u_pass);
		
		if($this->checkLogin()){
			
			return ftp_rmdir($ftp_conn, $dir);
			
		}
		
	}	
	
	//upload a file
	function uploadFile($data, $ftp_conn, $server_file, $local_file){
		
		$data = base64_decode($data);
		$data = explode("#", $data);
		$u_name = $data[0];
		$u_pass = $data[1];
		
		$this->login($ftp_conn, $u_name, $u_pass);
		
		if($this->checkLogin()){
			return ftp_put($ftp_conn, $server_file, $local_file, FTP_ASCII);
		}
		
	}
	
	//download a file to local
	function downloadFile($data, $ftp_conn, $local_file, $server_file){
		
		//this $data varable will contain the data related to password and username of user
		$data = base64_decode($data);
		$data = explode("#", $data);
		$u_name = $data[0];
		$u_pass = $data[1];
		
		$this->login($ftp_conn, $u_name, $u_pass);
		
		if($this->checkLogin()){
			
			return ftp_get($ftp_conn, $local_file, $server_file, FTP_ASCII);
			
		}
		
	}
	
	//Go to a folder
	function gotoFolder($data, $ftp_conn, $name){
	
		$data = base64_decode($data);
		$data = explode("#", $data);
		$u_name = $data[0];
		$u_pass = $data[1];
		
		$this->login($ftp_conn, $u_name, $u_pass);
		
		if($this->checkLogin()){
			
			if(ftp_chdir($ftp_conn, $name)){
				return ftp_pwd($ftp_conn);
			}
			else{
				return false;
			}
			
		}
		else{
			echo "Something went wrong";
		}
		
	}
	
	//Update the path of directory
	function updatePath($data, $ftp_conn){
		
		$data = base64_decode($data);
		$data = explode("#", $data);
		$u_name = $data[0];
		$u_pass = $data[1];
		
		$this->login($ftp_conn, $u_name, $u_pass);
		
		if($this->checkLogin()){
			
			return true;
			
		}
		else{
			echo "Something went wrong";
		}
		
	}
	
	//Go back to the Root directory
	function goRoot($data, $ftp_conn){
		
		$data = base64_decode($data);
		$data = explode("#", $data);
		$u_name = $data[0];
		$u_pass = $data[1];
		
		$this->login($ftp_conn, $u_name, $u_pass);
		
		if($this->checkLogin()){
			
			if(ftp_cdup($ftp_conn)){
				return ftp_pwd($ftp_conn);
			}
			else{
				return false;
			}
			
		}
		else{
			echo "Something went wrong";
		}
		
	}
	
	//Go back to the previous dirrectory
	function goPrevious($data, $ftp_conn, $dirLoc){
		
		$data = base64_decode($data);
		$data = explode("#", $data);
		$u_name = $data[0];
		$u_pass = $data[1];
		
		$this->login($ftp_conn, $u_name, $u_pass);
		
		if($this->checkLogin()){
			
			$arr = explode("/", $dirLoc);
			$dir = "";
			for($i=0 ; $i<count($arr)-1 ; $i++){
				
				$dir = "/".$arr[$i];
				
			}
			
			if((count($arr)-2) >= 0){
				
				ftp_chdir($ftp_conn, $dir);
				return ftp_pwd($ftp_conn);
				
			}
			else{
				
			}
			
		}
		else{
			echo "Something went wrong";
		}
		
	}
	
	//Get modified time of specified file
	
	//Get the size of the specified file

	//Move file
	
	//execute a specified command on ftp server
	
	//List all the files and subfolders in a directory
	function makeList($data, $ftp_conn, $name){
		
		//this $data varable will contain the data related to password and username of user
		
		$data = base64_decode($data);
		$data = explode("#", $data);
		$u_name = $data[0];
		$u_pass = $data[1];
		
		$this->login($ftp_conn, $u_name, $u_pass);
		
		if($this->checkLogin()){
			
			return ftp_nlist($ftp_conn, $name);
			
		}
		else{
			echo "Something went wrong";
		}
		
	}
	
	//list all the folders only
	function makeListFolder($data, $ftp_conn, $name){
		
		//this $data varable will contain the data related to password and username of user
		
		$data = base64_decode($data);
		$data = explode("#", $data);
		$u_name = $data[0];
		$u_pass = $data[1];
		
		$this->login($ftp_conn, $u_name, $u_pass);
		
		if($this->checkLogin()){
			
			$folders = array();
			$lines = ftp_mlsd($ftp_conn, $name);

			foreach ($lines as $file)
			{
				
				if ($file["type"] == "dir")
				{
					array_push($folders, $file["name"]);
				}
				
			}
			
			return $folders;
			
		}
		else{
			echo "Something went wrong";
		}
		
	}
	
	//list all the folders only
	function makeListFile($data, $ftp_conn, $name){
		
		//this $data varable will contain the data related to password and username of user
		
		$data = base64_decode($data);
		$data = explode("#", $data);
		$u_name = $data[0];
		$u_pass = $data[1];
		
		$this->login($ftp_conn, $u_name, $u_pass);
		
		if($this->checkLogin()){
			
			$files = array();
			$lines = ftp_mlsd($ftp_conn, $name);

			foreach ($lines as $file)
			{
				
				if ($file["type"] == "file")
				{
					array_push($files, $file["name"]);
				}
				
			}
			
			return $files;
			
		}
		else{
			echo "Something went wrong";
		}
		
	}

}

?>