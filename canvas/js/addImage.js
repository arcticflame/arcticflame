var canvasImages = [],
	preImage;

function imageCords(x, y, w, h, el) {
	this.x = x;
	this.y = y;
	this.w = w;
	this.h = h;
	this.el = el;

	var cords = [this.x, this.y, this.w, this.h, this.el];

	canvasImages.push(cords);
}

function checkIfOnImage(x, y) {
	var res;

	for (var i = 0; i < canvasImages.length; i++) {

		for (var j = 0; j < canvasImages[i].length; j++) {

			var ix = canvasImages[i][0],
				iy = canvasImages[i][1],
				iw = canvasImages[i][2],
				ih = canvasImages[i][3],
				e = canvasImages[i][4],
				ap = i;

			if(x >= ix && x <= (iw + ix) && y >= iy && y <= (ih + iy))
				res = [ap, ix, iy, e];
			else 
				res = false;
		}

	}

	return res;
}

function updateImagePos(pos, x, y) {
	canvasImages[pos][0] = x;
	canvasImages[pos][1] = y;
}

$("#add-image").click(function() {
	$("#filereader").click();

	$("#filereader").change(function(e) {
		var x = 10, y = 10;

        var file = e.target.files[0],
        	imageType = /image.*/;

        if (!file.type.match(imageType))
            return;

        var reader = new FileReader();
        reader.readAsDataURL(file);

        reader.onload = function(e) {
        	var img = $("<img>");
        	var src = e.target.result;
	    	img.attr("src", src);
	    	preImage = ctx.getImageData(0, 0, canvas.width, canvas.height);
	        ctx.drawImage(img.get(0), x, y);

	        imageCords(x, y, img.get(0).width, img.get(0).height, img.get(0));
        }
    });
});