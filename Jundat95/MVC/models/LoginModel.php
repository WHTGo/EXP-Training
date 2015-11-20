<?php
/**
 * Created by PhpStorm.
 * User: ngodo
 * Date: 19/11/2015
 * Time: 3:58 PM
 */
class LoginModel extends Model
{
    var $name;
    var $pass;
    public function __construct()
    {
        parent::__construct();
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


}