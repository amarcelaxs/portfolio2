
<?php

  require_once("conexao.php");
  $conexao = new Conexao;
     

/*cadastrando formulario newsletter*/

$sp_nomecontato = $_POST['sp_nomecontato'];
$sp_empresa = $_POST['sp_empresa'];
$sp_cidade  = $_POST['sp_cidade'];
$sp_telefone = $_POST['sp_telefone'];
$sp_email = $_POST['sp_email'];
//curriculo_parceiro
$sp_descricao_geral = $_POST['sp_descricao_geral'];
$sp_principais_capacidades = $_POST['sp_principais_capacidades'];
$sp_linha_atuacao = $_POST['sp_linha_atuacao'];
$sp_parceria = $_POST['sp_parceria'];


    

  try{
   
     //$sql = "INSERT INTO contato_email(motivo,nome) values('$motivo','$nome')";
     $sql_sp = "INSERT INTO formulario_sejaparceiro(nome,empresa,cidade,telefone,email,descricao_geral,principais_capacidades,linha_atuacao,parceria,data) values(:sp_nomecontato,:sp_empresa,:sp_cidade,:sp_telefone,:sp_email,:sp_descricao_geral,:sp_principais_capacidades,:sp_linha_atuacao,:sp_parceria,NOW())";
    // $sql_sp = "INSERT INTO formulario_sejaparceiro(descricao_geral) values(:descricaogeral)";	
     //$sql = "INSERT INTO contact_form(nome) values(:contato_nome)";
     $stmt_sp=$conexao->getConnection()->prepare($sql_sp);
     $stmt_sp->bindValue(":sp_nomecontato",$sp_nomecontato, PDO::PARAM_STR);     
     $stmt_sp->bindValue(":sp_empresa",$sp_empresa, PDO::PARAM_STR);
     $stmt_sp->bindValue(":sp_cidade",$sp_cidade, PDO::PARAM_STR);
     $stmt_sp->bindValue(":sp_telefone",$sp_telefone, PDO::PARAM_STR);
     $stmt_sp->bindValue(":sp_email",$sp_email, PDO::PARAM_STR);     
     $stmt_sp->bindValue(":sp_descricao_geral",$sp_descricao_geral, PDO::PARAM_STR);
     $stmt_sp->bindValue(":sp_principais_capacidades",$sp_principais_capacidades, PDO::PARAM_STR);
     $stmt_sp->bindValue(":sp_linha_atuacao",$sp_linha_atuacao, PDO::PARAM_STR);
     $stmt_sp->bindValue(":sp_parceria",$sp_parceria, PDO::PARAM_STR);     
     $stmt_sp->execute();
     
   }
   catch(PDOException $e)
    {
    echo  $e->getMessage();
    }

// imprime os dados do post
 //echo "data:".$sp_now;
//echo '<br>';
 //echo $sp_descricao_geral;
?>