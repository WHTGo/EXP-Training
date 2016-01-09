<html>
    <head>
        <title>Manager</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    </head>
    <style>
    table
    {
        border-collapse: collapse;
    }
    table, td, th 
    {
        border: 1px solid black;
    }
    </style>
    <body>
        <div class="warp">
            <a class="bt" href="index.php?controll=kiemtra&action=add"> them thanh vien </a>
            <table class="table" >
                <thead>
                    <td> ID tài khoản</td>
                    <td> Tài khoản </td>
                </thead>
                <tbody class="view">
                    <?php
                        while($rows=mysqli_fetch_assoc($data))
                        {
                            echo "<tr>";
                            echo "<td>".$rows['id']."</td>";
                            echo "<td>".$rows['user']."</td>";
                            echo "</tr>";
                        } 
                    ?>
                </tbody>
            </table> 
            
            <a href="<?php echo $url_p ?>" > Trước</a>
            <input value="<?php echo $page." / ".$allpage; ?>" />
            <a href="<?php echo $url_n ?>" >  Sau </a>
        </div>
        
    </body>
</html>