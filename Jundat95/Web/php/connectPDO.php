<?php
/**
 * Created by PhpStorm.
 * User: ngodo
 * Date: 17/11/2015
 * Time: 2:37 PM
 */
    class Connect_pdo
    {
        protected $servername = "localhost";
        protected $username = "username";
        protected $password = "password";
        protected $dbname = "services";


        public function __construct($servername, $password, $username, $dbname)
        {
            try
            {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                foreach($conn->query('SELECT * from FOO') as $row) {
                    print_r($row);
                }
                $conn = null;
            }
            catch(PDOException $ex)
            {

            }

        }

    }