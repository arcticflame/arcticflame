function changeColor(newColor) {
	var data = newColor.value;
	var colorText = document.getElementById("colorval");

	color = data;
	colorText.innerHTML = data;
	colorText.style.textShadow = "0 0 1px " + data;
}