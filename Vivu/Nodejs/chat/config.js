var database = {
    'host'		: 'localhost',
    'user' 		: 'root',
   	'password'	: '',
    'database' 	: 'chatnodejs'
};
exports.database = database;

var directory = {
	'log-connect'	:__dirname+'\\log-connect.txt',
	'log-server'	:__dirname+'\\log.txt',
	'log-ip'	:__dirname+'\\log-ip.txt'
}
exports.directory = directory;
