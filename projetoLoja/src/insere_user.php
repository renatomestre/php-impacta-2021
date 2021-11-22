<?php
	require "funcoes.php";

	$post = limpar_post($_POST);

	if (isset($post["nome"])) {
		$nome = $post["nome"];
		$email = $post["email"];
		$telefone = $post["telefone"];
		$tipo_profissao = $post["tipo_profissao"];
		$senha = password_hash($post["senha"], PASSWORD_BCRYPT);
	}

	$con = conecta("lojaphp7");

	$sql = "INSERT INTO clientes (nome, email, telefone, tipo_profissao, senha)
		VALUES ('$nome', '$email', '$telefone', '$tipo_profissao', '$senha')
	";
	$resultado = mysqli_query($con, $sql);
	echo $resultado ? $res = "Olá <b>$nome</b>. Cadastro feito com sucesso!" : $res = "Ops, seu cadastro ainda não foi feito.";
	
	desconecta($con);
?>

<p>
	<a href='<?=$url?>'>&lt; Voltar para a home</a>
</p>