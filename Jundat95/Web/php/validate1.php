<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Jundat95</title>
</head>
<body>

        <?php
             // Khoi tao bien
                $name=$pass=$ghichu=$gender = "";
                $erroName=$erroPass=$erroGender = "";
                // Kiem tra gia tri nhap vao
                if($_SERVER["REQUEST_METHOD"] == "POST")
                {
                    if(empty($_POST["name"]))
                    {
                        $erroName = "Xin moi nhap ten.";
                    }
                    else
                    {
                        $name = inputdata($_POST["name"]);
                        //Kiem tra khoang trang name
                        if (!preg_match("/^[a-zA-Z ]*$/",$name))
                        {
                            $erroName = "Ten vua nhap khong hop le.";
                        }
                    }
                    if(empty($_POST["pass"]))
                    {
                        $erroPass = "Xin moi nhap vao mat khau.";
                    }
                    else
                    {
                        $pass = inputdata($_POST["pass"]);
                    }
                    if(empty($_POST["gender"]))
                    {
                        $erroGender = "Xin moi chon gio tinh.";
                    }
                    else
                    {
                        $gender = inputdata($_POST["gender"]);
                    }
                    $ghichu = inputdata($_POST["ghichu"]);


                }
                // Chuan hoa xau nhap vao
                function inputdata($data)
                {
                    $data = trim($data);
                    $data = stripcslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
               }
        ?>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >

            <br>Name:
            <br><input name="name" type="text" >
            <span class="erro">*<?php echo$erroName ?></span>
            <br>Pass:
            <br><input name="pass" type="password" >
            <span class="erro">*<?php echo$erroPass ?></span>
            <br> Nghi Chu:
            <br><textarea name="ghichu" rows="5" cols="30" ></textarea>
            <br><input name="gender" type="radio" value="Male">Male
            <br><input name="gender" type="radio" value="Female">Female
            <span class="erro">*<?php echo$erroGender ?></span>
            <br><input name="login" type="submit" value="submit">

        </form>

        <?php

            echo "Input---------------------------- ";
            echo "<br>";
            echo "Name ".$name;
            echo "<br>";
            echo "Pass ".$pass;
            echo "<br>";
            echo "ghi Chu ".$ghichu;
            echo "<br>";
            echo "Gender ".$gender;
        ?>
</body>
</html>