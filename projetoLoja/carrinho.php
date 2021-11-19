<?php
	require __DIR__ . "/docs/header.php";
	require __DIR__ . "/docs/nav.php";

	$con = conecta("lojaphp7");
	$sql = "SELECT * FROM compras JOIN produtos ON compras.idproduto = produtos.idproduto
			WHERE compras.idcliente = " . $_SESSION["id_user"];
	$result = $con->query($sql);
?>

<div class="row container mt-5 pt-5">
	<h3>Carrinho de compras</h3>

	<table class="table table-striped">
		<thead>
			<tr>
				<th>Nome</th>
				<th>Descrição</th>
				<th>Preço</th>
				<th>Imagem</th>
				<th>Quantidade</th>
				<th>Incluído em</th>
				<th>Status</th>
				<th></th>
			</tr>
		</thead>
		<tbody>

<?php
	if ($result->num_rows > 0) {
		while ($produto = $result->fetch_assoc()) {
?>
			<tr>
				<td><?=$produto["nome"]?></td>
				<td><?=$produto["descricao"]?></td>
				<td class="text-nowrap"><?=formata_reais($produto["preco"])?></td>
				<td><img src="<?=$produto["img"]?>" width="100"></td>
				<td><?=$produto["qtd"]?></td>
				<td><?=$produto["datahora"]?></td>
				<td><?=$produto["statuscompra"]?></td>
				<td>
					<a id="bt-exclui" data-id="<?=$produto["idproduto"]?>">Excluir</a>
				</td>
			</tr>
<?php
		}
	}

	desconecta($con);
?>

		</tbody>
	</table>
</div>

<?php
	require __DIR__ . "/docs/footer.php";
?>