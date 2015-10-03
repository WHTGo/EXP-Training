var iplookup = require('iplookup');
var logtext = new require('./savelog').logtext;

exports.search = function(callback)
{
	this.set = function(data)
	{
		iplookup.getInfo(data['ip'],callback);
	}
	this.save = function(data)
	{
		iplookup.getInfo(data, function (ouput) {
		    var text = ouput['ip'] + ' , '+ ouput['country']+' , '+ ouput['city'] +' , [ '+ ouput['latitude']+' , ' +ouput['longitude'] +' ]';
		    logtext.logconnect(text);
		    callback(null);
		});

	}
}
