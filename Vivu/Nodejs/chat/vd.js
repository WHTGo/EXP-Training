var logtext = require('./savelog').logtext;
//var database = require('./getsql');
//var callback = function(data)
//{
//	console.log(data);
//}
//database.online(callback);

var date = new Date();
var save = new logtext;
save.logconnect('ok');

//console.log(date.getHours()+':'+date.getMinutes());
//console.log(__dirname+'\\log-connect.txt');