var mysql      = require('mysql');
var config = require('./config').database;
 //console.log(config);
var DB = function(){
  this.connection = null;
  this.connect = function()
  {
    this.connection = mysql.createConnection(config);
      this.connection.connect();
  } 

  this.query =function(sql,callback)
  {
     this.connect();
    this.connection.query(sql, function(err, rows, fields) {
      if (err)
        throw (err);
      else
        callback(rows);
    });
    this.connection.end();
  }

  this.insert = function(sql, data, callback){
    this.connect();
    var query = this.connection.query(sql, data,function(err, result) {
      if (err)
        throw (err);
      else
    callback(result);
    });

    query.on('error', function(err) {
      // Handle error, an 'end' event will be emitted after this as well
    })
    this.connection.end();
  }

  this.selectOne = function(sql, data, callback){
    this.connect();
    var q = this.connection.query(sql, data,function(err, results) {
      if (err)
        throw (err);
      else
        callback(results[0]);
    });
    this.connection.end();
  }
   
    this.update = function(sql, data, callback){
      this.connect();
      this.connection.query(sql, data, function(err, result) {
        if (err)
          throw (err);
        else
          callback(result);
        });
      this.connection.end();
    }
   
    this.select = function(sql, data, callback){
      this.connect();
      var q = this.connection.query(sql, data,function(err, results) {
        if (err)
          throw (err);
        else
          callback(results);
      });
    }
}

exports.DB = DB;