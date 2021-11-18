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

<!-- Inicio modal Pop Msg  -->
<div class="modal fade" id="modalProduto" role="dialog">
	<div class="modal-dialog modal-lg">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title alert alert-primary font-weight-bold text-uppercase">Atualização</h4>
			</div>
			<div class="modal-body font-weight-bold">

			</div>
			<div class="modal-footer">
				<button type="button" id="bt-msg-close" class="btn btn-default font-weight-bold" data-dismiss="modal">Fechar</button>
			</div>
		</div>
	</div>
</div>
<!-- Final modal pop msg -->

<?php
	require __DIR__ . "/../docs/footer.php";
?>

<script>
	let btprod, form_produto, nome, descricao, preco, img;

	btprod = $('#btproduto');
	form_produto = $('#form_produto');

	function dados () {
		idproduto = $('input[name=idproduto]').val();
		nome = $('input[name=nome]').val();
		descricao = $('input[name=descricao]').val();
		preco = $('input[name=preco]').val();
		img = $('input[name=img]').val();
	}

	btprod.click(function () {
		// form_produto.submit();

		dados();

		$.post('atualiza_produto.php', {
			idproduto,
			nome,
			descricao,
			preco,
			img
		},
		function (response, status) {
			$('#modalProduto .modal-body').html('<h3>' + response.nome + '</h3>' + response.msg);
			$('#modalProduto').modal();

			$('#bt-msg-close').click(function () {
				location.href = 'lista_produtos.php';
			});
		}, 'json');
	});
</script>