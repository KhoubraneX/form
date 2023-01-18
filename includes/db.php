<?php 
    class DB {
        private $host = "localhost";
        private $db_name = "website";
        private $user_name = "root";
        private $password = "";
        private $connect;

        public function __construct() {
            try {
                $this->connect = mysqli_connect($this->host , $this->user_name , $this->password , $this->db_name);
            }catch (Exception $e) {
                echo "error connect db :" . $e->getMessage();
            }
        }

        public function query($sql) {
            return mysqli_query($this->connect , $sql);
        }

        public function close() {
            mysqli_close($this->connect);
        }
    }
?>