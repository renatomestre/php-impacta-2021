<?php
	require "../src/funcoes.php";

	$post = limpar_post($_POST);

	if (isset($post["idproduto"])) {
		$con = conecta("lojaPHP7");
		
		$sql = "UPDATE produtos SET
					nome = '{$post["nome"]}',
					descricao = '{$post["descricao"]}',
					preco = '{$post["preco"]}',
					img = '{$post["img"]}'
				WHERE
					idproduto = {$post["idproduto"]};
		";

		$resultado = mysqli_query($con, $sql);
		
		desconecta($con);
		
		$retornoJson = new stdClass();
		$retornoJson->nome = $post["nome"];
		$retornoJson->msg = $resultado ? $res = "Produto atualizado com sucesso!" : $res = "Ops, a atualização do produto falhou.";
		
		echo json_encode($retornoJson);
	}
?>