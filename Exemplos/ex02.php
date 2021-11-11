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

<hr>
<p><a href="ex02.php?tipo=1&status=2&associado=1&user=1">Verificar cliente</a></p>
<hr>

<form action="" method="get">
	<div>
		<label for="nome_cliente">Cliente</label>
		<input type="text" name="nome_cliente" placeholder="Digite o nome">
		<button>Confirmar</button>
	</div>
	<div>
		<input type="hidden" name="tipo" value="1">
		<input type="hidden" name="user" value="0">
		<input type="hidden" name="associado" value="1">
		<input type="hidden" name="status" value="0">
	</div>
</form>

<p><?="Nome: " . mb_strtoupper($_GET["nome_cliente"] ?? "", mb_internal_encoding())?></p>
<p><?="Tipo: " . ($tipo == 1 ? "Ativo" : "Inativo")?></p>
<p><?="Associado: " . ($associado == 1 ? "Sim" : "Não")?></p>
<p><?="Query param ?status=$status"?></p>

<?php require "docs/footer.php" ?>