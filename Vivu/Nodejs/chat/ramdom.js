var random = require("random-js")(); // uses the nativeMath engine
var database = require('./database').DB;
var sleep = require('sleep');
var DB = new database;
var engine = "QWERTYUIOPASDFGHJKLZXCVBNM1234567890";

exports.user =function(callback)
{
	this.id =null;
	this.match = null;
	this.getid = function()
	{
		this.id = random.string()(engine,20);
	}

	this.getmatch = function()
	{
		this.match = random.string()(engine,10);
	}

	this.set = function()
	{
		this.getmatch();
		this.getid();
		DB.selectOne('SELECT count(*) from user where id=? and match=?',[this.id,this.match],function(data)
		{
			if(data['count(*)']==0)
			{
				callback({'id':this.id,'match':this.match});
			}else
			{
				this.set();
			}
		});
	}
}

exports.chat = function(callback)
{
	this.idregac = null;
	this.id = null;
	this.insert = function()
	{
		DB.insert('insert into(`id`) values(?)',[this.id],function()
		{
			//
		})
	}

	this.search = function ()
	{
		var id = function(data)
		{
			if (data['id']==null)
			{
				//var time = random.integer(1000, 5000);
				setTimeout(this.search(),1000);
			}
			else
			{
				DB.query('update  random set `check` = true where id = ?',[data['id']],function(out)
				{
					//
				});
				//sleep.sleep(1);
				DB.selectOne('SELECT count(*) from `chat` where idregac = ?',[data['id']],function(out1)
				{
					if (out1['count(*)']==0)
					{
						DB.query('delete from `chat` where id = ?',[this.id],function(data)
						{
							//
						});
					}
					else
					{
						this.check();
					}
				});
				callback(out['id']);
			}
		};
		DB.selectOne('SELECT * from chat where `id`!=? and `id` not in( SELECT `id`  from `chat`) and `id` not in (SELECT idregac from chat) check = false ORDER BY RAND() LIMIT 0,1',[this.id],count);
	}

	this.check = function()
	{
		DB.query('SELECT id from `chat` where idregac = ?',[this.id],function(data)
		{
			if (data.length > 0)
			{
				DB.query('delete from `chat` where id = ?',[this.id],function(data)
				{
					//
				});
				callback(data[0]['id']);
			}
			else
			{
				this.search();
			}
		});
	}

	this.set = function(iduser)
	{
		this.id = iduser['id'];
		this.insert();
		var value = random.integer(1,2);
		sleep.sleep(value);
		this.check();
	}
}
