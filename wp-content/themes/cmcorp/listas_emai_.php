<?php

   
    require_once("conexao.php");
    $conexao = new Conexao;
    
    
    $nome = $_POST["name"];
	$mail = $_POST["email"];
 	   
    // extrai os dados do post
 extract($_POST);
   
   
      $sql = "INSERT INTO contato_email(nome,email,telefone) values(:nome,:email,:telefone)";
      //$sql = "INSERT INTO contato_email(nome,email) values(:name,:email)";	
      $stmt=$conexao->getConnection()->prepare($sql);
      $stmt->bindValue(":name",$nome);
      $stmt->bindValue(":email",$email);
      //$stmt->bindValue(":telefone",$this->cpf);      
      $stmt->execute();



// imprime os dados do post
 //echo "Nomes: $nome, Email: $mail";
 
 
 
  
 
 
?>