<?php

    require_once("conexao.php");
    $conexao = new Conexao;
    
    $motivo = $_POST['motivo'];
    $nome = $_POST['contato_nome'];
    $empresa = $_POST['contato_empresa'];
	$cidade = $_POST['contato_cidade'];
    $uf = $_POST['contato_uf'];
    $email = $_POST['contato_email'];
    $telefone = $_POST['contato_telefone'];
    $mensagem = $_POST['contato_msg'];     
    
    /*
    $motivo = 'anateste';
    $nome = 'ana';
    $empresa = 'cm';
	$cidade = 'rio de janeiro';
    $uf ='rj';
    $email = 'adadawe@teste.com.br';
    $telefone ='21321651119819';
    $mensagem ='blabla';*/
        
        
    // extrai os dados do post
    
    //echo do_shortcode('[cfdb-table form="Contato"  role="anyone"  show="field1,field2,field3]');

if($motivo ==''){
$motivo = '...';
}
    
 extract($_POST);
   try{
   
     //$sql = "INSERT INTO contato_email(motivo,nome) values('$motivo','$nome')";
     $sql = "INSERT INTO formulario_contato(motivo,nome,empresa,cidade,uf,email,telefone,mensagem,data) values(:motivo,:contato_nome,:contato_empresa,:contato_cidade,:contato_uf,:contato_email,:contato_telefone,:contato_msg,NOW())";	
     //$sql = "INSERT INTO contact_form(nome) values(:contato_nome)";
     $stmt=$conexao->getConnection()->prepare($sql);
     $stmt->bindValue(":motivo",$motivo);
     $stmt->bindValue(":contato_nome",$nome);
     $stmt->bindValue(":contato_empresa",$empresa);
     $stmt->bindValue(":contato_cidade",$cidade);
     $stmt->bindValue(":contato_uf",$uf);
     $stmt->bindValue(":contato_email",$email);
     $stmt->bindValue(":contato_telefone",$telefone);
     $stmt->bindValue(":contato_msg",$mensagem);     
    // $stmt->bindValue(":telefone",$this->cpf);    
      $stmt->execute();
     
   }
   catch(PDOException $e)
    {
    echo $e->getMessage();
    }

// imprime os dados do post
 echo "Nome: $nome";
 echo 'teste';
 


?>

