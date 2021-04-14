<?php
 
 class conexion
 {
     public $servername = "localhost";
     public $username = "root";
     public $password = "";
     public $dbname = "examen";
     public $conn;

     public function __construct() {
         try {
             $this->conn = new PDO("mysql:host={$this->servername};dbname={$this->dbname}", $this->username, $this->password);                
             $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);                   
             //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);                   
         } catch(PDOException $e) {
             echo "Connection failed: " . $e->getMessage();
         }                
     }
 }  
?>