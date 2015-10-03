$(document).ready(function(){        
            $('#sumbit1').unbind('click');
            if (screen.width<=900){
                $("#main").css('background','red');
                $("#main").css('margin','0 30  auto');
               
            }
            if (screen.width<=593){
                $("#intro").hide(); 
            }
            $( window ).resize( function(){
                if($(window).width()<=593)
                {
                    $("#intro").hide();
                }else
                {
                    $("#intro").show();
                }
            });
             $('#newmsg').each(function() {
                var elem = $(this);
                setInterval(function() {
                    if (elem.css('opacity') == '1') {
                        elem.css('opacity', '0.9');
                    } else {
                        elem.css('opacity', '1');
                    }    
                }, 400);
            });
            $("#newmsg").click(function()
            {
                $(".newmsgdv").hide();
                $("#main").scrollTop($("#main").height());
            })
            
            
            //$("#input").css('')
            /*
            var div = $('#task');
            var start = $(div).offset().top;
         
            $.event.add(window, "scroll", function() {
                var p = $(window).scrollTop();
                $(div).css('position',((p)>start) ? 'fixed' : 'static');
                $(div).css('top',((p)>start) ? '0px' : '');
            });
            */
           
           
            $('#sumbit1').click(function(){
                $('#icochat').show();
                
            });
             $(document).click(function(){
                if ($('#icochat').is(':visible')){
                    
                }else{
                     $('#icochat').hide();
                }
               
                
            });
            $('#icochat').mouseleave(function(){
                
                 $('#icochat').hide();
                
            });
            $("#main").on( 'scroll',function(eS){
         //if(($("#main").scrollTop()/$("#main").height()) *$("#main").height() >35 )
           // {
                $('#task').css('top',( ($("#main").scrollTop()/$("#main").height() ) *$("#main").height() ) );
           // }
           
        
        })
        
       })
       $(function(){
            function mesger()
            {
                var d=new Date();
                var m=d.getMinutes();
                var h=d.getHours();
                
                    var msg = $("#mesg").val();
                    if ($.trim(msg)!="")
                    {
                        $("#viewdata").append("<div class='view_c' ><div class='userc with_c'><h6>"+emotify( msg )+"</h6><h6><small><b class='time'> "+h+":"+m+" </b><b style='font-size: 12px;'> | </b> <b class='state'>đã gửi</b></small></h6></div></div>  "); // tin nhan
                        //$("#main").scrollTop($("#main").height());
                        $("#main").scrollTop($("#viewdata").height()-$("#main").height()+33)
                        $("#mesg").val("");
                    }
                    
            }
            $("#send").click(function()
            {
                    mesger();
           })
           $('#mesg').keypress(function(event) {
                var keycode = (event.keyCode ? event.keyCode : event.which);
                if(keycode == '13') {
                     mesger();
                }
            });
            $("#menu1").click(function()
            {
                setup();
            })
            $("#rengar").click(function()
            {
                inforanger();
            })
            
       })
              