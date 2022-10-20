<?php
    class Connection
    {
        private $HOST = 'localhost';
        private $DBNAME = '';
        private $USERNAME = 'root';
        private $PASSWORD = '';
        private $CONN;

        public function __construct()
        {
            try {
                $this->CONN = new PDO("mysql:host=$HOST;dbname=$DBNAME",$USERNAME,$PASSWORD);
                $this->CONN->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $error) {
                echo "ERROR: ".$error->getMessege();
            }
        }
        public function getConn()
        {
            return $CONN;
        }
    }
?>