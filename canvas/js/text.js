var textSize = 16,
	italic = "",
	bold = "",
	underline = false,
	font = textSize + "px Georgia";

function changeTextSize(size) {
	textSize = size;
	updateFont();
}

function useStyles(el, style) {
	if(el.dataset.onoff == "false") {
		el.dataset.onoff = "true";
		switch(style) {
			case "italic":
				italic = "italic ";
				break;
			case "bold":
				bold = "bold ";
				break;
			case "underline":
				underline = true;
				break;
			default:
				break;
		}
	}
	else {
		el.dataset.onoff = "false";
		switch(style) {
			case "italic":
				italic = "";
				break;
			case "bold":
				bold = "";
				break;
			case "underline":
				underline = false;
				break;
			default:
				break;
		}
	}

	updateFont();
}

function updateFont() {
	font = italic + bold + textSize + "px Georgia";
}

function textUnderline(ctx, text, x, y, c, textSize, align) {
	//Get the width of the text
	var textWidth = ctx.measureText(text).width;

	//var to store the starting position of text (X-axis)
	var startX;

	//var to store the starting position of text (Y-axis)
	// I have tried to set the position of the underline according 
	// to size of text. You can change as per your need
	var startY = y + (parseInt(textSize) / 15) + 1;

	//var to store the end position of text (X-axis)
	var endX;

	//var to store the end position of text (Y-axis)
	//It should be the same as start position vertically. 
	var endY = startY;

	//To set the size line which is to be drawn as underline.
	//Its set as per the size of the text. Feel free to change as per need.
	var underlineHeight = parseInt(textSize) / 15;

	//Because of the above calculation we might get the value less 
	//than 1 and then the underline will not be rendered. this is to make sure 
	//there is some value for line width.
	if(underlineHeight < 1)
		underlineHeight = 1;

	ctx.beginPath();

	if(align == "center") {
		startX = x - (textWidth / 2);
		endX = x + (textWidth / 2);
	} else if(align == "right") {
		startX = (x - textWidt);
		endX = x;
	} else {
		startX = x;
		endX = (x + textWidth);
	}

	ctx.strokeStyle = c;
	ctx.lineWidth = underlineHeight;
	ctx.moveTo(startX, startY);
	ctx.lineTo(endX, endY);
	ctx.stroke();

	console.log(x, y, startX, startY, endX, endY);
}

function cancelTextBox() {
	$("#textarea").val("");
	$("#textholder").fadeOut(300);
	$("#overlay").fadeOut(300);
}