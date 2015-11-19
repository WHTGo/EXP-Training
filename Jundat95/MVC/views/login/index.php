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
        <form method="post" action="login/run" >

                <br>Name:
                <br><input name="name" type="text" >
                <span class="error">*<?php echo$erroName ?></span>
                <br>Pass:
                <br><input name="pass" type="password" >
                <span class="error">*<?php echo$erroPass ?></span>

                <br><input name="login" type="submit" value="submit">

        </form>


