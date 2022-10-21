<?php
  class Connection
  {
    private $SERVER = "localhost";
    private $DB_NAME = "meu_banco";
    private $USER = "marcos";
    private $PASS = "senha123";
    private $CONN;

    public function __construct()
    {
      try {
        $this->CONN = new PDO(
          "mysql:host=$this->SERVER;dbname=$this->DB_NAME",
          $this->USER,$this->PASS
        );
        $this->CONN->setAttribute(
          PDO::ATTR_ERRMODE,
          PDO::ERRMODE_EXCEPTION
        );
      } catch(PDOException $error) {
        echo "Erro: ".$error->getMessage();
      }
    }
    public function getInstance()
    {
      return $this->CONN;
    }
  }
?>