var userId=0;
var youId=0;
var math=0;

function online(){
    $.ajax({
        url: 'getNumberOfUsers.php',
        type: 'POST',
        data: 'id='+userId,
        success: function(munber){
            $('#online').append(munber);
            
        },
        error: function (){
				alert('Có l?i x?y ra');
			}
    })
}

function startChat(){
    $.ajax({
        url: 'startChat.php',
        type: 'POST',
        data: "userId="+userId+"&math=" + math,
        success: funftion(string){
            var data = $.parseJSON(string);
            userId=data[1];
            math=data[2];
            },
        error: function (){
            alert('Có l?i x?y ra');
        }
    })
}

function leaveChat(){
    $.ajax({
        url: 'leaveChat.php',
        type: 'POST',
        data: "userId="+userId,
        success: function(){
            //
        },
        error: function (){
            alert('Có l?i x?y ra');
        }
    })
}

function randomChat(){
    $.ajax({
        url: 'randomChat.php',
        type: 'POST',
        data: "userId=" + userId,
        success: function (data){
            youId=data;
            
        },
        error: function (){
            alert('Có l?i x?y ra');
        }
    });
    
}

function listenToReceive(){
    $.ajax({
        url: 'listenToReceive.php',
        type: 'POST',
        data: "userId=" + userId + "&youId=" + youId,
        success: function(string){
            if (string=='t'){
                // you thoat
            }else{
                 if (string=='n'){
                    // choi
                }else{
                    var data = $.parseJSON(string);
                    for( var i in data){
                        var row=data[i];
                        var vi="<div class='chatyou'>"+row+"</div>";// xuat chat nguoi la
                        var a=$("#viewchat").html();
                        $("#viewchat").html(a+vi)
                    }
                }
           
            }
        },
        error: function (){
            alert('Có l?i x?y ra');
        }
    })
}

function sendMsg(){
    var msg=$('#msg').val();
    $('viewchat').append("<div class='mychat'>"+msg+"<div>");
    $.ajax({
        url: 'sendMsg.php',
        type: 'POST',
        data: "userId=" + userId + "&strangerId=" + strangerId + "&msg=" + msg,
        success: function(data){
            if (ok=='o'){
                $('viewchat').append("<div id='guiok'>Ð? g?i<div>");
            }
        }
    })
    
    
    
    
    }