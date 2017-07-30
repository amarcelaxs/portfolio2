<?php

	include ("User.php");
    include("tst.php");

	//$user = new User();
       $user = new tst(); 
	$user->nome  = isset($_POST['nome'])  ? $_POST['nome']  : null;
	$user->email = isset($_POST['email']) ? $_POST['email'] : null;
	//$user->cpf   = isset($_POST['telefone'])   ? $_POST['telefone']   : null;
	
	$duplicado = $user->isDuplicado();

	if($duplicado) {
		$msg = 'Este login já existe';
	} else {
		$user->inserir();
		$msg = 'Usuário cadastrado com sucesso';
	}
?>

<!--div class="container cadastro">
	<div class ="row">
		<div class="col-lg-6  col-lg-offset-4">
			<h2><--?php echo $msg ?></h2>
			<a href="index.php" class="btn btn-default col-lg-6 col-lg-offset-2">Voltar</a>
		</div>
	</div>
</div-->