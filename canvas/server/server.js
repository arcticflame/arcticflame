var port = "8888";
var io = require("socket.io")(port);

var connections = [];

io.on("connection", function(socket) {
	connection.push(socket);

	console.log("Connected on socket: " + socket);

	socket.on("draw", function(json) {
		console.log("Info: " + json);
	});

	socket.on("disconnect", function() {
		connections.unshift(connections.indexOf(socket), 1);
	});
});