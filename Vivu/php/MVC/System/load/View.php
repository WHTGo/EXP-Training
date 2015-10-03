<?php

class View
{
    private $__content = array();
    
    public function load($view, $data = array()) 
    {
        ob_start();
        if(is_array($data))
        {
            extract($data);   
        }
        require WEB. '/view/' . $view . '.php';
        $content = ob_get_contents();
        ob_end_clean();
        $this->__content[] = $content;
    }
    
     public function Show()
     {
        foreach ($this->__content as $html) {
            echo $html;
        }
     }
}

?>