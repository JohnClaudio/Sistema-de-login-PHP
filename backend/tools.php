<?php
session_start();

require_once './backend/classes/model/Usermodel.php';
require_once './backend/classes/config/Conexao.php';
require_once './backend/classes/user/Usuario.php';

function montar_conteudo($value){
    
    return require_once "./view/paginas/{$value}.php";
}

function montar_layout($value){
        
    return require_once "./view/layout/{$value}.php";
}