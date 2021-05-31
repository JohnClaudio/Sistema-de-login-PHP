<?php

class UserModel{
    
    private $pdo;
    
    public function __construct(Conexao $pdo)
    {
      $this->pdo = $pdo->connect();
    }
    
    public function mostrarUsuarios()
    {   
     
     try
     {
             $stm = $this->pdo->prepare('select * from usuario');
             $stm->execute();
             $result = $stm->fetchAll(PDO::FETCH_ASSOC);   
             return $result;
        
      }
      catch(PDOException $ex)
      {
             echo $ex->getMessage();
      }     
         
    }
    
    public function NomeUsuario($email)
    {
        
        try
        {
            $stm = $this->pdo->prepare('select nome_user from usuario where email_user = :email');
            $stm->bindParam(':email', $email);
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);
            return $result[0]['nome_user'];
            
        }
        catch(PDOException $ex)
        {
            echo $ex->getMessage();
        }
        
    }
    
    public function cadastrarUsuario(Usuario $usuario)
    {           
         $password = password_hash($usuario->getSenha(),PASSWORD_DEFAULT); //HASH    
         
         try
         {
                $stm = $this->pdo->prepare('insert into usuario values(default, :nome, :email, :senha)');
                $stm->bindValue(':nome',   $usuario->getNome());
                $stm->bindValue(':email',  $usuario->getEmail());
                $stm->bindValue(':senha',  $password);           
                return $stm->execute();             
         }    
         catch(PDOException $ex)
         {
         echo $ex->getMessage();
         }
     
    }
    
    public function verificarEmail($email)
    {
        
         try
         {             
                $stm = $this->pdo->prepare('select email_user from usuario where email_user = :email');
                $stm->bindParam(':email', $email);
                $stm->execute();
                $emailExiste = $stm->rowCount(); //CAPTURA QTD DE LINHAS RETORNADAS DA CONSULTA
                
                if($emailExiste>=1)
                {
                    return true;
                }
                else
                {
                    return false;
                }
                               
        }       
        catch(PDOException $error)
        {
        echo $error->getMessage();                   
        }
        
    }
    
    public function verificarLogin(Usuario $usuario)
    {
        try
        {            
            if($result=UserModel::verificarEmail($usuario->getEmail())== 1) //VERIFICA SE EMAIL EXISTE NO BANCO
            {
                
                $stm = $this->pdo->prepare('select senha from usuario where email_user = :email');
                $stm->bindValue(':email', $usuario->getEmail());          
                $stm->execute();
                $resultado = $stm->fetchAll(PDO::FETCH_ASSOC);            
                $LOGIN_REALIZADO = password_verify($usuario->getSenha(), $resultado[0]['senha']);   //RETORNA TRUE SE HASH/SENHA FOR VERDADEIRO      
                              
                if($LOGIN_REALIZADO == true)
                {
                    return true;
                }
    
            }
            
        }
        catch(PDOException $error)
        {
              echo $error->getMessage();           
        }
        
        return false; // RETORNA FALSE SE EMAIL NAO EXISTIR OU SE SENHA FOR INVALIDA
    }
         
}
