
<?php

  require_once("conexao.php");
  $conexao = new Conexao;
     

/*cadastrando formulario newsletter*/

    $tc_nome = $_POST['tc_nome'];
    $tc_telefone = $_POST['tc_telefone'];
    $tc_email = $_POST['tc_email'];
    $tc_msg = $_POST['tc_msg'];     
    

  try{
   
     //$sql = "INSERT INTO contato_email(motivo,nome) values('$motivo','$nome')";
     $sql_newsletter = "INSERT INTO formulario_trabalheconosco(nome,telefone,email,mensagem,data) values(:tc_nome,:tc_telefone,:tc_email,:tc_msg,NOW())";	
     //$sql = "INSERT INTO contact_form(nome) values(:contato_nome)";
     $stmt_newsletter=$conexao->getConnection()->prepare($sql_newsletter);
     $stmt_newsletter->bindValue(":tc_nome",$tc_nome);
     $stmt_newsletter->bindValue(":tc_telefone",$tc_telefone);
     $stmt_newsletter->bindValue(":tc_email",$tc_email);
     $stmt_newsletter->bindValue(":tc_msg",$tc_msg);
     $stmt_newsletter->execute();
     
   }
   catch(PDOException $e)
    {
    echo  $e->getMessage();
    }

// imprime os dados do post
 /*echo "Nome: $tc_nome";
 echo 'teste';*/
?>