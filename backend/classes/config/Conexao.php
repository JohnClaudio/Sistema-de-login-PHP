<?php

require_once('Database.php');

class Conexao extends Database {
    
    private $pdo;
    
    public function connect() 
    {
        
        try 
        {
            $this->pdo = new PDO($this->dsn, $this->user, $this->pass);
            return $this->pdo;  

        } 
     
        catch (PDOException $error) 
        {
            echo "<br>" . $error->getMessage();
            return $error->getMessage();
        }
        
    }

    public function close()
    {
        return $this->pdo = null;
    }
    
}

