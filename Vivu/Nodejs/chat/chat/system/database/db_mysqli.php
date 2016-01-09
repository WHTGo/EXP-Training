<?php

class database
{
    private $conn = null;
    public $CFMysqli = array(
        'host'=>'localhost',
        'user'=>'root',
        'pass'=>'',
        'database'=>'chatmvc'
    );
    public function __construct()
    {
       
    }


    private function Connect()
    {
         try
        {
        	 $this->conn  = new mysqli($this->CFMysqli['host'],$this->CFMysqli['user'],$this->CFMysqli['pass'],$this->CFMysqli['database']);
             $this->conn->set_charset('utf8');
             if($this->conn->errno !== 0)
             {
                 die("Lỗi: Không thể kết nối tới cơ sở dữ liệu. Lỗi tại ".$connect->error." .");
             }
        }
        catch(Exception $e)
        {
        	  echo "Một exception vừa được throw: <b>".$e->getMessage()."</b> tại dòng ".$e->getLine()." trong file ".$e->getFile();
        }
    }
    
     private function Disconnect()
    {
        //$this->conn->free();
        $this->conn->Close();
    }
    
   
   
    
    public function Get_query($sql)
    {
        $this -> Connect();
        $table = $this->conn->query($sql);
        $this -> Disconnect();
        return $table;
    }
    
    public function db_select_list($sql) 
    {
        $result = $this->Get_query($sql);
        if (!$result) {
            die ('Lỗi truy vấn');
        }
        $list = array();
        while ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    
            $list[] = $rows;
        }
        return $list;
    }
    
    public function db_select_row($sql) 
    {
        $result = $this->Get_query($sql);
        if (!$result) {
            die ('Lỗi truy vấn');
        }
    
        $rows = mysqli_fetch_array($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        return $rows;
    }
    
    public function db_insert($table, $data = array()) 
    {
        $field ='';
        $value ='';
        foreach ($data as $key =>$val) {     
            $field .= $key.',';
            //$value .= "'".mysqli_escape_string($conn,$val)."'".',' ;
            if(is_string($val))
            {
                $value .='"'.$val.'",';
            }  else 
            {
                $value .= $val.',';
            }
           //$value .= "'".mysqli_escape_string($val)."'".',';
        }
        $sql = 'INSERT INTO ' .$table .'('.trim($field, ',').') VALUES('.trim($value, ',').')';
        //var_dump($sql);
        $result = $this->Get_query($sql);
        return $result;
    }
    
    public function db_update($table, $where ,$data = array()) 
    {
        $sql_tmp = '';
        foreach ($data as $key => $val) {
            $sql_tmp .= $key . '=' . '\'' . mysqli_escape_string($conn,$val) . '\',';
        }
        $sql = 'UPDATE '.$table.' SET ' . trim($sql_tmp, ',') . '  WHERE  ' . $where;
        $result = $this->Get_query($sql);
        return $result;
    }
   
    public function db_delete($table,$where) 
    {
        $sql = 'DELETE FROM  ' . $table . ' WHERE ' . $where;
        $result = $this->Get_query($sql);
        return $result;
    }
    
    public function db_count($sql,$countAS)
    {
        //var_dump($sql);
        $result = $this->Get_query($sql);
        //var_dump($result);
        if(!$result){
            die ('Lỗi truy vấn');
        }
        else{
            $row = mysqli_fetch_array($result,MYSQLI_NUM);
            if($row){
                mysqli_free_result($result);
                //var_dump($row[$countAS]);
                return $row[$countAS];
            }
        }
        
    }


}

?>