<?php
require_once './backend/classes/model/Usermodel.php';
require_once './backend/classes/config/Conexao.php';

$user = new Usermodel($pdo= new Conexao());





//var_dump($user->cadastrarUsuario('email@email', 'rapaz', 'rapaz'));

$teste = "Minha@Senha@!$#@1232154";

var_dump($teste);

echo filter_var($teste, FILTER_SANITIZE_STRING);


var_dump($user->verificarEmail('Kidizinhu77@gmail.com'));
var_dump($teste);

//var_dump(password_verify($senha, $hash));
//var_dump($user->mostrarUsuarios());*/

//var_dump($user->verificarEmail('joao'));