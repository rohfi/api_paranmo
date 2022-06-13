<?php
class Database{
    // public ip cloud sql
    private $db_host = '34.69.122.100';
    private $db_name = 'paranmo';
    private $db_username = 'root';
    private $db_password = 'paranmo1234';
    
    public function dbConnection(){
        try{
            $conn = new PDO('mysql:host='.$this->db_host.';dbname='.$this->db_name,$this->db_username,$this->db_password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }
        catch(PDOException $e){
            echo "Connection error ".$e->getMessage(); 
            exit;
        }
          
    }
}
