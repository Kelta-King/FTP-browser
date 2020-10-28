let alarm = (msg, error) => {
	
	alert(msg);
	error.innerHTML = msg;
	
}

let login = () => {
	
	let form = document.getElementById("login");
	let u_name = form.username.value;
	let u_password = form.password.value;
	
	let loader = document.getElementById("load");
	loader.style.display = "block";
	let error = document.getElementById("error");
	
	if(u_name == "" || u_password == ""){
		alarm("Please, fill all the details", error);
		loader.style.display = "none";
		return false;
	}
	else{
		form.method = "post";
		form.action = "?u_name=" + u_name;
		form.submit();
	}
	
}