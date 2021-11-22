<?php
	require "../src/funcoes.php";

	$post = limpar_post($_POST);

	if (isset($post["add_carrinho"])) {
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

	if (isset($post["edit_carrinho"])) {
		$con = conecta("lojaphp7");
		{
			$sql = "UPDATE compras SET qtd = {$post["qtd"]} WHERE idcompra = {$post["idcompra"]}";
			$result = $con->query($sql);

			$retorno = new stdClass();
			$retorno->msg = $result ? "Quantidade atualizada com sucesso" : "Algo deu errado :(";
			echo json_encode($retorno);
		}
		desconecta($con);
	}

	if (isset($post["remove_carrinho"])) {
		$con = conecta("lojaphp7");
		{
			$sql = "DELETE FROM compras WHERE idcompra = " . $post["idcompra"];
			$result = $con->query($sql);

			$retorno = new stdClass();
			$retorno->msg = $result ? "Item removido do carrinho" : "Algo deu errado :(";
			echo json_encode($retorno);
		}
		desconecta($con);
	}
?>