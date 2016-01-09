<html>
<head>
    <title> Trang quan ly</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link type="text/css" href="<?php echo STORE ?>/stye.css"/>
    <script src="<?php echo STORE ?>/jquery.min.js"></script>
    <script>
    function check()
    {
        var user = $("#user").val().trim();
        var pass = $("#pass").val().trim();
        var repass = $("#repass").val().trim();
        
        if(user.length <6)
        {
            $("#view-o").val(" Tên đăng nhập phải lớp hơn hoặc bằng 6 kí tự! ");
             return false;
        }else if(pass.length <3)
        {
            $("#view-o").val(" Mật khẩu đăng nhập phải lớp hơn hoặc bằng 3 kí tự! ");
              return false;
        }else
        {
            return true;
        }
         
    }
        
        
    </script>
    
</head>
<body>
    <div class="warp">
        <div class="add">
            <div id="view-o"></div>
            <div> <?php echo $ero; ?></div>
            <form action="index.php?controll=kiemtra&action=add" method="post">
                <table>
                    <tr>
                        <td> user: </td>
                        <td> <input id="user" name="user" type="text" value="<?php echo $user ?>"  placeholder="user" min="6"/></td>
                    </tr>
                    <tr>
                        <td> password:</td>
                        <td><input id="pass" name="pass" type="password" value="<?php echo $pass ?>" placeholder="password" min="6" /></td>
                    </tr>
                    <tr>
                        <td> Repassword: </td>
                        <td><input id="repass" name="repass" type="password" value="<?php echo $repass ?>" accept="" placeholder="repassword" min="6" /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input  name="sigup" type="submit" value="sigup" onclick="return check();"/></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    
</body>

</html>