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
			var data = JSON.parse(xml.responseText);

			if(data['status'] == '1')
				completeHandler();
			else
				errorHandler(data['msg']);
		}
	}

	xml.upload.addEventListener("progress", progressHandler, false);
	xml.addEventListener("error", errorHandler, false);
	xml.addEventListener("abort", abortHandler, false);

	xml.open("POST", "../src/validate.php", true);
	xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xml.send("u="+username+"&p="+password+"&rem="+remember);

	return false;
}

function progressHandler() {
	$("#loginmsg").empty();
	$("#loginmsg").css({"color":"#DA5F00"});
	$("#loginmsg").prepend("<span>Checking..</span><img src='img/loader.gif' alt='Loading'>");
}

function completeHandler() {
	$("#loginmsg").empty();
	$("#loginmsg").css({"color":"#225A22"});
	$("#loginmsg").prepend("<span>Redirecting..</span><img src='img/loader.gif' alt='Loading'>");
	window.location = "";
}

function errorHandler(error) {
	$("#loginmsg").empty();
	$("#loginmsg").css({"color":"#CF1C1C"});
	$("#loginmsg").prepend("<i class='fa fa-exclamation-triangle'></i><span>"+error+"</span>");
}

function abortHandler() {
	$("#loginmsg").empty();
	$("#loginmsg").css({"color":"#CF1C1C"});
	$("#loginmsg").prepend("<i class='fa fa-exclamation'></i><span>Request aborted.</span>");
}

function hideLoginArea() {
	$("#loginarea").fadeOut(300);
	$("#overlay").fadeOut(300);
}

function showLoginArea() {
	$("#overlay").fadeIn(300, function() {
		$("#loginarea").fadeIn(300);
	});
}