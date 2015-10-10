<?php

/**
 * @author Gio
 * @copyright 24/5/2015
 */

class MySQL
{
    public $host;
    public $user;
    public $pass;
    public $db;
    public $conn;
    public function MySQL($_host,$_user,$_pass,$_db)
    {
        $this ->host = $_host;
        $this ->user =$_user;
        $this ->pass =$_pass;
        $this ->db = $_db;
    }
    
    public function Connect()
    {
        try
        {
        	 $this-> $conn  = new mysqli($this ->host,$this->user,$this->pass,$this->db);
             $conn->set_charset('utf8');
             if($conn->errno !== 0)
             {
                 die("Lỗi: Không thể kết nối tới cơ sở dữ liệu. Lỗi tại ".$connect->error." .");
             }
        }
        catch(Exception $e)
        {
        	  echo "Một exception vừa được throw: <b>".$e->getMessage()."</b> tại dòng ".$e->getLine()." trong file ".$e->getFile();
        }
       
    }
    
    public function Connect_Conn()
    {
        try
        {
        	$this-> $conn  = new mysqli($this ->host,$this->user,$this->pass,$this->db);
            $conn->set_charset('utf8');
            if($conn->errno !== 0)
            {
                die("Lỗi: Không thể kết nối tới cơ sở dữ liệu. Lỗi tại ".$connect->error." .");
            }
         }
        catch(Exception $e)
        {
        	  echo "Một exception vừa được throw: <b>".$e->getMessage()."</b> tại dòng ".$e->getLine()." trong file ".$e->getFile();
        }
        return $conn;
    }
    
    public function Close()
    {
       $this->conn->Close();
    }
    
    public function Get_query($sql)
    {
        $this -> Connect();
        $table = $conn->query($sql);
        $this -> Close();
        return $table;
    }
    
    public function GetTable($table,$where)
    {
        $query = "select * from " + $table;
        if ($where != null)
        {
            $query += "where "+$where;
        }
        $data = $this  ->Get_query($query);
        return $data;
    }
    
    public function GetInsert($table,$vaule_table,$vales)
    {
        $query = "INSERT INTO "+$table;
        if ($vaule_table != null)
        {
            $query += $vaule_table;
        }
        $query +="values";
        $query +=$vales;
        $this ->Get_query($query);
    }
    
    public function GetUpdate($table,$values,$where)
    {
        $query = "update from "+ $table+ " set";
        $query +=$values;
        $query += "where "+ $where;
        $this ->Get_query($query);
    }
    
    public function GetDelete($table,$where)
    {
        $query = "DELETE from "+$table;
        $query += "where "+$where;
        $this ->Get_query($query);
        
    }
}

?>