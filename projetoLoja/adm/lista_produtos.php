<?php
	require __DIR__ . "/../docs/header.php";
	require __DIR__ . "/../docs/nav.php";

	$con = conecta("lojaphp7");
	$sql = "SELECT * FROM produtos ORDER BY idproduto DESC";
	$result = $con->query($sql);
?>

<div class="row container mt-5 pt-5">
	<h3>Lista de produtos</h3>

	<table class="table table-striped">
		<thead>
			<tr>
				<th>Nome</th>
				<th>Descrição</th>
				<th>Preço</th>
				<th>Imagem</th>
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
				<td><?=formata_reais($produto["preco"])?></td>
				<td><?=$produto["img"]?></td>
				<td>
					<a href="produtos.php?id=<?=$produto["idproduto"]?>">Editar</a>
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
	require __DIR__ . "/../docs/footer.php";
?>