window.onload  = () => {
	
	let folderLoader = document.getElementById('');
	
	//loadSideNavFolders();
	loadList();	
	
}

let loadList = () => {
	
	let loader = document.getElementById('list_loader');
	
	let content = document.getElementById('files&folders_list');
	let xhttp = new XMLHttpRequest();
	
	xhttp.onreadystatechange = function() {
		loader.style.display = "block";
		if(this.readyState == 4 && this.status == 200){
			
			loader.style.display = "none";
			content.innerHTML = this.responseText;
			
		}
	}
	xhttp.open("POST", "Load/loadList.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send();
	
}

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
				closeFolderModal();
				loadList();				
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
	let yo = val.split("/");
	val1 = yo[yo.length-1];
	document.getElementById("oldName").value = val;
	document.getElementById('newName').value = val1;
	
} 

let openUploadFile = () => {
	
	document.getElementById("uploadFile").style.display = "block";
	
}

let closeUploadFile = () => {
	
	document.getElementById("uploadFile").style.display = "none";
	document.getElementById("upl").value = "";
	
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
				closeRenameModal();
				loadList();
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
				closeDeleteFileModal();
				loadList();
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
				closeDeleteFolderModal();
				loadList();
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

let openDownloadFileModal = (val) => {
	
	document.getElementById("download_File").style.display = "block";
	document.getElementById("filename_down").innerHTML = val;
	
} 

let closeDownloadFileModal = () => {
	
	document.getElementById("download_File").style.display = "none";
	document.getElementById("filename_down").innerHTML = "";
	
} 

let downloadFile = () => {
	
	let name = document.getElementById("filename_down").innerHTML;
	
	let error = document.getElementById("error-down-file");
	let loader = document.getElementById("loader-down-file");
	
	if(name == ""){
		alert("Please add the file name");
		return false;
	}
	
	let str = "name="+name;
	let xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		loader.style.display = "block";
		if(this.readyState == 4 && this.status == 200){
			
			loader.style.display = "none";
			if(this.responseText == ""){
				alert("File Downloading started");
				closeDownloadFileModal();
				loadList();
			}
			else{
				error.innerHTML = this.responseText;
				console.log(this.responseText);
			}
			
		}
	}
	xhttp.open("POST", "Action/downloadFile.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(str);
}

let gotoFolder = (val) => {
	
	if(val == ""){
		alert("Please add the file name");
		return false;
	}
	
	let loader = document.getElementById('list_loader');
	let content = document.getElementById('files&folders_list');
	
	let str = "name="+val;
	let xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		loader.style.display = "block";
		if(this.readyState == 4 && this.status == 200){
			
			loader.style.display = "none";
			loadList();
			/*if(this.responseText == ""){
				//updatePath();
				loadList();
			}
			else{
				alert(this.responseText);
				console.log(this.responseText);
			}*/
			
			
			
		}
	}
	xhttp.open("POST", "Action/gotoFolder.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(str);
	
}

let previousFolder = () => {
	
	let loader = document.getElementById('list_loader');
	let content = document.getElementById('files&folders_list');
	
	let xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		loader.style.display = "block";
		content.style.display = "none";
		if(this.readyState == 4 && this.status == 200){
			
			loader.style.display = "none";
			loadList();
			content.style.display = "block";
			
		}
	}
	xhttp.open("POST", "Action/previousFolder.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send();
	
}

let rootFolder = () => {
	
	let loader = document.getElementById('list_loader');
	let content = document.getElementById('files&folders_list');
	
	let xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		loader.style.display = "block";
		content.style.display = "none";
		if(this.readyState == 4 && this.status == 200){
			
			loader.style.display = "none";
			loadList();
			content.style.display = "block";
			
		}
	}
	xhttp.open("POST", "Action/rootFolder.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send();
	
}
/*
let uploadFile = () => {
	
	let file = document.getElementById('upl');
	
	if(file.value == ""){
		
		alert("Please select a file");
		return false;
	}
	
	
	let loader = document.getElementById('loader-upload');
	let error = document.getElementById('error-upload');
	
	let str = "path="+file.value;
	let xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		loader.style.display = "block";
		
		if(this.readyState == 4 && this.status == 200){
			
			loader.style.display = "none";
			if(this.responseText == ""){
				loadList();
			}
			else{
				console.log(this.responseText);
				error.innerHTML = this.responseText;
			}
			
		}
	}
	xhttp.open("POST", "Action/uploadFile.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(str);
	
}
*/