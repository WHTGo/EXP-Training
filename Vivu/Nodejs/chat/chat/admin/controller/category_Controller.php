<?php
class Category_Controller extends Base_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->helper->load('Exten');
        $this->model->load('action_db');
        $this->Load_Header();
    }
    
    
    
    public function indexAction()
    {
        
        $this->page_cateAction();
        
    }
    
    public function page_cateAction()
    {
        $cr_page = input_get('page');
        
        $all_page = $this->model->action_db->cate_count_list();
        $page = paging($all_page, 5, $cr_page, 'admin.php?c=category&a=page_cate&page={page}');
        $cate = $this->model->action_db->cate_get_list($page['start'], $page['limit']);
        $datasend =array($cate,$page);
        $this->view->load('cate',$datasend);
        $this->Load_Footer();
        
    }
    
     public function page_editAction()
    {
        
    }
    
    public function addAction()
    {
        $error = array();
        $data = array(
            'Cate_title' => input_post('Cate_Title'),
            'Cate_slug' => input_post('Cate_slug'),
            'Cate_keywords' => input_post('Cate_keywords'),
            'Cate_description' => input_post('Cate_description'),
            'Cate_Robots' => input_post('Cate_Robot'),
        );
        
        if (validate_empty($data['Cate_title'])) {
            $error['Cate_title'] = 'vui long khong de trong tuong nay';
        } else if ($this->model->action_db->cate_exit_add_title($data['Cate_title'])) {
            $error['Cate_title'] = 'title nay da ton tai';
        }


        if (validate_slug($data['Cate_slug'])) {
            $error['Cate_slug'] = 'vui long nhap dung dinh dang';
        } else if ($this->model->action_db->cate_exit_add_slug($data['Cate_slug'])) {
            $error['Cate_slug'] = 'title nay da ton tai';
        }
        
         // kiem tra insert

        if (empty($error)) {
            $flag = $this->model->action_db->cate_add($data);

            if ($flag) {
                echo '<script language="javascript">';
                echo 'alert("ban da them thanh cong");';
                echo 'window.location="admin.php?c=category"';
                echo '</script>';
            } else {
                echo '<script language="javascript">';
                echo 'alert("da xay ra loi ");';
                echo 'window.location="admin.php?c=category"';
                echo '</script>';
            }
        }
        $this->view->load('sidebar');
        $datasend=array($data,$error);
        $this->view->load('add',$datasend);
    }
    
    public function editAction()
    {
        $error = array();
        
        $cid = input_get('cid');
        
        echo $cid;
        $data = $this->model->action_db->cate_edit($cid);
        var_dump($data);
        $data1 = array(
            'Cate_title' => input_post('Cate_title'),
            'Cate_slug' => input_post('Cate_slug'),
            'Cate_description' => input_post('Cate_description'),
            'Cate_keywords' => input_post('Cate_keywords'),
            'Cate_Robots' => input_post('Cate_Robot')
        );
        
        if (validate_empty($data1['Cate_title'])) {
            $error['Cate_title'] = 'vui long khong de trong tuong nay';
        } else if ($this->model->action_db->cate_exit_update_title($data1['Cate_title'], $cid)) {
            $error['Cate_title'] = 'title nay da ton tai';
        }
        
        
        if (validate_empty($data1['Cate_slug'])) {
            $error['Cate_slug'] = 'khong de trong truong nay';
        } else if ($this->model->action_db->cate_exit_update_slug($data1['Cate_slug'], $cid)) {
            $error['Cate_slug'] = 'slug da ton tai';
        }
        
        if (empty($error)) 
        {
            $flag = $this->model->action_db->update_category($cid, $data1);
            if ($flag) 
            {
                echo '<script language="javascript">';
                echo 'alert("ban da update thanh cong");';
                echo 'window.location="admin.php?c=category"';
                echo '</script>';
            }
        }
        $this->view->load('sidebar');
        
        $datasend=array($data,$error);
        //var_dump($datasend);
        $this->view->load('edit',$datasend);
    }
    
    public function deleteAction()
    {
        $id = input_get('id');
        if ($id) {
            
            if($this->model->action_db->cate_delete($id))
            {
                 echo '<script language="javascript">';
                 echo 'alert("ban da xoa thanh cong");';
                 echo 'window.location="admin.php?c=category"';
                 echo '</script>';
                 //  header('location:index.php?action=cate_list');
            }
            else
            {
                 echo '<script language="javascript">';
                 echo 'alert("da xay ra loi");';
                 echo 'window.location="admin.php?c=category"';
                 echo '</script>';
            }
            
        }
    }
    
}

?>