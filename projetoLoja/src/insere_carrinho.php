<?php
	require "../docs/header.php";
	require "../docs/nav.php";

	$post = limpar_post($_POST);

	if (isset($post["idcliente"]) && isset($post["idproduto"])) {
		$con = conecta("lojaphp7");
		{
			$sql = "SELECT * FROM produtos WHERE idproduto = " . $post["idproduto"];
			$result = $con->query($sql);
			
			if ($result->num_rows > 0) {
				while ($produto = $result->fetch_assoc()) {
					$preco = $produto["preco"];
				}
			}
			
			$sql = "INSERT INTO compras (idcliente, idproduto, datahora, qtd, valor, statuscompra)
				VALUES (
					'{$post["idcliente"]}',
					'{$post["idproduto"]}',
					'{$post["datahora"]}',
					'{$post["qtd"]}',
					'$preco',
					'{$post["statuscompra"]}'
				)
			";
			$result = $con->query($sql);
			echo $result ? "Produto adicionado ao carrinho" : "Algo deu errado :(";
		}
		desconecta($con);
	}
?>

<?php
	require "../docs/footer.php";
?>