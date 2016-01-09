    function SendData(){
        
        $.ajax({
            url: 'index.php?c=Chat&a=Offline',
            type: 'POST',
            data:{data:'f'},
            error: function ()
            {
                alert('Có lỗi xảy ra');
            }
        });
    }
    
    $(document).ready(function(){
        offline();
    });
    
    function offline()
    {
        SendData();
        window.setTimeout("offline();", 20000);
    }
    
    
    