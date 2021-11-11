<?php
	require "docs/header.php";
	require "docs/nav.php";

	echo "Hello World!";
	
	// Comentario de uma linha
	/*
		Comentários multiline
	*/

	echo "<br>";

	$nome = "Adalberto";
	var_dump($nome);

	$salario = 3000;
	$comissao = 0.10;
	$ganhoDoMes = $salario * (1 + $comissao);

	echo "<br>";
	var_dump($ganhoDoMes);

	$msg01 = "Esse mês vou ganhar R$ $ganhoDoMes";

	// Hexadecimal
	$hexa = 0xfff;
	// Binário
	$binario = 0b01001101;
	// Octal
	$octal = 0227;
	
	// Array
	$cores = array("amarelo", "azul", "vermelho", "verde");
	var_dump($cores);

	// Classe genérica (Standard Class)
	{
		$objeto = new stdClass();
		
		$objeto->nome = "Albert";
		$objeto->sobrenome = "Einstein";
		$objeto->profissao = "Cientista";
		
		echo "<pre>";
		var_dump($objeto);
		echo "</pre>";
	}

	// Convertendo number para string e vice-versa
	{
		$total = 20;
		settype($total, "string");
		echo "<br>";
		var_dump($total);
		
		$total = (int)$total;
		echo "<br>";
		var_dump($total);
	}
?>

<h2><?="Aula de PHP7";?></h2>

<p><?=$msg01?></p>

<hr>

<h2>Heredoc</h2>

<?php
	$conteudo = <<<HTML
	<!doctype html>
	<html>
		<head>
			<title>Aula de PHP 7</title>
		</head>
		<body>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, consectetur?</p>
		</body>
	</html>
	HTML;
?>

<?=$conteudo?>

<hr>

<p><?="Hoje o céu está $cores[2]"?></p>


<?php
	$animal = "";
	$url = "https://www.portaldosanimais.com.br/wp-content/uploads/2019/06/Camelo-12-e1561508089795.jpg";

	if (isset($animal)) {
		echo "Camelo não é dromedário";
		echo "<img src='{$url}' width='30%' />";
	}
?>

<?php require "docs/footer.php" ?>