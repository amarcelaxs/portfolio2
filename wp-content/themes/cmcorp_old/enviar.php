<?php
// Destinat�rio
$para = "axavier@cmcorp.com.br";

// Assunto do e-mail
$assunto = "Contato do site";

// Campos do formul�rio de contato
$nome = $_POST['nome'];
/*$empresa = $_POST['Empresa'];
$email = $_POST['email'];
$mensagem = $_POST['msg'];*/

// Monta o corpo da mensagem com os campos
$corpo = "Nome:".$nome."<br>";
/*$corpo .="Empresa:".$empresa."<br>";
$corpo .= "E-mail:".$email."<br>";
$corpo .="Mensagem:".$mensagem;*/

// Cabe�alho do e-mail
$header = "From: $nome <$para> Reply-to: $email ";
#$header .= "Content-Type: text/html; charset=iso-8859-1 ";

mail($para, $assunto, $corpo, $header);

$msg = "Sua mensagem foi enviada com sucesso.";

// Mostra a mensagem acima e redireciona para index.html
echo "<script>location.href='http://www.v2.cmcorp.com.br/'; alert('$msg');</script>";

?>