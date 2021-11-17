<?php
	require __DIR__ . "/../docs/header.php";
	require __DIR__ . "/../docs/nav.php";

	$conn = conecta("lojaPHP7");
	$idproduto = $_GET["id"] ?? "1";
	$sql = "SELECT * FROM produtos WHERE idproduto = $idproduto";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$nome = $row["nome"];
			$descricao = $row["descricao"];
			$preco = $row["preco"];
			$img = $row["img"];
		}
	}
?>

<div class="container mt-5 pt-5">
	<h3>Editar produto</h3>

	<form action="atualiza_produto.php" method="post" id="form_produto" class="shadow-lg p-4 bg-white w-50 mx-auto">
		<fieldset>
			<ul class="list-unstyled">
				<input type="hidden" name="idproduto" value="<?=$idproduto?>">

				<li>
					<input type="text" name="nome" placeholder="Nome" class="form-control mb-2" value="<?=$nome?>" required />
				</li>
				<li>
					<input type="text" name="descricao" placeholder="Descrição" class="form-control mb-2" value="<?=$descricao?>" required />
				</li>
				<li>
					<input type="number" name="preco" placeholder="Preço" class="form-control mb-2" value="<?=$preco?>" required />
				</li>
				<li>
					<input type="text" name="img" class="form-control mb-2" value="<?=$img?>" required />
				</li>
				<li>
					<button type="button" id="btproduto" class="btn btn-info p-2 mt-2">Atualizar</button>
				</li>
			</ul>
		</fieldset>
	</form>
</div>

<?php
	require __DIR__ . "/../docs/footer.php";
?>

<script>
	let btprod, form_produto;

	btprod = $('#btproduto');
	form_produto = $('#form_produto');

	btprod.click(function () {
		form_produto.submit();
	});
</script>