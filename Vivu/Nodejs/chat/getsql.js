var database = require('./database').DB;
var ramdom = require('./ramdom');
var DB = new database;

// online
//*********************************************************************************************************************************88
exports.online = function(callback)
{
	DB.selectOne('SELECT count(*) from online',[],function(data)
	{
		callback(data['count(*)']);
	});
}

// offinle
//*********************************************************************************************************************************
exports.offline = function()
{
	DB.query('delete from `online` where DATE_ADD(`timeout`, INTERVAL 60 SECOND) < now()',[],function(data){
		
	})

}

// set out
//*************************************************************************************************************************************
exports.insertoffline = function(input)
{
	DB.update('update online set timeout = now() where idsk=? ',[ input],function(data)
	{
		//
	})
}

// get idsk regac
//**********************************************************************************************************************************
exports.getidregac = function(callback)
{
	this.data = function(input)
	{
		DB.selectOne('SELECT idsk from chat,user where chat.id =? and chat.idregac=user.id',[input],function(data)
		{
			callback(data['idsk']);
		});
    }
}


//xoa chat
//************************************************************************************************************************************
exports.deletechat = function(id)
{
	DB.query('delete from `chat` where id = ?',[id],function(data){
		//
	})
}

//check online
//************************************************************************************************************************************
exports.checkonl = function(callback)
{
	this.data = function(id)
	{
		DB.selectOne('SELECT count(*) from online where id = ?',[id],function(data)
		{
			callback(data['count(*)']);
		});
	}
}


// dang nhap
//*************************************************************************************************************************************
exports.sign = function(callback)
{
	this.data = function (input)
	{
		DB.selectOne('SELECT count(*) from user where id=? and match = ?',[ input['id'],input['match']],function(data)
		{
			if(data['count(*)']==1)
			{
				DB.update('update user set idsk = ? where id = ?',[ input['idsk'],input['id']],function(data)
				{
					//
				})
				callback({'id':input['id'],'match':input['match']});

			}
			else
			{
				//ham ramdom
				var proc = function(data)
				{
					DB.insert('insert into values(?,?,"nguoi la")',[data['id'],input['idsk']],function()
					{
						//
					})
					callback(data);

				}
				new ramdom.user(proc).set();
			}
		
		});
	}
}



//************************************************************************************************************************************
exports.ramdomchat = function(callback)
{
	this.data = function(input)
	{
		var getid = function(id)
		{
			var res = function(idregac)
			{
				DB.selectOne('SELECT idsk from user where id=?',[ id['id'] ],function(idskregac)
				{
					DB.insert('insert into `chat` values(?,?,?,?)',[ id['id'],input,idregac,idskregac['idsk']],function(data)
					{
						//
					})
				})
				callback(idregac);
			};
			new ramdom.chat(res).set(input);
		}
		Db.DB.selectOne('SELECT id from user where idsk=?',[ input ],getid);
	}
}




//**************************************************************************************************************************************8
exports.updateMsg = function()
{
	this.data = function(input)
	{
		DB.insert('insert into `messenger`("id","idregac","msg","time") values(?,?,?,now())',[ input['id'],input['idregac'],input['msg'] ],function(data)
		{
			//
		})
	}
}
	


//*****************************************************************************************************************************************
exports.exit =function()
{
	this.id = null;
	this.idskregac = null;
	this.data = function(input)
	{
		DB.selectOne('SELECT * from chat where idsk=?',[ input ],function(data)
		{
			this.id = data['id'];
			this.idskregac = data['idskregac'];
		});
	}
	DB.query('delete from `chat` where id = ?',[this.id],function(data){
		//
	})
}


//****************************************************************************************************************************************
exports.getidsk = function(callback)
{
	this.data =function(input)
	{
		DB.selectOne('SELECT idsk from user where id=?',[ input ],function(data)
		{
			callback(data['idsk']);
		})
	}
}


//*******************************************************************************************************************************************
exports.reconnect = function(callback)
{
	thi.timeout = null;
	this.data =function(input)
	{
		DB.selectOne('SELECT count(*) from `user` where id = ? and match = ?',[input['id'],input['match']],function(data)
		{

			if(data['count(*)']==1)
			{
				DB.selectOne('SELECT * from `online` where id=?',[ input['id'] ],function(data)
				{
					this.timeout = data['timeout'];
				});

				DB.update('update online set timeout = null where id = ?',[input['id']],function(data)
				{
					//
				});
				
				// dan idsk moi vao user
				DB.query('call resetidsk(?,?)',[ input['id'],input['idsk']],function(data)
				{
					//
				})

				
				DB.selectOne('SELECT * from `chat` where id=?',[ input['id']],function(data)
				{
					if(data.length==1)
					{
						var idskregac = data[0]['idskregac'];
						callback({'state':'true','chat':'on','idskregac': idskregac,'idregac':data['idregac'],'timeout':this.timeout});
					}
					else
					{
						callback({'state':'true','chat':'off'});
					}
				});
			}
			else
			{
				callback({'state':'false'});
			}

		});
	}
}

exports.resendmsg=function(socket,data)
{
	DB.query('SELECT * from `messenger` where `idsend`= ? and `idregac`=? adn `time` = ?',[ data['id'],data['idregac'],data['time']],function(output)
	{
		for(var val in output) 
		{
			var date = new Date(val['time']);
  			var time = date.getHours()+':'+date.getMinutes();
		   socket.emit('messenger client',{'msg':val['msg'],'time':time});
		}
	});
}
