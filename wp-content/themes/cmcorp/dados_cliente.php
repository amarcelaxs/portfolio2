<?php

 /**
 * Template Name: Insert Emails
 */
get_header();

echo '<div id="bc"></div>';
  require_once("conexao.php");
 
  $conexao = new Conexao;
  $pdo = new PDO("mysql:host=localhost;dbname=listas_email","root","");
  
 echo '<div class="container dados_clientes" style="margin-top:20px;margin-bottom:20px;"> 
 <div class="todos_os_dados col-xs-2 no-padding">Todos os Formulários</div>
 <div class="form_contato col-xs-2">Formulário de Contato</div>
 <div class="form_newsletter col-xs-2">Newsletter</div>
 <div class="form_parceiros col-xs-2">Parceiros</div>
 <div class="form_trabalhe_conosco col-xs-2">Trabalhe Conosco</div>
 <div class="form_chat col-xs-2">Chat</div>
 </div>';
 
 
$start=0;
$limit=10;

if(isset($_GET['id']))
{
$id=$_GET['id'];
$start=($id-1)*$limit;
}

echo '<div class="container" style="margin-top:20px;margin-bottom:20px;"> ';
try{
   exec("SET CHARACTER SET utf8");
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
    $sql_dados = "SELECT formulario_contato.nome,formulario_contato.email, formulario_contato.data FROM formulario_contato 
    UNION SELECT contato_email.nome,contato_email.email,contato_email.data FROM contato_email 
    UNION SELECT formulario_newsletter.nome, formulario_newsletter.email,formulario_newsletter.data FROM formulario_newsletter 
    UNION SELECT formulario_sejaparceiro.nome,formulario_sejaparceiro.email,formulario_sejaparceiro.data FROM formulario_sejaparceiro 
    UNION SELECT formulario_trabalheconosco.nome,formulario_trabalheconosco.email,formulario_trabalheconosco.data  FROM formulario_trabalheconosco";
    $resultado_dados = $pdo->query($sql_dados);    
    //$contar =  $resultado_dados->fetch();
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
  } */
  
 
  /*$arquivo = 'lista_de_email.xls';
  header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
  header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
  header ("Cache-Control: no-cache, must-revalidate");
  header ("Pragma: no-cache");
  header ("Content-type: application/x-msexcel");
  header ("Content-Disposition: attachment; filename={$arquivo}" );
  header ("Content-Description: PHP Generated Data" );*/
  
 //for($i=0;$i<=$contar;$i++){    
 /*for($i=0;$i<=count($contar);$i++){
    echo $html[$i];
  }*/

/*echo '<form name="form1" method="post"   action="dados.php"/>
   <input name="ativar" type="hidden" value="1">
  <input name="submit" type="submit" id="teste" value="Exportar Dados">
</form>';*/

 echo '<div  class="todos_formularios" style="margin-top:20px;margin-bottom:20px;">'; 

      if($resultado_dados !== false)
  {
      // Vamos imprimir os nossos resultados
     
      $planilha_dados = '';
      $planilha_dados .= "<table id='example'class='display' cellspacing='0' width='100%' border=1><tr><td><b>Nome</b></td><td><b>Email</b></td></td><td><b>Data</b></td></tr>";  
      foreach($resultado_dados as $row) {
      //  echo $row['nome'].' - '.$row['email'].'<br/>';     
          $planilha_dados .="<tr>
          <td>".$row['nome']."</td>
          <td>".$row['email']."</td>
           <td>".$row['data']."</td>
          </tr> ";
      }
        $planilha_dados .="</table>";
        echo $planilha_dados;         
  }
  echo '</div>';
  
 
   /*formulario de contato*/
   /*$i = '';
for($i=0;$i<1;$i++){   
$html[$i] = "";
    $html[$i] .= "<table>";
    $html[$i] .= "<tr>";
    $html[$i] .= "<td><b>Nome</b></td>";
    $html[$i] .= "<td><b>email</b></td>";
    $html[$i] .= "</tr>";
    $html[$i] .= "</table>";
}
 */
$query = "SELECT nome, email FROM contact_form";
$executar_query = $pdo->query($query);
//$contar = $executar_query->fetch();
/*
  while($ret = $executar_query->fetch()){
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


  $arquivo = 'formuario_contato.xls';
  header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
  header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
  header ("Cache-Control: no-cache, must-revalidate");
  header ("Pragma: no-cache");
  header ("Content-type: application/x-msexcel");
  header ("Content-Disposition: attachment; filename={$arquivo}" );
  header ("Content-Description: PHP Generated Data" );


  for($i=0;$i<=$contar;$i++){  
    print_r($html[$i]);
  }
*/
  
echo '<div class="fomulario_contato" style="margin-top:20px;margin-bottom:20px;">'; 

 if($executar_query !== false)
      {
          // Vamos imprimir os nossos resultados
        
            $planilha = '';
            $planilha .= "<table id='example'  border=1>";
            $planilha .= "<tr>";
            $planilha .= "<td><b>Nome</b></td>";
            $planilha .= "<td><b>Email</b></td>";
            $planilha .= "<td><b>Data</b></td>";
            $planilha .= "</tr>";
           
            //$planilha .= "</table>";
          foreach($executar_query as $row) {  
           $planilha .= "            
            <tr>
            <td>".$row['nome']."</td>
            <td>".$row['email']."</td>
            <td>".$row['data']."</td>
            </tr> ";
          }
          $planilha .="</table>";
           echo $planilha;           
          
           //echo '<form action=funcao_btn.php method=get >';    
           //echo '<input type="button" value="baixar lista" name="teste"><br><br>';
           //echo '</form>';
      }
      echo '</div>';
    
              
     /*lista de dados no mewsletter*/
      //$a = ''; 
      /*for($a=0;$a<1;$a++){   
          $html_news[$a] = "";
          $html_news[$a] .= "<table>";
          $html_news[$a] .= "<tr>";
          $html_news[$a] .= "<td><b>Nome</b></td>";
          $html_news[$a] .= "<td><b>email</b></td>";
          $html_news[$a] .= "</tr>";
          $html_news[$a] .= "</table>";
      }*/
      
      $sql_newsletter = "SELECT nome, email, data FROM formulario_newsletter";
      $resultado_newsletter = $pdo->query($sql_newsletter);
      $cont = $resultado_newsletter->fetch();
      /*
        while($news = $resultado_newsletter->fetch()){
        $nome_news = $news['nome'];
        $email_news = $news['email'];
          $html_news[$a] = "<table>";
          $html_news[$a] .= "<tr>";    
          $html_news[$a] .= "<td>$nome_news</td>";
          $html_news[$a] .= "<td>$email_news</td>";
          $html_news[$a] .= "</tr>";
          $html_news[$a] .= "</table>";
          $a++;
        }
        
        $name_arquivo = 'formuario_newsletter.xls';
        header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
        header ("Cache-Control: no-cache, must-revalidate");
        header ("Pragma: no-cache");
        header ("Content-type: application/x-msexcel");
        header ("Content-Disposition: attachment; filename={$name_arquivo}" );
        header ("Content-Description: PHP Generated Data" );


        for($a=0;$a<=$cont;$a++){  
          print_r($html_news[$a]);
        }*/
     echo '<div  class="dados_newsletter" style="margin-top:20px;margin-bottom:20px;">'; 
         
      if($resultado_newsletter !== false)
      {
          // Vamos imprimir os nossos resultados
      
          $planilha_newsletter = '';
            $planilha_newsletter .= "<table id='example' border=1><tr><td><b>Nome</b></td><td><b>Email</b></td><td><b>Data</b></td></tr>";         
          foreach($resultado_newsletter as $row) {
            $planilha_newsletter .="<tr>
            <td>".$row['nome']."</td>
            <td>".$row['email']."</td>
            <td>".$row['data']."</td>
            </tr> ";      
          }
           $planilha_newsletter .="</table>";
           echo $planilha_newsletter;                  
      }
      echo '</div>'; 
     
      /*lista de dados no seja parceiro*/
      
      $sql_sejaparceiro = "SELECT nome, email, data FROM formulario_sejaparceiro";
      $resultado_sejaparceiro = $pdo->query($sql_sejaparceiro);

     echo '<div  class="dados_parceiro" style="margin-top:20px;margin-bottom:20px;">'; 
      if($resultado_sejaparceiro !== false)
      {
          // Vamos imprimir os nossos resultados
        
           $planilha_sejaparceiro = '';
           $planilha_sejaparceiro .= "<table id='example' border=1><tr><td><b>Nome</b></td><td><b>Email</b></td><td><b>Data</b></td></tr>";        
          foreach($resultado_sejaparceiro as $row) {
             $planilha_sejaparceiro .="<tr>
              <td>".$row['nome']."</td>
              <td>".$row['email']."</td>
              <td>".$row['data']."</td>
              </tr> ";          
          }
          $planilha_sejaparceiro .="</table>";
           echo $planilha_sejaparceiro;          
          
      }
       echo '</div>'; 
             /*lista de dados do trabalhe conosco*/
      
      $sql_trabalheconosco = "SELECT nome, email, data FROM formulario_trabalheconosco";
      $resultado_trabalheconosco = $pdo->query($sql_trabalheconosco);

   echo '<div class="dados_trabalhe_conosco" style="margin-top:20px;margin-bottom:20px;">'; 
      if($resultado_trabalheconosco !== false)
      {
          // Vamos imprimir os nossos resultados
     
          $planilha_trabalheconosco = '';
          $planilha_trabalheconosco .= "<table id='example' border=1><tr><td><b>Nome</b></td><td><b>Email</b></td><td><b>Data</b></td></tr>";  
          foreach($resultado_trabalheconosco as $row) {
              $planilha_trabalheconosco .="<tr>
              <td>".$row['nome']."</td>
              <td>".$row['email']."</td>
              <td>".$row['data']."</td>
              </tr> ";  
          }
          $planilha_trabalheconosco .="</table>";
           echo $planilha_trabalheconosco;   
      }
    echo '</div>';
    
      
      /* dados formulario do chat*/
      $sql_chat = "SELECT nome, email, data FROM contato_email";
      $resultado_chat = $pdo->query($sql_chat);
       
     echo '<div    class="dados_chat" style="margin-top:20px;margin-bottom:20px;">';  
      if($resultado_chat !== false)
      {
          // Vamos imprimir os nossos resultados
        
          $planilha_chat = '';
          $planilha_chat .= "<table id='example' border=1><tr><td><b>Nome</b></td><td><b>Email</b></td><td><b>Data</b></td></tr>";  
          foreach($resultado_chat as $row) {           
             $planilha_chat .="<tr>
              <td>".$row['nome']."</td>
              <td>".$row['email']."</td>
              <td>".$row['data']."</td>
              </tr> ";      
          }
           $planilha_chat .="</table>";
           echo $planilha_chat;                     
      }
     echo '</div>'; 
     
}
catch(PDOException $e)
{
  echo  $e->getMessage();
   // echo "This exception severity is: " . $e->getSeverity();
}

 $pdo = null;
 
   echo'<a href="../dados" target="_blank" style="background-color:#337ab7;color:#D4A340;padding:5px;">Exportar</a><br>';
   echo '<a href="/login" style="background-color:#337ab7;color:#D4A340;padding:5px;">Sair</a>';
echo '</div>';
?>


   <!--script src="<//?php echo esc_url( get_template_directory_uri() ); ?>/js/dados_clientes.js"></script-->
   <script type="text/javascript"> 

    $(document).ready(function() {
        $('#example').DataTable({
         "pagingType": "full_numbers"
        });

    } );



    $('.todos_os_dados').on('click', function() {
                    
                $('.dados_newsletter').css({'display':'none'}); 
                $('.dados_parceiro').css({'display':'none'});   
                $('.dados_trabalhe_conosco').css({'display':'none'});
                $('.dados_chat').css({'display':'none'});                     
                $('.fomulario_contato').css({'display':'none'});  
                $('.todos_formularios').css({'display':'block'});
            });
            $('.form_contato').on('click', function() {                   
                $('.todos_formularios').css({'display':'none'});          
                $('.dados_newsletter').css({'display':'none'}); 
                $('.dados_parceiro').css({'display':'none'});   
                $('.dados_trabalhe_conosco').css({'display':'none'});
                $('.dados_chat').css({'display':'none'});                     
                $('.fomulario_contato').css({'display':'block'});           
            });       
            $('.form_newsletter').on('click', function() { 
                $('.todos_formularios').css({'display':'none'});  
                $('.dados_parceiro').css({'display':'none'});   
                $('.dados_trabalhe_conosco').css({'display':'none'});
                $('.dados_chat').css({'display':'none'});                     
                $('.fomulario_contato').css({'display':'none'});                   
                $('.dados_newsletter').css({'display':'block'});           
            });
            $('.form_parceiros').on('click', function() {   
                $('.todos_formularios').css({'display':'none'});             
                $('.dados_trabalhe_conosco').css({'display':'none'});
                $('.dados_chat').css({'display':'none'});                     
                $('.fomulario_contato').css({'display':'none'});                   
                $('.dados_newsletter').css({'display':'none'});                 
                $('.dados_parceiro').css({'display':'block'});           
            });
            $('.form_trabalhe_conosco').on('click', function() {
                $('.todos_formularios').css({'display':'none'});
                $('.dados_chat').css({'display':'none'});                     
                $('.fomulario_contato').css({'display':'none'});                   
                $('.dados_newsletter').css({'display':'none'});                 
                $('.dados_parceiro').css({'display':'none'});                   
                $('.dados_trabalhe_conosco').css({'display':'block'});           
            });
            $('.form_chat').on('click', function() {
                $('.todos_formularios').css({'display':'none'});
                $('.fomulario_contato').css({'display':'none'});
                $('.dados_newsletter').css({'display':'none'}); 
                $('.dados_parceiro').css({'display':'none'});   
                $('.dados_trabalhe_conosco').css({'display':'none'});
                $('.dados_chat').css({'display':'block'});           
            });
   </script>

   
   <?php get_footer(); ?>


 