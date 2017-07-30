<?php
/**
 * Template Name: List Emails
 */
//require_once('dados_cliente.php');
require_once("conexao.php");
  $conexao = new Conexao;
  $pdo = new PDO("mysql:host=localhost;dbname=listas_email","root","");
  
  $arquivo = 'lista_de_email.txt'; 
  header("Content-Description: File Transfer");
  //header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
  //header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
  //header ("Cache-Control: no-cache, must-revalidate");
 // header ("Pragma: no-cache");
  //header ("Content-type: application/x-msexcel");Content-type: text/csv
  //header ("Content-type: text/csv; charset=UTF-8");
  header ("Content-type: plain/text; charset=UTF-8");
  header ("Content-Disposition: attachment; filename=$arquivo" );
  header ("Content-Description: PHP Generated Data" );
  

try{
   exec("SET CHARACTER SET utf8"); 
    /*
for($i=0;$i<1;$i++){   
      $html[$i] = "";
      $html[$i] .= "<table>";
      $html[$i] .= "<tr>";
      $html[$i] .= "<td><b>Nome</b></td>";
      $html[$i] .= "<td><b>email</b></td>";
      $html[$i] .= "</tr>";
      $html[$i] .= "</table>";
 
  }*/
     /* dados de todos os nomes e emails*/
    $sql_dados = "SELECT contact_form.nome,contact_form.email FROM contact_form 
    UNION SELECT contato_email.nome,contato_email.email FROM contato_email 
    UNION SELECT formulario_newsletter.nome, formulario_newsletter.email FROM formulario_newsletter 
    UNION SELECT formulario_sejaparceiro.nome,formulario_sejaparceiro.email FROM formulario_sejaparceiro 
    UNION SELECT formulario_trabalheconosco.nome,formulario_trabalheconosco.email FROM formulario_trabalheconosco";
    $resultado_dados = $pdo->query($sql_dados);    
    $contar =  $resultado_dados->fetch();

 /*       
 $i = 0;    
  while($ret =  $resultado_dados->fetch()){
   $retorno_nome = $ret['nome'];
   $retorno_email = $ret['email'];
    $html[$i] = "<table>";
    $html[$i] .= "<tr>";    
    $html[$i] .= "<td>$retorno_nome</td>";
    $html[$i] .= "<td>$retorno_email</td>";
    $html[$i] .= "</tr>";
    $html[$i] .= "</table>";
    $i++;
  } 
  
 /*
  $arquivo = 'lista_de_email.xls';
  header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
  header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
  header ("Cache-Control: no-cache, must-revalidate");
  header ("Pragma: no-cache");
  header ("Content-type: application/x-msexcel");
  header ("Content-Disposition: attachment; filename={$arquivo}" );
  header ("Content-Description: PHP Generated Data" );
*/
/*
for($i=0;$i<=$contar;$i++){    
 //for($i=0;$i<=count($contar);$i++){
    echo $html[$i];
  }*/



  if($resultado_dados !== false)
  {
      // Vamos imprimir os nossos resultados
      //echo '<p>Dados de todos os formularios:</p>';
      $planilha_dados = '';
      //$planilha_dados .= "<table border=1><tr><td><b>Nome</b></td><td><b>Email</b></td></tr>";  
       echo '"Email Address","First Name"'."\n";
      foreach($resultado_dados as $row) {
       echo  ' "'.$row['email'].'","'.$row['nome'].'"'."\n";
       //echo $row['email']."\n";
       //"'".$row['nome'].     
         /* $planilha_dados .="<tr>
          <td>".$row['nome']."</td>
          <td>".$row['email']."</td>
          </tr> ";*/ 
    
    
          
      }

      // $planilha_dados .="</table>";
      //  echo $planilha_dados;
  }
  
   
}
catch(PDOException $e)
{
  echo  $e->getMessage();
   // echo "This exception severity is: " . $e->getSeverity();
}
  
 $pdo = null;
?>
  
  
  