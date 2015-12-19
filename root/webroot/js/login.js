function hideLoginArea() {
	$("#loginarea").fadeOut(300);
	$("#overlay").fadeOut(300);
}

function showLoginArea() {
	$("#overlay").fadeIn(300, function() {
		$("#loginarea").fadeIn(300);
	});
}

function login() {
	var username = $("#username").val();
	var password = $("#password").val();
	var remember = $("#remember").prop("checked");
	var xml;

	if(window.XMLHttpRequest) {
		xml = new XMLHttpRequest();
	} else {
		xml = new ActiveXObject("Microsoft.XMLHTTP");
	}

	xml.onreadystatechange = function() {
		if(xml.readyState == 4 && xml.status == 200) {
			console.log(xml.responseText);
		}
	}

	xml.open("POST", "../src/validate.php", true);
	xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xml.send("u="+username+"&p="+password+"&rem="+remember);

	return false;
}