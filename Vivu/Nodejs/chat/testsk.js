var net = require("net");

var s = new net.Socket();
s.connect(80,'192.168.60.176');
//var a = new Buffer(1048576);

console.log(s.byesRead);
s.end();
