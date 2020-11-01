let addDir = () => {
	
	let Name = document.getElementById("fileName").value;
	let error = document.getElementById("error-fold");
	let loader = document.getElementById("loader-fold");
	
	if(Name == ""){
		alert("Please add the file name");
		return false;
	}
		
	if(Name.includes("$") || Name.includes("&") || Name.includes("=") || Name.includes("*") || Name.includes("`")){
		error.innerHTML = "Please enter proper name";
		return false;
	}
	
	let str = "Name="+Name;
	let xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		loader.style.display = "block";
		if(this.readyState == 4 && this.status == 200){
			
			loader.style.display = "none";
			if(this.responseText == ""){
				alert("Folder created");
				location.reload();
			}
			else{
				error.innerHTML = this.responseText;
				console.log(this.responseText);
			}
			
		}
	}
	xhttp.open("POST", "Action/addDir.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(str);
}

let openFolderModal = () => {
	
	document.getElementById("addFolder").style.display = "block";
	
} 

let closeFolderModal = () => {
	
	document.getElementById("addFolder").style.display = "none";
	
} 

let openDeleteFileModal = (val) => {
	
	document.getElementById("deleteFile").style.display = "block";
	document.getElementById("filename_del").innerHTML = val;
	
} 

let closeDeleteFileModal = () => {
	
	document.getElementById("deleteFile").style.display = "none";
	document.getElementById("filename_del").innerHTML = "";
	
} 

let openDeleteFolderModal = (val) => {
	
	document.getElementById("deleteFolder").style.display = "block";
	document.getElementById("foldername_del").innerHTML = val;
	
} 

let closeDeleteFolderModal = () => {
	
	document.getElementById("deleteFolder").style.display = "none";
	document.getElementById("foldername_del").innerHTML = "";
	
} 

let openRenameModal = (val) => {
	
	document.getElementById("renameFile").style.display = "block";
	document.getElementById("oldName").value = val;
	
} 

let closeRenameModal = () => {
	
	document.getElementById("renameFile").style.display = "none";
	document.getElementById("oldName").value = "";
	
} 

let renameThing = () => {
	
	let oldName = document.getElementById("oldName").value;
	
	let Name = document.getElementById("newName").value;
	let error = document.getElementById("error-rename");
	let loader = document.getElementById("loader-rename");
	
	if(Name == ""){
		alert("Please add the file name");
		return false;
	}
		
	if(Name.includes("$") || Name.includes("&") || Name.includes("=") || Name.includes("*") || Name.includes("`")){
		error.innerHTML = "Please enter proper name";
		return false;
	}
	
	let str = "oldName="+oldName+"&newName="+Name;
	let xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		loader.style.display = "block";
		if(this.readyState == 4 && this.status == 200){
			
			loader.style.display = "none";
			if(this.responseText == ""){
				alert("Name changed");
				location.reload();
			}
			else{
				error.innerHTML = this.responseText;
				console.log(this.responseText);
			}
			
		}
	}
	xhttp.open("POST", "Action/rename.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(str);
}

let deleteFile = () => {
	
	let fileName = document.getElementById("filename_del").innerHTML;
	
	let error = document.getElementById("error-del-file");
	let loader = document.getElementById("loader-del-file");
	
	if(fileName == ""){
		alert("Please select the file");
		return false;
	}

	let str = "fileName="+fileName;
	let xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		loader.style.display = "block";
		if(this.readyState == 4 && this.status == 200){
			
			loader.style.display = "none";
			if(this.responseText == ""){
				alert("File Deleted");
				location.reload();
			}
			else{
				error.innerHTML = this.responseText;
				console.log(this.responseText);
			}
			
		}
	}
	xhttp.open("POST", "Action/deleteFile.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(str);
}

let deleteFolder = () => {
	
	let folderName = document.getElementById("foldername_del").innerHTML;
	
	let error = document.getElementById("error-del-folder");
	let loader = document.getElementById("loader-del-folder");
	
	if(folderName == ""){
		alert("Please select the Folder");
		return false;
	}

	let str = "folderName="+folderName;
	let xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		loader.style.display = "block";
		if(this.readyState == 4 && this.status == 200){
			
			loader.style.display = "none";
			if(this.responseText == ""){
				alert("Folder Deleted");
				location.reload();
			}
			else{
				error.innerHTML = this.responseText;
				console.log(this.responseText);
			}
			
		}
	}
	xhttp.open("POST", "Action/deleteFolder.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(str);
}