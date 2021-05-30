<?php
require_once './backend/tools.php'; //requires das classes 

        //ESTRUTURA DA PÁGINA
        montar_layout("header");
        montar_conteudo("cadastro"); //formulário
        montar_layout("footer");
                   
   
   if(isset($_POST['cadastro'])) { 
    
         //SANITIZAÇÃO
         $email  = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
         $nome   = filter_var($_POST['nome'], FILTER_SANITIZE_STRING);
         $senha  = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
                  
         if ($email != null and $nome != null and $senha != null){      
             
         $usuario = new Usuario();
         $userModel = new Usermodel($pdo= new Conexao());
                
         //ADICIONANDO OS DADOS NO OBJETO USUARIO
         $usuario->setEmail($email);
         $usuario->setNome($nome);
         $usuario->setSenha($senha);             
         $EMAIL_EXISTENTE = $userModel->verificarEmail($email);

         //VALIDANDO CADASTRO
         if($EMAIL_EXISTENTE == TRUE)
         { 
             $_SESSION['EMAIL_EXISTENTE'] = TRUE;
         }        
         elseif($EMAIL_EXISTENTE == FALSE)
         {
             
           if($userModel->cadastrarUsuario($usuario) == TRUE)
           {
              $_SESSION['CADASTRO_CONCLUIDO'] = TRUE;
                              
           }
                   
         }        
       unset($_POST['cadastro']);
       }
        
       header('refresh:0');
    }


?>

