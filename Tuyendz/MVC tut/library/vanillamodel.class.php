<?php
/**
 * Created by PhpStorm.
 * User: TuyenGa
 * Date: 11/17/2015
 * Time: 8:54 AM
 */
    class VanillaModel extends SQLQuery
    {
        protected $_model;


        function __construct()
        {
            global $inflect;

            $this->connect(localhost3306,tuyenga,anhtuyen9x,quanlybanhang);
            $this->_limit = PAGINATE_LIMIT;
            $this->_model = get_class($this);
            $this->_table = strtolower($inflect->pluralize($this->_model));
            if(!isset($this->abstract))
            {
                $this->_describe();
            }
        }

        function __destruct()
        {

        }

    }