<?php

//defina aqui as configura��es do seu banco de dados;

class Database
{   
    protected $host     = "localhost"; 
    protected $user     = "root";
    protected $pass     = "vertrigo";
    protected $database = "login_system";      
    protected $dsn;
    
    function __construct() {
        $this->dsn = "mysql:host=" . $this->host . ";dbname=" . $this->database;

    } 
}

