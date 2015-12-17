<!DOCTYPE html>

<html>
<head>
	<title>Canvas</title>
	<meta charset="UTF-8">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/canvas.css">

	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="server/socket.io.js"></script>
</head>
<body>
	<div id="overlay"></div>
	<div id="textholder">
		<textarea id="textarea" autofocus placeholder="Write your text here.."></textarea>
		<button onclick="applyText()">Apply <i class="fa fa-check fa-1x"></i></button>
		<button onclick="cancelTextBox()">Cancel <i class="fa fa-times fa-1x"></i></button>'
		<input type="hidden" id="cords" value="">
	</div>

	<div id="toolbar">
		<div class="box">
			Brush-Size <span id="radval">8</span>
			<div id="decrad" class="button">-</div>
			<div id="incrad" class="button">+</div>
		</div>

		<div class="box">
			<div class="header">Brush-color <span id="colorval">#000000</span></div>
			<input type="color" id="color" class="button" style="width:100%" onchange="changeColor(this);">
		</div>

		<div class="box">
			<div class="header">Brushes</div>
			<button id="pencil" title="Brush" 		onclick="changeBrush('pencil', this);" 	class="button"><i class="fa fa-pencil fa-1x"></i></button>
			<button id="eraser" title="Eraser" 		onclick="changeBrush('eraser', this);" 	class="button"><i class="fa fa-eraser fa-1x"></i></button>
			<button id="box" 	title="Rectangle"	onclick="changeBrush('box', this);" 	class="button"><i class="fa fa-square-o fa-1x"></i></button>
			<button id="circle" title="Circle" 		onclick="changeBrush('circle', this);" 	class="button"><i class="fa fa-circle-o fa-1x"></i></button>
			<button id="text" 	title="Text" 		onclick="changeBrush('text', this)" 	class="button"><i class="fa fa-font fa-1x"></i></button>
			<button id="move" 	title="Move tool" 	onclick="changeBrush('move', this)" 	class="button"><i class="fa fa-arrows fa-1x"></i></button>

			<div id="text-settings">
				<div class="header">Text settings</div>
				<div class="row">Text-size <input type="text" id="text-size" value="18" onkeyup="changeTextSize(value)"></div>
				<div class="row">
					Italic
					<div class="onoffswitch">
					    <input type="checkbox" class="onoffswitch-checkbox" id="italic-onoff" data-onoff="false" onchange="useStyles(this, 'italic')">
					    <label class="onoffswitch-label" for="italic-onoff">
					        <span class="onoffswitch-inner"></span>
					        <span class="onoffswitch-switch"></span>
					    </label>
					</div>
				</div>
				<div class="row">
					Bold
					<div class="onoffswitch">
					    <input type="checkbox" class="onoffswitch-checkbox" id="bold-onoff" data-onoff="false" onchange="useStyles(this, 'bold')">
					    <label class="onoffswitch-label" for="bold-onoff">
					        <span class="onoffswitch-inner"></span>
					        <span class="onoffswitch-switch"></span>
					    </label>
					</div>
				</div>
				<div class="row">
					Underline
					<div class="onoffswitch">
					    <input type="checkbox" class="onoffswitch-checkbox" id="underline-onoff" data-onoff="false" onchange="useStyles(this, 'underline')">
					    <label class="onoffswitch-label" for="underline-onoff">
					        <span class="onoffswitch-inner"></span>
					        <span class="onoffswitch-switch"></span>
					    </label>
					</div>
				</div>
			</div>
		</div>

		<div class="box" id="tools">
			<div class="header">Tools</div>
			<button class="button width-50" id="save">Save</button>
			<button class="button width-50" id="add-image">Add image</button>
			<button class="button width-100" onclick="clearCanvas();">Clear canvas</button>
		</div>
	</div>

	<canvas id="canvas">Sorry, your browser does not support this functions. Pleace update your browser.</canvas>

	<input type="file" name="filereader" id="filereader">

	<script type="text/javascript" src="js/canvas.js"></script>
	<script type="text/javascript" src="js/radius.js"></script>
	<script type="text/javascript" src="js/color.js"></script>
	<script type="text/javascript" src="js/text.js"></script>
	<script type="text/javascript" src="js/save.js"></script>
	<script type="text/javascript" src="js/addImage.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {
		    $("#text-size").keydown(function (e) {
		    	console.log(e.keyCode);

		        // Allow: backspace, delete, tab, escape, enter and .
		        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13]) !== -1 ||
		             // Allow: Ctrl+A
		            (e.keyCode == 65 && e.ctrlKey === true) ||
		             // Allow: Ctrl+C
		            (e.keyCode == 67 && e.ctrlKey === true) ||
		             // Allow: Ctrl+X
		            (e.keyCode == 88 && e.ctrlKey === true) ||
		             // Allow: home, end, left, right
		            (e.keyCode >= 35 && e.keyCode <= 39)) {
		                 // let it happen, don't do anything
		                 return;
		        }
		        // Ensure that it is a number and stop the keypress
		        else if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105 || e.keyCode == 186)) {
		            e.preventDefault();
		        }
		    });
		});
	</script>
</body>
</html>