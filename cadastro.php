<?php
require_once './backend/tools.php'; //requires das classes 

      //ESTRUTURA DA PÁGINA
      montar_layout("header");
      montar_conteudo("cadastro"); //formulário
      montar_layout("footer");
                     
   if(isset($_POST['cadastro'])) { 
       
       if (!empty($_POST['email']) and !empty($_POST['nome']) and !empty($_POST['password']))
       {      
    
             //SANITIZAÇÃO
             $email  = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
             $nome   = filter_var($_POST['nome'], FILTER_SANITIZE_STRING);
             $senha  = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
                      
             //INSTANCIANDO CLASSES
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
             
             elseif($EMAIL_EXISTENTE == FALSE) //SE EMAIL INSERIDO NÃO EXISTIR NA BASE DE DADOS
             {
                 
               if($userModel->cadastrarUsuario($usuario) == TRUE) //SE CADASTRO FOR REALIZADO COM SUCESSO RETORNA TRUE
               {
                  $_SESSION['CADASTRO_CONCLUIDO'] = TRUE;
                                  
               }
                   
            }        
            unset($_POST['cadastro']);
      }
        
       header('refresh:0');
    }


?>

