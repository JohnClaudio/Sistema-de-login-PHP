<?php

class Usuario {
    
    private $nome;
    private $email;
    private $senha;
    
    public function setNome($nome) {
        $this->nome = $nome;
    }
    
    public function setEmail($email) {
        $this->nome = $email;
    }
    
    public function setSenha($senha) {
        $this->nome = $senha;
    }
    
    /*getters (retornos)*/
    
    public function getNome(){
        return $this->nome;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getSenha(){
        return $this->senha;
    }
    
}

/*
$usuario = new Usuario();

$usuario->setEmail("banana");
$usuario->setNome("meu nome");
$usuario->setSenha("minha senha");

echo $usuario->getNome();*/

