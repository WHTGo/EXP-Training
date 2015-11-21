<?php
/**
 * Created by PhpStorm.
 * User: ngodo
 * Date: 17/11/2015
 * Time: 2:27 PM
 */
class OrderModel  extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getList()
    {
        $stmt = $this->db->prepare('Select *from orders');
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $stmt = $stmt->fetchAll();
        return $stmt;
    }
    public function  add()
    {
        $iduser = $_POST['iduser'];
        $day = $_POST['day'];
        $bookitem = $_POST['bookitem'];
        $number = $_POST['number'];

        $stmt = $this->db->prepare('Insert into orders(iduser,day,bookitem,number) VALUES(:iduser,:day,:bookitem,:number)');
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute(array('iduser'=>$iduser,'day'=>$day,'bookitem'=>$bookitem,'number'=>$number));
        $stmt = $stmt->fetchAll();
        return $stmt;
    }

}