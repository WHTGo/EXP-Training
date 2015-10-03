<?php
class Action_db_Model extends model
{
    public function  __construct()
    {
        parent::__construct();
        $this->db = $this->load->db->Mysqli();
    }
    
    public function cate_get_list($start,$limit){
       $sql ='select * from ftuts_category  ORDER BY Cate_id DESC LIMIT '.$start.','.$limit.'  ';
       return $this->db->db_select_list($sql);
    }
    public function cate_count_list(){
        return $this->db->db_count('SELECT COUNT(Cate_id) as countname FROM ftuts_category','countname');
    }
    public function cate_add($data = array()){
        return $this->db->db_insert('ftuts_category', $data);
    }
    
     function cate_delete($id){
        return  $this->db->db_delete_by_id('ftuts_category',"Cate_id=".(int)$id);
        
    }
     
    public function get_query($id)
    {
        $sql = "delete from ftuts_category where  Cate_id=".$id;
        return $this->db->Get_query($sql);
    }
    
    public function cate_edit($cate_id){
        return $this->db->db_select_row('SELECT * FROM ftuts_category WHERE  Cate_id = '.(int)$cate_id);
         
    }
    // lay du lieu de so sanh voi bien title
    public function cate_exit_add_title($title){
       $count= $this->db->db_count('SELECT COUNT(Cate_id) as countname FROM ftuts_category WHERE Cate_title = \''.mysql_escape_string($title) .'\'','countname');
        return ($count >0)?true :FALSE;
    }
    
    function cate_exit_add_slug($slug){
       $slugs= $this->db->db_count('SELECT COUNT(Cate_slug) as countname FROM ftuts_category WHERE Cate_title = \''.  mysql_escape_string($slug).'\'','countname');
       echo $slugs;
        return ($slugs >0)?true :FALSE;
    }
    
    // lay du lieu de so sanh update voi bien title
    public function cate_exit_update_title($title,$cat_id){
       $count= $this->db->db_count('SELECT COUNT(Cate_id) as countname FROM ftuts_category WHERE Cate_title = \''.mysql_escape_string($title) .'\' and Cate_id <>'.(int)$cat_id.' ','countname');
        return ($count >0)?true :FALSE;
    }
    
    public function cate_exit_update_slug($slug,$cat_id){
       $count= $this->db->db_count('SELECT COUNT(Cate_id) as countname FROM ftuts_category WHERE Cate_slug = \''.mysql_escape_string($slug) .'\' and Cate_id <>'.(int)$cat_id.' ','countname');
        return ($count >0)?true :FALSE;
    }

    // update du lieu moi
    public function update_category($idVal, $data){
        return $this->db->db_update('ftuts_category', "'Cate_id'=$idVal", $data);
    }
}