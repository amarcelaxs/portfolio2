
<?php

  require_once("conexao.php");
  $conexao = new Conexao;
     

/*cadastrando formulario newsletter*/

$news_nome = $_POST['n_input_nome'];
$news_email = $_POST['n_input_email'];


    

  try{
   
     //$sql = "INSERT INTO contato_email(motivo,nome) values('$motivo','$nome')";
     $sql_news = "INSERT INTO formulario_newsletter(nome,email,data) values(:n_input_nome,:n_input_email,NOW())";
    // $sql_sp = "INSERT INTO formulario_sejaparceiro(descricao_geral) values(:descricaogeral)";	
     //$sql = "INSERT INTO contact_form(nome) values(:contato_nome)";
     $stmt_news=$conexao->getConnection()->prepare($sql_news);
     $stmt_news->bindValue(":n_input_nome",$news_nome, PDO::PARAM_STR);     
     $stmt_news->bindValue(":n_input_email",$news_email, PDO::PARAM_STR);

     $stmt_news->execute();
     
   }
   catch(PDOException $e)
    {
    echo  $e->getMessage();
    }

// imprime os dados do post
 //echo $news_nome.'<br>'.$news_email;
?>