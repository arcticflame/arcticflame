function setRadius(newRad) {
	if(newRad < minRad)
		newRad = minRad
	else if(newRad > maxRad)
		newRad = maxRad;

	r = newRad;
	lw = r * 2;
	toolbarRadVal.innerHTML = newRad;
}

var minRad = 0.5,
	maxRad = 10,
	defRad = 4,
	interval = 2,
	toolbarRadVal = document.getElementById("radval"),
	decRad = document.getElementById("decrad"),
	incRad = document.getElementById("incrad");

decrad.addEventListener("click", function() {
	setRadius(r - interval);
});

incrad.addEventListener("click", function() {
	if(r == 0.5)
		setRadius(r + (interval - 0.5));
	else
		setRadius(r + interval);
});

setRadius(defRad);