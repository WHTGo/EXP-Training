var fs = require("fs");
var directory = require('./config').directory;
var fileconnect = directory['log-connect'];
var filelog = directory['log-server'];
var fileip = directory['log-ip'];

exports.logtext = function()
{
  this.date = ' | ' + new Date().toLocaleString() + ' |';
  this.writerlog = function (data,file)
  {
    fs.exists(file, function(exists) {
      if (!exists) {
        fs.open(file, "w", function(err, fd) {
          if (err) return console.log(err);
        });
        fs.writeFile(file,'Create file in: '+  this.date  + '\r\n', function (err) {
          if (err) return console.log(err);
        });
      }
    });

    fs.appendFile(file,data +  this.date  +'\r\n' ,encoding='utf8',function(err)
    {
      if (err) return console.log(err);
    });
  }

  this.logconnect =function(data)
  {
    this.writerlog(data,fileconnect);
  }

  this.logserver = function(data)
  {
    this.writerlog(data,filelog);
  }

  this.logip = function(data)
  {
    this.writerlog(data,fileip);
  }
}