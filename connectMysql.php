<?php

    class DataBase{
        public $host;
        public $db_user;
        public $db_password;
        public $db_name;

        function __construct($host1, $db_user1, $db_password1, $db_name1) {
            $this->host = $host1;
            $this->db_user = $db_user1;
            $this->db_password = $db_password1;
            $this->db_name = $db_name1;
          }
    }
?>