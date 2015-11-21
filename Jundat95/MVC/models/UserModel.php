<?php
/**
 * Created by PhpStorm.
 * User: ngodo
 * Date: 17/11/2015
 * Time: 9:30 AM
 */
class UserModel extends Model
{
    public function __construct()
    {
      parent::__construct();
    }

    public function getList()
    {
        return  $this->query("SELECT * FROM users")->fetchAll();
    }

    public function login()
    {
        $name = $_POST['name'];
        $pass = $_POST['pass'];
        $stmt = $this->db->prepare('select * from users where username=:username and pass=:pass');
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute(array('username'=>$name,'pass'=>$pass));
        $stmt =$stmt->fetchAll();
        return $stmt;
    }

    public function signUp()
    {
        $name = $_POST['name'];
        $pass = $_POST['pass'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        $stmt = $this->db->prepare('insert into users(username,pass,phone,email) VALUES(:username,:pass,:phone,:email)');
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute(array('username'=>$name,'pass'=>$pass,'phone'=>$phone,'email'=>$email));
        $stmt = $stmt->fetchAll();
        return $stmt;
    }

}