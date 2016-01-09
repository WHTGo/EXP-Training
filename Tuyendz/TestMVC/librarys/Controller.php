<?php

    class Controller
    {
        function __construct()
        {
            // echo 'Ham Main !!</br>';
            $this->view = new View();
        }

        public function loadModel($name)
        {
        	$path = 'application/models/'.$name.'_model.php';

			if(file_exists($path))
            {
            	require 'application/models/'.$name.'_model.php';

            	$modelName = $name.'_model';
            	$this->{$name} = new $modelName();	
            }
        }
    }