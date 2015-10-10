var app = require('http').createServer(handler)
var io = require('socket.io')(app);
var fs = require('fs');
//var url = require("url");
var database = require('./getsql');
var sleep = require('sleep');
//var clientIp = require('client-ip');
var logtext = new require('./savelog').logtext;

app.listen(80);
console.log("Start server...");
function handler (req, res) {
  if(req.url=="/"){
    req.url="/index.html";
  }
  //var req = url.parse(req.url).pathname;
  //console.log(req.url);
  fs.readFile(__dirname + req.url, function (err, data) {
    if (err) {
      res.writeHead(500);
      return res.end('khong tim thay file');
    }
    res.writeHead(200);
    res.end(data);
  });
}



//************************************************************************************************************************************************************
var loop = function()
{
  database.offline();
  setTimeout(loop,30000);
}
setTimeout(loop,30000);



//*************************************************************************************************************************************************************
io.on('connection', function (socket)
{

  // reconnect chat
  //***********************************************************************
   function reconnect_chat(data)
   {
    // xu ly co so du lieu
    var proc = function(output)
    {
      if(output[state]=='true')
      {
        socket.emit('reconnect client','ok');
        
        if (output['chat']=='on') // co dang trong chat hay khong
         {
          //gui lai idio
          socket.id(output['idskregac']).emit('reconnect regac',socket.id);
          // gui lai idregac vaf idskregac
          socket.emit('start client',{'idregac':output['idregac'],'idio':output['idskregac']});
          //gui lai tin nhan

          database.resendmsg(socket,{'id':output['id'],'idregac':output['idregac'],'time':output['time']});
          //xu ly tren sql


         }else
         {
          socket.emit('exit client');
        }
      }
    }
    new database.reconnect(proc).data({'id':data['id'],'match':data['id'],'idsk':socket.id});

    // var proc;
    //if(proc) // so sanh dung sai id & match
    //{
    //  socket.emit('reconnect client','ok');
    //  var regac-onl;
    //  if (regac-onl) // co dang trong chat hay khong
    //  {
    //    //gui lai idio
     //   var idio;
    //    var idregac;
    //    socket.id(idio).emit('reconnect regac',socket.id);
    //    socket.emit('reconnect chat',{'idregac':idregac,'idio':idio});
    //  }
    //}
   }
  //**********************************************************************

  //check nguoi online khi dang nhap
  //***********************************************************************
  var online = function(data){
    // xu ly dang chat
    reconnect_chat(data);
    var callback = function(data)
    {
      socket.emit('online',data);
    }
    database.online(callback);
  }
  socket.on('on web',online);
  //**********************************************************************


  // xu ly sign
  //************************************************************************
  var sign = function(data)
  {
    var proc = function(output)
    {
      //var address = socket.handshake.address;
      logtext.logip(socket.handshake.address);
      socket.emit('sign client',{'id':id,'match':match});
    }
    var input = {'id':data['id'],'match':data['match'],'idsk':socket.id};
    new database.sign(proc).data(input);
  }
  socket.on('sign web',sign);
  //************************************************************************


  // xu ly ramdom chat
  //***********************************************************************
  var Start = function()
  {
    // ramdom chat
    var proc = function(data)
    {
       var procid = function(dataidsk)
      {
        socket.emit('start client',{'idregac':data,'idio':dataidsk});
      }
      new database.getidsk(procid).data(data);
    }
    new database.ramdomchat(proc).data(socket.id); 
  }
  socket.on('start',Start);
  //*********************************************************************


  // xu ly messenger
  //**********************************************************************
  var messenger = function(data)
  {
    // xu ly tai mysql
    socket.emit('state msg','s');
    var data = {'id':data['id'],'idregac':data['idregac'],'msg':data['msg']};
    new database.updateMsg.data(data);
    // lay idsk
    var procid = function(data)
    {
      var date = new Date();
      var time = date.getHours()+':'+date.getMinutes();
      socket.id(data).emit('messenger client',{'msg':data['msg'],'time':time});
    }
    new database.getidsk(procid).data(data['idregac']);
  }
  socket.on('messenger',messenger);
  //**********************************************************************


  // xu ky is typing
  //**********************************************************************
  var is_typing = function(id)
  {
    socket.id(id).emit('is typing client');
  }
  socket.on('is typing',is_typing);
  //**********************************************************************


  // xu ly state
  //***********************************************************************
  var state = function(data)
  {
    socket.id(data['id']).emit('state msg',data['state']);
  }
  socket.on('state msg',state);
  //***********************************************************************


  // exit
  //************************************************************************
  var exit = function()
  {
    var procid = function(data)
    { 
      var proc = function(count)
      {
        var procregac = function(idregac)
        {
          socket.id(idregac).emit('exit client');
        }
        new database.getidregac(procregac).data(data)
        database.deletechat(data);
      }
    }
    new database.getidsk(procid).data(socket.id);
  }
  socket.on('exit chat')
  //************************************************************************

  // client thoat
  //*********************************************************************
  socket.on('disconnect',function(){
    console.log(socket.id);
    database.insertoffline(socket.id);
    sleep.sleep(35);//sleep for 35 seconds
    var procid = function(data)
    { 
      var proc = function(count)
      {
        if (count==0)
        {
          var procregac = function(idregac)
          {
              socket.id(idregac).emit('exit client');
          }
          new database.getidregac(procregac).data(data)
          database.deletechat(data);
        }
      }
      new database.checkonl(proc).data(data);
    }
    new database.getidsk(procid).data(socket.id);
  });
  //********************************************************************* 


  // reconnect
  //**********************************************************************
  var reconnect = function(data)
  {
    //check tai khoai
    //ket noi mysql
    var proc = function(output)
    {
      if(output[state]=='true')
      {
        socket.emit('reconnect client','ok');
        
        if (output['chat']=='on') // co dang trong chat hay khong
         {
          //gui lai idio
          socket.id(output['idskregac']).emit('reconnect regac',socket.id);
          //gui lai tin nhan
          database.resendmsg(socket,{'id':output['id'],'idregac':output['idregac'],'time':output['time']});
          //xu ly tren sql


         }else
         {
          socket.emit('exit client');
        }
      }
    }
    new database.reconnect(proc).data({'id':data['id'],'match':data['id'],'idsk':socket.id});
  }
  socket.on('reconnect',reconnect);
  //**********************************************************************
});