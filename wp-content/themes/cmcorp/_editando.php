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

echo '<div class="container tabelas_dadosclientes" style="margin-top:20px;margin-bottom:20px;"> ';
try{
    
    exec("SET CHARACTER SET utf8");
   /**************     tabela de todos os dados dos formulário *****************/
    $sql_dados = "SELECT contato_email.nome,contato_email.email,contato_email.data FROM contato_email UNION SELECT formulario_contato.nome,formulario_contato.email,formulario_contato.data FROM formulario_contato UNION SELECT formulario_newsletter.nome, formulario_newsletter.email, formulario_newsletter.data FROM formulario_newsletter UNION SELECT formulario_sejaparceiro.nome,formulario_sejaparceiro.email,formulario_sejaparceiro.data FROM formulario_sejaparceiro UNION SELECT formulario_trabalheconosco.nome,formulario_trabalheconosco.email,formulario_trabalheconosco.data FROM formulario_trabalheconosco ";

    $resultado_dados = $pdo->query($sql_dados);  
    echo '<div  class="todos_formularios" >';
    $planilha_dados ='<table border=1><tr><td><b>Nome</b></td><td><b>Email</b></td></tr>';
    while($query2=$sql_dados->fetch(PDO::FETCH_OBJ)){        
    //while($query2=mysql_fetch_array($sql_dados)){
    $planilha_dados .="<tr>
          <td>".$query2['nome']."</td>
          <td>".$query2['email']."</td>
          <td>".$query2['data']."</td>
          </tr> ";  
    }
    $planilha_dados .="</table>";
    echo $planilha_dados;
    //$rows=$resultado_dados->fetchColumn();
    $rows = mysql_num_rows(mysql_query("SELECT contact_form.nome,contact_form.email,contact_form.data FROM contact_form 
    UNION SELECT contato_email.nome,contato_email.email,contato_email.data FROM contato_email 
    UNION SELECT formulario_newsletter.nome, formulario_newsletter.email, formulario_newsletter.data FROM formulario_newsletter 
    UNION SELECT formulario_sejaparceiro.nome,formulario_sejaparceiro.email,formulario_sejaparceiro.data FROM formulario_sejaparceiro 
    UNION SELECT formulario_trabalheconosco.nome,formulario_trabalheconosco.email,formulario_trabalheconosco.data FROM formulario_trabalheconosco "));
    $total=ceil($rows/$limit);
    
    echo '<div class="buttons-pagination">';
     if($id>1)
    {
    echo "<a href='?id=".($id-1)."' class='button'>PREVIOUS</a>";
    }
    if($id!=$total)
    {
    echo "<a href='?id=".($id+1)."' class='button'>NEXT</a>";
    }
    echo "<ul class='pages'>";
    for($i=1;$i<=$total;$i++)
    {
    if($i==$id) { echo "<li class='current'>".$i."</li>"; }
    else { echo "<li><a href='?id=".$i."'>".$i."</a></li>"; }
    }
    echo "</ul></div>";
    
  echo '</div>';

/**************     tabela do formulário de contato *****************/
$query = "SELECT nome, email,data FROM contact_form";
$executar_query = $pdo->query($query);

  
echo '<div class="fomulario_contato" >'; 

 if($executar_query !== false)
      {
          // Vamos imprimir os nossos resultados
        
            $planilha = '';
            $planilha .= "<table border=1>";
            $planilha .= "<tr>";
            $planilha .= "<td><b>Nome</b></td>";
            $planilha .= "<td><b>email</b></td>";
            $planilha .= "</tr>";
           
            //$planilha .= "</table>";
          foreach($executar_query as $row) {  
           $planilha .= "            
            <tr>
            <td>".$row['nome']."</td>
            <td>".$row['email']."</td>
            </tr> ";
          }
          $planilha .="</table>";
           echo $planilha;           
        
      }
      
       echo '<div class="buttons-pagination">';
     if($id>1)
    {
    echo "<a href='?id=".($id-1)."' class='button'>PREVIOUS</a>";
    }
    if($id!=$total)
    {
    echo "<a href='?id=".($id+1)."' class='button'>NEXT</a>";
    }
    echo "<ul class='pages'>";
    for($i=1;$i<=$total;$i++)
    {
    if($i==$id) { echo "<li class='current'>".$i."</li>"; }
    else { echo "<li><a href='?id=".$i."'>".$i."</a></li>"; }
    }
    echo "</ul></div>";
    
  echo '</div>';  
      
      
      
      /**************     tabela de newsletter   *****************/
      
      $sql_newsletter = "SELECT nome, email,data FROM formulario_newsletter";
      $resultado_newsletter = $pdo->query($sql_newsletter);
      $cont = $resultado_newsletter->fetch();
    
     echo '<div  class="dados_newsletter" >'; 
         
      if($resultado_newsletter !== false)
      {
          // Vamos imprimir os nossos resultados
      
          $planilha_newsletter = '';
            $planilha_newsletter .= "<table border=1><tr><td><b>Nome</b></td><td><b>Email</b></td></tr>";         
          foreach($resultado_newsletter as $row) {
            $planilha_newsletter .="<tr>
            <td>".$row['nome']."</td>
            <td>".$row['email']."</td>
            </tr> ";      
          }
           $planilha_newsletter .="</table>";
           echo $planilha_newsletter;                  
      }
   echo '<div class="buttons-pagination">';
     if($id>1)
    {
    echo "<a href='?id=".($id-1)."' class='button'>PREVIOUS</a>";
    }
    if($id!=$total)
    {
    echo "<a href='?id=".($id+1)."' class='button'>NEXT</a>";
    }
    echo "<ul class='pages'>";
    for($i=1;$i<=$total;$i++)
    {
    if($i==$id) { echo "<li class='current'>".$i."</li>"; }
    else { echo "<li><a href='?id=".$i."'>".$i."</a></li>"; }
    }
    echo "</ul></div>";
    
  echo '</div>';
     
      /**************     tabela do formulário seja parceiro *****************/
      
      $sql_sejaparceiro = "SELECT nome, email, data FROM formulario_sejaparceiro";
      $resultado_sejaparceiro = $pdo->query($sql_sejaparceiro);

     echo '<div  class="dados_parceiro">'; 
      if($resultado_sejaparceiro !== false)
      {
          // Vamos imprimir os nossos resultados
        
           $planilha_sejaparceiro = '';
           $planilha_sejaparceiro .= "<table border=1><tr><td><b>Nome</b></td><td><b>Email</b></td></tr>";        
          foreach($resultado_sejaparceiro as $row) {
             $planilha_sejaparceiro .="<tr>
              <td>".$row['nome']."</td>
              <td>".$row['email']."</td>
              </tr> ";          
          }
          $planilha_sejaparceiro .="</table>";
           echo $planilha_sejaparceiro;           
          
      }
   echo '<div class="buttons-pagination">';
     if($id>1)
    {
    echo "<a href='?id=".($id-1)."' class='button'>PREVIOUS</a>";
    }
    if($id!=$total)
    {
    echo "<a href='?id=".($id+1)."' class='button'>NEXT</a>";
    }
    echo "<ul class='pages'>";
    for($i=1;$i<=$total;$i++)
    {
    if($i==$id) { echo "<li class='current'>".$i."</li>"; }
    else { echo "<li><a href='?id=".$i."'>".$i."</a></li>"; }
    }
    echo "</ul></div>";
    
  echo '</div>';
  
     /**************     tabela do formulário fale conosco *****************/
      
      $sql_trabalheconosco = "SELECT nome, email,data FROM formulario_trabalheconosco";
      $resultado_trabalheconosco = $pdo->query($sql_trabalheconosco);

   echo '<div class="dados_trabalhe_conosco" >'; 
      if($resultado_trabalheconosco !== false)
      {
          // Vamos imprimir os nossos resultados
     
          $planilha_trabalheconosco = '';
          $planilha_trabalheconosco .= "<table border=1><tr><td><b>Nome</b></td><td><b>Email</b></td></tr>";  
          foreach($resultado_trabalheconosco as $row) {
              $planilha_trabalheconosco .="<tr>
              <td>".$row['nome']."</td>
              <td>".$row['email']."</td>
              </tr> ";  
          }
          $planilha_trabalheconosco .="</table>";
           echo $planilha_trabalheconosco;           
        
      }
    echo '<div class="buttons-pagination">';
        if($id>1)
        {
        echo "<a href='?id=".($id-1)."' class='button'>PREVIOUS</a>";
        }
        if($id!=$total)
        {
        echo "<a href='?id=".($id+1)."' class='button'>NEXT</a>";
        }
        echo "<ul class='pages'>";
        for($i=1;$i<=$total;$i++)
        {
        if($i==$id) { echo "<li class='current'>".$i."</li>"; }
        else { echo "<li><a href='?id=".$i."'>".$i."</a></li>"; }
        }
        echo "</ul></div>";
        
    echo '</div>';
    
      
      /**************     tabela do formulário do chat *****************/
      $sql_chat = "SELECT nome, email, data FROM contato_email";
      $resultado_chat = $pdo->query($sql_chat);
       
     echo '<div    class="dados_chat" >';  
      if($resultado_chat !== false)
      {
          // Vamos imprimir os nossos resultados
        
          $planilha_chat = '';
          $planilha_chat .= "<table border=1><tr><td><b>Nome</b></td><td><b>Email</b></td></tr>";  
          foreach($resultado_chat as $row) {           
             $planilha_chat .="<tr>
              <td>".$row['nome']."</td>
              <td>".$row['email']."</td>
              </tr> ";      
          }
           $planilha_chat .="</table>";
           echo $planilha_chat;                     
      }
    echo '<div class="buttons-pagination">';
        if($id>1)
        {
        echo "<a href='?id=".($id-1)."' class='button'>PREVIOUS</a>";
        }
        if($id!=$total)
        {
        echo "<a href='?id=".($id+1)."' class='button'>NEXT</a>";
        }
        echo "<ul class='pages'>";
        for($i=1;$i<=$total;$i++)
        {
        if($i==$id) { echo "<li class='current'>".$i."</li>"; }
        else { echo "<li><a href='?id=".$i."'>".$i."</a></li>"; }
        }
        echo "</ul></div>";
        
    echo '</div>'; 
     
}
catch(PDOException $e)
{
  echo  $e->getMessage();
   // echo "This exception severity is: " . $e->getSeverity();
}

 $pdo = null;
 
 /**************    exportação de contato e botão sair  e input de busca*****************/
 
   echo '<div class="buscar-dados pull-right">
   <input type="text" value=""><input type="button"  class="buscar-dados-clientes" value="Buscar"><br>';
   echo'<a href="../dados" class="button-exportar" target="_blank" >Exportar</a><br>
   </div>';
   echo '<a href="/login" class="button-sair" >Sair</a>';
echo '</div>';
?>

   <!--script src="<//?php echo esc_url( get_template_directory_uri() ); ?>/js/dados_clientes.js"></script-->
   <script type="text/javascript"> 
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


 