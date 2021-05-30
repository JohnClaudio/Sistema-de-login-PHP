<?php


class UserModel{
    
    private $pdo;
    
    public function __construct(Conexao $pdo){
      $this->pdo = $pdo->connect();
    }
    
    public function mostrarUsuarios(){
    
     try{
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
    
    public function cadastrarUsuario(Usuario $usuario){
          
        $password = password_hash($usuario->getSenha(),PASSWORD_DEFAULT);
        
        try{
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
            $emailExiste = $stm->rowCount(); 
            
            if($emailExiste>=1)
            {
                return true;
            }
            else{
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
            $stm = $this->pdo->prepare('select (email_user,senha) from usuario where email_user = :email and senha = :senha');
            $stm->bindValue(':email', $usuario->getEmail());
            $stm->bindValue(':senha', $usuario->getSenha());
            $stm->execute();
            $LOGIN_EFETUADO = $stm->rowCount();
            
            if($LOGIN_EFETUADO>=1)
            {
                return true;
            }
            else{
                return false;
            }
            
        }
        catch(PDOException $error)
        {
            echo $error->getMessage();
            
        }
    }
         
}
