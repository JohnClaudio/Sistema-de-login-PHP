<?php 
require_once './backend/tools.php'; //requires das classes

   //ESTRUTURA DA PÁGINA
    montar_layout("header");
    montar_conteudo("login"); //formulário
    montar_layout("footer");
        
    if(isset($_POST['btnLogin'])) 
    {
                
        if (!empty($_POST['email']) and !empty($_POST['password']))
        {     
            //SANITIZAÇÃO
            $email  = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $senha  = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
            
            //INSTANCIANDO CLASSES
            $usuario = new Usuario();
            $userModel = new Usermodel($pdo= new Conexao());
            
            //ADICIONANDO OS DADOS NO OBJETO USUARIO
            $usuario->setEmail($email);
            $usuario->setSenha($senha);   
            $LOGIN_STATUS = $userModel->verificarLogin($usuario);
           
            //VALIDANDO CADASTRO
            if($LOGIN_STATUS == TRUE)
            {
                $_SESSION['nome'] = $userModel->NomeUsuario($usuario->getEmail());
                $_SESSION['LOGIN_STATUS'] = TRUE;
                header('location: painel.php');
            }
            elseif($LOGIN_STATUS == FALSE)
            {           
                $_SESSION['FALHA_LOGIN'] = TRUE;         
            }
       
       }
        
       header('refresh:0');
    }




