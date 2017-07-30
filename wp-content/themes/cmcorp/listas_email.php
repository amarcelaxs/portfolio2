<?php

  
  
    require_once("ErrorHandler.php");
    require_once("conexao.php");
    $conexao = new Conexao;
    
 
    
    $nome = $_POST["name"];
	$mail = $_POST["email"];
 	   
    // extrai os dados do post
 extract($_POST);
   try{
   
     //$sql = "INSERT INTO contato_email(nome,email) values('$nome','$email')";
     $sql = "INSERT INTO contato_email(nome,email) values(:name,:email)";	
     $stmt=$conexao->getConnection()->prepare($sql);
     $stmt->bindValue(":name",$nome);
     $stmt->bindValue(":email",$mail);
    // $stmt->bindValue(":telefone",$this->cpf);      
      $stmt->execute();
     
     
   }
   catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

// imprime os dados do post
 //echo "Nomes: $nome, Email: $mail";

 
?>