<?php

include("conexao.php");




class User {

   public $nome;
   public $email;
   //public $telefone;
 
 
   public function inserir() {
      //$sql = "INSERT INTO contato_email(nome,email,telefone) values(:nome,:email,:telefone)";
      $sql = "INSERT INTO contato_email(nome,email) values(:nome,:email)";	
      $stmt=getConnection()->prepare($sql);
      $stmt->bindValue(":nome",$this->nome);
      $stmt->bindValue(":email",$this->email);
      //$stmt->bindValue(":telefone",$this->cpf);      
      $stmt->execute();
   }

   public function isDuplicado() {
      $sql = "SELECT COUNT(*) qtd FROM contato_email WHERE email = :email";  
      $stmt=getConnection()->prepare($sql);
      $stmt->bindValue(":email",$this->email);
      $stmt->execute();

      $qtd = $stmt->fetch()['qtd'];

      return $qtd != 0;
   }

 
  /*   public function listar() {
      $sql = "SELECT * FROM contato_email";  
      $stmt=getConnection()->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll(PDO::FETCH_ASSOC);
   }
public function autenticar() {
      $sql = "SELECT * FROM contato_email WHERE login = :login AND senha = :senha";  
      $stmt=getConnection()->prepare($sql);
      $stmt->bindValue(":login",$this->login);
      $stmt->bindValue(":senha",$this->senha);
      $stmt->execute();

      return $stmt->fetchAll(PDO::FETCH_ASSOC);
   }*/
}

?>