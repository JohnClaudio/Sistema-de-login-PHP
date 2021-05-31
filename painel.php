<?php
require_once './backend/tools.php'; //requires das classes

//ESTRUTURA DA PÁGINA
montar_layout("header");


if(isset($_SESSION['LOGIN_STATUS'])== FALSE) 
 {
    montar_conteudo("auth");     
 }

elseif (isset($_SESSION['LOGIN_STATUS'])== TRUE)
 {
    montar_conteudo("painel");  
 }

montar_layout("footer");


if(isset($_POST['logout'])){
    session_destroy();
    header('location:index.php');
}