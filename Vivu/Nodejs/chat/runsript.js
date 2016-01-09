var socket = io.connect();
var idregac = 0;
var idio;

var sign = function() { return {'id':$.cookie("id"),'match': $.cookie("match")}; }

//************************ check online ****************
//*****************************************************
socket.emit('on web',sign);
//bat online
socket.on('online', function (data) { $("#online").html(data+" online"); });
//**********************************************************************


//******************* sign web **********************
//*************************************************

var sign_client = function (data)
{
	$.cookie("id",data['id'],{ expires: 365 });
	$.cookie("match",data['match'],{ expires: 365 });
}
function sign_web() { socket.emit("sign web",sign); }
socket.on('sign client',sign_client);
//*******************************************************


//******************* stast chat *************************
//******************************************************
var start_web = function(data)
{
	idregac= data['idregac'];
	idio = data['idio'];
	// chuyen trang thai
}
function start_chat(){ socket.emit("start"); }
socket.on('start client',start_web);
//*********************************************************


//******************** messenger **********************
//*****************************************************
var messenger_view = function(data)
{

}
function messenger(data){ socket.emit('messenger',{'idregac':idregac,'msg':data}); }
socket.on('messenger client',messenger_view);
//*********************************************************


//******************** state messenger *****************
//******************************************************
var state_msg = function(data)
{
	if (data=='s')
	{
		// gui
	}else if(data=='r')
	{
		// nhan
	}else if(data=='v')
	{
		// xem
	}
}
function start(data){ socket.emit('state msg', {'state':data,'id':idio); }
socket.on('state regac',state_msg);
//*******************************************************


//******************* is typing *************************
//*****************************************************
var is_typing_cl = function()
{
	// nguoi chat dang viet
}
function is_typing() { socket.emit("is typing",idio); }
socket.on('is typing client',is_typing_cl);
//***************************************************


//********************* exit ***********************
//************************************************
var exit_chat = function ()
{
	// thong bao chuyen trang thai
	console.log("af");
}
function exit() { socket.on('exit chat'); };
socket.on('exit client',exit_chat);
//*******************************************************


//********************* reconnect ***********************
//*******************************************************
var reconnect-suss = function()
{
	// Xu ly
}
var reconnect-regac = function(id)
{
	idio = id;
}
function reconnect(){ socket.emit('reconnect',{sign,'idregac':idregac});}
socket.on('reconnect client',reconnect-suss);
socket.on('reconnect regac',reconnect-regac)


//***************** dis - reconect ********************
//*******************************************************
var re-chat = function(data)
{
	idregac = data['idregac'];
	idio = data['idio'];
	//chuyen man hinh
}
socket.on('reconnect chat',re-chat);