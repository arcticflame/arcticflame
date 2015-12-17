$("#save").click(function() {
	var data = canvas.toDataURL();
	var xml;

	if(window.XMLHttpRequest) {
		xml = new XMLHttpRequest();
	} else {
		xml = new ActiveXObject("Microsoft.XMLHTTP");
	}

	xml.onreadystatechange = function() {
		if(xml.readyState == 4 && xml.status == 200) {
			animateResWindow();
			var a = createDownloadBtn(xml.responseText);

			if(document.getElementById("downloadbtn"))
				$("#downloadbtn").fadeOut(300, function() {
					$(this).remove();
					$("#tools").append(a);
				});
			else
				$("#tools").append(a);

			$(a).click(function() {
				$(this).fadeOut(400, function() {
					$(this).remove();
				});
			});
		}
	}

	xml.open("POST", "server/saveCanvas.php", true);
	xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xml.send("img="+data);
});

function createDownloadBtn(res) {
	var link = "server/downloadImage.php?file="+res;
	var a = document.createElement("a");
	var txt = document.createTextNode("Download");

	a.setAttribute("href", link);
	a.setAttribute("target", "_blank");
	a.setAttribute("class", "button width-100");
	a.setAttribute("id", "downloadbtn");
	a.appendChild(txt);

	return a;
}

function animateResWindow() {
	var win = document.createElement("div");
	var header = document.createElement("div");
	var span = document.createElement("span");
	var txt = document.createTextNode("Your image was successfully saved on our server and can now be downloaded to you computer.");
	var htxt = document.createTextNode("Image saved");

	win.setAttribute("id", "messagebox");
	header.appendChild(htxt);
	win.appendChild(header);
	span.appendChild(txt);
	win.appendChild(span);

	$("body").append(win);
	$("#messagebox").css({"display": "block"});
	var to = setTimeout(fa, 1600);

	function fa() {
		clearTimeout(to);
		$("#messagebox").fadeOut(1200);
	}
}