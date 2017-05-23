function index_signin() {
	document.getElementById("sign").style.left = "75%";
	document.getElementById("demon").style.left = "0";
}

function index_return() {
	document.getElementById("sign").style.left = "100%";
	document.getElementById("demon").style.left = "100%";

}

function index_check_cityname() {
	alert("check city");
	if(document.getElementById("city").value=="")
		return false;
	return true;
}

function index_check_login() {
	alert("index_check_login");
	return true;
}

function check_reg() {
	alert("index_check_reg");
	return true;
}

function index_p1() {
	document.getElementById("index-p1").style.left = "0%";
	document.getElementById("index-p2").style.left = "100%";
}

function index_p2() {
	document.getElementById("index-p2").style.left = "0%";
	document.getElementById("index-p1").style.left = "100%";
}

function show_filter_panel() {
	alert("show filter panel");
}

function hide_filter_panel() {
	alert("hide filter panel");
}