<?php

class Config_Loader {

    protected $config = array();

    public function load($config) {
        if (file_exists(PATH_APPLICATION . '/config/' . $config . '.php')) {
            if (!empty($config)) {
                $config = include_once PATH_APPLICATION . '/config/' . $config . '.php';
                foreach ($config as $key => $item) {
                    $this->config[$key] = $item;
                }
                return true;
            }
            return False;
        }
    }

    public function item($key, $defailt_val = '') {
        return isset($this->config) ? $this->config[$key] : $defailt_val;
    }

    public function set_item($key, $val) {
        $this->config[$key] = $val;
    }

}

?>
