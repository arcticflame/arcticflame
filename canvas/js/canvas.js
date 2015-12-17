var canvas = document.getElementById("canvas");
var ctx = canvas.getContext("2d");

var eraser = document.getElementById("eraser");

var r,
	color,
	lw,
	type,
	//socket = io("10.171.103.150"),
	dragging,
	shapePosX,
	shapePosY,
	tmp,
	checkObj;

function resizeCanvas() {
	if(tmp == undefined)
		tmp = ctx.getImageData(0, 0, canvas.width, canvas.height);

	ctx.canvas.width = window.innerWidth - 250;
	ctx.canvas.height = window.innerHeight;
	ctx.putImageData(tmp, 0, 0);

	canvasImages = [];
	tmp = undefined;
	checkObj = undefined;
}

function clearCanvas() {
	var r = confirm("Are you sure you want to abandon your masterpiece?");
	if(r)
		ctx.clearRect(0, 0, canvas.width, canvas.height);
}

function changeBrush(t, e) {
	type = t;
	$(document).find(".active").removeClass("active");
	e.className += " active";

	if(t == "text") {
		canvas.style.cursor = "text";
		$("#text-settings").slideDown(600);
	}
	else {
		$("#text-settings").slideUp(400);
		canvas.style.cursor = "default";
	}
}

function init() {
	resizeCanvas();
	changeBrush("pencil", document.getElementById("pencil"));
	dragging = false;
	shapeMaking = true
}

function engage(e) {
	tmp = ctx.getImageData(0, 0, canvas.width, canvas.height);
	dragging = true;
	draw(e);
}

function disengage() {
	tmp = ctx.getImageData(0, 0, canvas.width, canvas.height);
	dragging = false;
	shapeMaking = true;
	ctx.beginPath();
	shapePosX = undefined;
	checkObj = undefined;
}

function paint(x, y) {
	ctx.lineTo(x, y);
	ctx.stroke();
	ctx.beginPath();
	ctx.arc(x, y, r, 0, Math.PI * 2, true);
	ctx.fill();
	ctx.beginPath();
	ctx.moveTo(x, y);
}

function erase(x, y) {
	var length = Math.pow(r, 2);

	if(length < 1)
		length = 1;

	ctx.clearRect(x - (length / 2), y - (length / 2), length, length);
}

function box(x, y) {
	if(shapePosX == undefined) {
		shapePosX = x;
		shapePosY = y;
	}

	ctx.clearRect(0, 0, canvas.width, canvas.height);
	ctx.beginPath();
	ctx.rect(shapePosX, shapePosY, x - shapePosX, y - shapePosY);
	ctx.putImageData(tmp, 0, 0);
	ctx.stroke();
}

function arc(x, y) {
	if(shapePosX == undefined) {
		shapePosX = x;
		shapePosY = y;
	}

	ctx.clearRect(0, 0, canvas.width, canvas.height);
	ctx.beginPath();
	ctx.arc(shapePosX, shapePosY, Math.abs(x - shapePosX), 0, Math.PI * 2, true);
	ctx.putImageData(tmp, 0, 0);
	ctx.stroke();
}

function text(x, y) {
	dragging = false;
	var cords = [x, y];

	$("#overlay").fadeIn(300);
	$("#textholder").fadeIn(300);
	$("#cords").val(cords);
}

function applyText() {
	var text = document.getElementById("textarea").value;
	var data = $("#cords").val().split(',');
	var x = parseInt(data[0]), y = parseInt(data[1]);

	ctx.font = font;
	ctx.fillText(text, x, y);

	if(underline)
		textUnderline(ctx, text, x, y, color, textSize, "left");

	cancelTextBox();
}

function moveObj(cx, cy) {
	if(checkObj == undefined)
		checkObj = checkIfOnImage(cx, cy);

	if(checkObj !== false) {
		updateImagePos(checkObj[0], cx, cy);
		var img = checkObj[3];

		ctx.beginPath();
		ctx.clearRect(0, 0, canvas.width, canvas.height);
		ctx.putImageData(preImage, 0, 0);
		ctx.drawImage(img, cx, cy);
	}
	else {
		dragging = false;
	}
}

function draw(e) {
	if(dragging) {
		ctx.fillStyle = color;
		ctx.strokeStyle = color;
		ctx.lineWidth = lw;

		var x = e.offsetX, y = e.offsetY;

		switch(type) {
			case "pencil":
				paint(x, y);
				break;
			case "eraser":
				erase(x, y);
				break;
			case "box":
				box(x, y);
				break;
			case "circle":
				arc(x, y);
				break;
			case "text":
				text(x, y);
				break;
			case "move":
				moveObj(x, y);
				break;
			default:
				break;
		}

		//socket.emit("draw", {x:x, y:y});
	}
}

window.addEventListener("load", init, false);
window.addEventListener("resize", resizeCanvas, false);

canvas.addEventListener("mousedown", engage);
canvas.addEventListener("mouseup", disengage);
canvas.addEventListener("mousemove", draw);