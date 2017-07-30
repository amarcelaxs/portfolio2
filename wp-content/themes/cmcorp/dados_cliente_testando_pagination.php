<?php

 /**
 * Template Name: Insert Emails
 */
get_header();

echo '<div id="bc"></div>';
  require_once("conexao.php");
 
  $conexao = new Conexao;
  $pdo = new PDO("mysql:host=localhost;dbname=listas_email","root","");
  
 echo '<div class="container dados_clientes" style="margin-top:20px;margin-bottom:20px;">';

try{
   exec("SET CHARACTER SET utf8");
$start=0;
$limit=2;
if(isset ($_GET['id']))
{
  $id=$GET['id'];
  $start=($id-1)*$limit;
}
     /* dados de todos os nomes e emails*/
    $sql_dados = "SELECT contact_form.nome,contact_form.email FROM contact_form 
    UNION SELECT contato_email.nome,contato_email.email FROM contato_email 
    UNION SELECT formulario_newsletter.nome, formulario_newsletter.email FROM formulario_newsletter 
    UNION SELECT formulario_sejaparceiro.nome,formulario_sejaparceiro.email FROM formulario_sejaparceiro 
    UNION SELECT formulario_trabalheconosco.nome,formulario_trabalheconosco.email FROM formulario_trabalheconosco  LIMIT $start, $limit";
    $resultado_dados = $pdo->query($sql_dados);    
    //$contar =  $resultado_dados->fetch();
   
echo '<div class="col-xs-6">';


  echo'<a href="../dados" target="_blank" style="background-color:#337ab7;color:#D4A340;padding:5px;">Exportar</a><br>';
      if($resultado_dados !== false)
  {
      // Vamos imprimir os nossos resultados
      echo '<p style="margin-top:20px;">Dados de todos os formularios:</p>';
      $planilha_dados = '';
      $planilha_dados .= "<table border=1><tr><td><b>Nome</b></td><td><b>Email</b></td></tr>";  
      foreach($resultado_dados as $row) {
      //  echo $row['nome'].' - '.$row['email'].'<br/>';     
          $planilha_dados .="<tr>
          <td>".$row['nome']."</td>
          <td>".$row['email']."</td>
          </tr> ";
      }
        $planilha_dados .="</table>";
        echo $planilha_dados;         
  }
  echo '</div>';
   
      echo '</div>';
}
catch(PDOException $e)
{
  echo  $e->getMessage();
   // echo "This exception severity is: " . $e->getSeverity();
}

 $pdo = null;
 
 
echo '</div>';
?>


   <!--script src="<//?php echo esc_url( get_template_directory_uri() ); ?>/js/dados_clientes.js"></script>
   
   
   <?php get_footer(); ?>


 