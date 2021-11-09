<?php
	require "docs/header.php";
	require "docs/nav.php";

	echo "Aula 2";

	// Escopo de variável
	{
		$salario = "4000";

		function promocao() {
			$salario = "5000";
			echo "Mas na promoção, o salário desse vendedor passa para R$ $salario";
		}

		echo "<hr>";
		echo "O salário era R$ $salario";
	}

	// Escopo global
	{
		$total = 400;

		function totalGeral () {
			global $total;
			$total = 600;
			echo "A variável total é $total";
		}

		echo "<hr>";
		totalGeral();
		echo " e a variável original é $total	";
		
		$cliente = "Napoelão Bonaparte";
		{
			$cliente = "Albert Bonaparte";
			echo "<hr>";
			echo $GLOBALS["cliente"];
		}
	}

	// Variáveis de ambiente
	$navegador = getenv("HTTP_USER_AGENT");

	// Definição de constante em string
	define("AULA", "Desenvolvimento WEB");

	// GET
	$status = $_GET["status"] ?? "0";
	$tipo = $_GET["tipo"] ?? "0";
	$user = $_GET["user"] ?? "Não cadastrado";
	$associado = $_GET["associado"] ?? "0";
?>

<hr>
<p><?=promocao()?></p>
<p><?=$navegador?></p>
<p><?="Aula sobre " . AULA?></p>

<h4>Trabalhando com ternários</h4>
<p><?="Cliente: " . ($tipo == 0 ? "Inativo" : "Ativo")?></p>
<p><?="Associado: " . ($associado == 0 ? "Não" : "Sim")?></p>
<p><?="Query param ?status=$status"?></p>

<?php require "docs/footer.php" ?>