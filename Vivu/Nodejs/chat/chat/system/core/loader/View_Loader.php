<?php

class View_Loader {

    private $__content = array();

    public function load($view, $data = array()) {
        //chuyen mang du lieu thanh tung bien

        extract($data);

        // chuyen noi dung $view thay vi in ra bang cach dung | bao cho php biet chung ta dang load du lieu khong can in ra
        ob_start();
        require PATH_APPLICATION . '/view/' . $view . '.php';

        $content = ob_get_contents();
        ob_end_clean();

        // gan noi dung content vao danh sach view da load

        $this->__content[] = $content;
    }

// show noi dung
    public function Show() {
        foreach ($this->__content as $html) {
            echo $html;
        }
    }

}

?>