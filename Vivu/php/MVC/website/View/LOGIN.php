<html>
    <head>
        <title>Login</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    </head>
    <body>
   
    <div id="warp">
        <form action="index.php?controll=kiemtra&action=login" method="POST">
        <table>
            <tr>
                <td>
                    Username
                </td>
                <td>
                    <input type="text" name="user" value="" draggable="username" />
                </td>
            </tr>
            <tr>
                <td>
                    Password
                </td>
                <td>
                    <input type="password" name="pass" value="" draggable="password" />
                </td>
            
            </tr>
        </table>
        <input type="submit" name="submit" value="Login"  onclick=""/>
    </form>
    <br />
    <br />
    <form method="post" action="index.php?controll=kiemtra&action=logout">
        <input name="logout" type="submit" value="logout"/>
    </form>
    </div>
    </body>
</html>