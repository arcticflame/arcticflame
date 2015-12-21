var coordX, coordY;

$(".window").mousedown(function()
{
	addEventListener("mousemove", moveWindow)
	
});
$(document).mouseup(function()
{
	removeEventListener("mousemove", moveWindow);
	coordX = undefined;
	coordY = undefined;
});

function moveWindow(e)
{
	if(coordX == undefined && coordY == undefined)
	{
		coordX = e.offsetX;
		coordY = e.offsetY;
	}
	event.preventDefault();
	var left = e.pageX - coordX;
	var top = e.pageY - coordY;
	console.log("Left: " + e.offsetX);
	
	console.log(e);
	$(".window").css({
		"left": left,
		"top": top
	});
}