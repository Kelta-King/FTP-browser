<div id="load" class="w3-modal">
  <span class="w3-modal-content">
    <center><div class="loader" id="loader"></div></center>
  </span>
</div>

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
			<input type="" id="oldName" class="w3-input w3-border" style="width:80%" placeholder="Old name" disabled>
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

<div id="uploadFile" class="w3-modal w3-display-middle" style="z-index:4">
	<span class="w3-modal-content">
	<center>
	<div class="w3-padding w3-theme w3-round w3-animate-zoom" style="max-width:400px;">
	<div class="">
		<span class="w3-right kel-hover-2" onclick="closeUploadFile()"><i class="fa fa-times"></i></span>
	</div>
	<span class="w3-xlarge">Upload</span>
	<div class="loader" id="loader-upload" style="display:none"></div>
	<div class="w3-text-red" id="error-upload"></div>
	<form method="post" action="#" enctype="multipart/form-data">
		<input type="file" name="file" id="upl" required/>
		<div class="w3-section">
			<button type="submit" name="submit" class="w3-input kel-hover-2 w3-black" style="width:80%">Upload</button>
		</div>
	</form>
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

<div id="download_File" class="w3-modal w3-display-middle" style="z-index:4">
	<span class="w3-modal-content">
	<center>
	<div class="w3-padding w3-theme w3-round w3-animate-zoom" style="max-width:400px;">
	<div class="">
		<span class="w3-right kel-hover-2" onclick="closeDownloadFileModal()"><i class="fa fa-times"></i></span>
	</div>
	<span class="w3-xlarge">Are you sure?</span>
	<div class="loader" id="loader-down-file" style="display:none"></div>
	<div class="w3-text-red" id="error-down-file"></div>
	<span>
	Do you really want to download <span id="filename_down"></span> Folder?
	</span>
		<div class="w3-bar w3-margin-top">
			<button class="w3-bar-item kel-hover-2 w3-light-gray w3-right" onclick="closeDownloadFileModal()" > cancel</button>
			<button class="w3-bar-item kel-hover-2 w3-black w3-right w3-margin-right" onclick="downloadFile()" ><i class="fa fa-download"></i> Download</button>
		</div>
	</div>
	</center>
	</span>
</div>
