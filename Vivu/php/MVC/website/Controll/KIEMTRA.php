<?php

class KIEMTRA_C extends Controll
{
    public function __construct()
    {
        parent::__construct();
        $this->Model->load("database");
        $this->Model->database->load();
    }
    
    public function LOGIN()
    {
        //var_dump($this->Model->database);
        $content = array();
        $user = getpost("user");
        $pass = getpost("pass");
        $usercookie = getcookie("user");
        $passcookie = getcookie("pass");
    
        ob_start();
        
        if($usercookie!=null)
         {
            if($passcookie!=null)
            {    
                $data = $this->Model->database->login($usercookie,$passcookie);
                if($data['login']==1)
                {
                    header('location:index.php?controll=kiemtra&action=manager');
                }
            }
            
         }
        
        if(isset($_POST['submit']))
        {
            if($user!=null)
            {
                if($pass!=null)
                {
                     $data = $this->Model->database->login($user,$pass);
                    if($data['login']==1)
                    {
                        setcookie("user",$user,time()+360);
                        setcookie("pass",$pass,time()+360);
                        header('location:index.php?controll=kiemtra&action=manager');
                    }else
                    {
                        echo "Tài khoản hoặc mật khẩu sai!";
                    }
                }else
                {
                    echo "Bạn chưa nhập password!";
                }
               
            }else
            {
                echo "Bạn chưa nhập user!";
            }
         }
         
        $content = ob_get_contents();
        ob_end_clean();
        $this->View->load("login",$content);
        $this->View->Show();
    }
    
    
    public function LOGOUT()
    {
        if(isset($_POST['logout']))
        {
            setcookie("user"," ",time()-360);
            setcookie("pass"," ",time()-360);
            header('location:index.php?controll=kiemtra&action=login');
        }
        $this->View->load("user");
        $this->View->Show();
    }
    
    public function MANAGER()
    {
        $page = isset($_GET["page"])? $_GET["page"] : 1;
        if($page==null)
        {
            $page = 1;
        }
        $d_count = $this->Model->database->manager($page,1);
        if($page > $d_count["allpage"])
        {
            $page = $d_count["allpage"];
        }
        $n =  $page+1 ;
        $p = ($page==0)? 1 : $page-1 ;
        $url_n = "index.php?controll=kiemtra&action=manager&page=".$n;
        $url_p = "index.php?controll=kiemtra&action=manager&page=".$p;
        $start = ($page-1)*20;
        $data = $this->Model->database->manager($start,2);
        if(mysqli_num_rows($data))
        {
            $datas = array("data"=>$data,"url_n"=>$url_n,"url_p"=>$url_p,"page"=>$page,"allpage"=>$d_count["allpage"]);
        }
        $this->View->load("manager",$datas);
        $this->View->Show();
    }
    
    public function ADD()
    {
        if(isset($_POST['sigup']))
         {
            $user = getpost('user');
            $pass = getpost('pass');
            $repass = getpost('repass');
            ob_start();
            $pattern = '/[a-z][A-Z]^[0-9]+$/';
            $number = '/[0-9]+$/';
            $subject = '0979306603';
            if($user!=null)
            {

                if (!preg_match($number, $user[0], $matches)){
                    
                
                    if($pass!=null)
                    {
                        if($pass=$repass)
                        {
                            $data = $this->Model->database->add($user,$pass);
                            if($data==1)
                            {
                                $ero = " loi tai khoai da ton tai! ";
                            }
                            else
                            {
                                header('location:index.php?controll=kiemtra&action=manager');
                            }
                        }
                        else
                        {
                             $ero = "Mat khau nhap không khop! ";      
                        }
                    }
                    else
                    {
                        $ero = "Ban chưa nhập pass! ";
                    }
                }
                else
                {
                    $ero = "Đầu tiên là chữ";
                }
            }
            else
            {
                $ero = "Ban chua nhap user! ";
            }
            
         }
        $content = ob_get_contents();
        ob_end_clean();
        $this->View->load("add",array("ero"=>$ero,"content"=>$content,"user"=>$user,"pass"=>$pass,"repass"=>$repass));
        $this->View->Show();
    }
}