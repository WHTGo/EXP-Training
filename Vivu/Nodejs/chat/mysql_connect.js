/*Author ChungNN*/
var configuration = require('./configuration');
var mysql      = require('mysql');
 
var MySQLConnector = function(){
 
    this.connection = null;
   
    this.connect = function(){
        if(!this.connection){
            this.connection = mysql.createConnection({
              host    : configuration.CONF.mysql_host,
              user    : configuration.CONF.mysql_user,
              password : configuration.CONF.mysql_password,
              database : configuration.CONF.mysql_dbname
            });
            this.connection.connect();
        }
    }
   
    this.query = function(sql, callback){
        this.connect();
        this.connection.query(sql, function(err, rows, fields) {
            if (err) throw (err);
            callback(rows);
        });
    }
   
    this.insert = function(sql, data, callback){
        this.connect();
        var query = this.connection.query(sql, data,function(err, result) {
            if (err) throw (err);
            callback(result);
        });
       
        query.on('error', function(err) {
                    // Handle error, an 'end' event will be emitted after this as well
                })
    }
   
    this.selectOne = function(sql, data, callback){
        this.connect();
        var q = this.connection.query(sql, data,function(err, results) {
            if (err) throw (err);
            if (results.length > 0)
                callback(results[0]);
            else
                callback(null);
        });
    }
   
    this.update = function(sql, data, callback){
        this.connect();
        this.connection.query(sql, data, function(err, result) {
            if (err) throw (err);
            callback(result);
        });
    }
   
    this.select = function(sql, data, callback){
        this.connect();
        var q = this.connection.query(sql, data,function(err, results) {
            if (err) throw (err);
            if (results.length > 0) 
                callback(results);
            else
                callback(null);
        });
    }
}
 
exports.MySQLConnector = MySQLConnector;
 