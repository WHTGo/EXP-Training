<?php
/**
 * Created by PhpStorm.
 * User: ngodo
 * Date: 20/11/2015
 * Time: 3:52 PM
 */
class SignupModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }
    public function signup()
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