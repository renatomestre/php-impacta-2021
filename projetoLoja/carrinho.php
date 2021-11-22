<?php
	require __DIR__ . "/docs/header.php";
	require __DIR__ . "/docs/nav.php";

	$con = conecta("lojaphp7");
	$sql = "SELECT * FROM compras JOIN produtos ON compras.idproduto = produtos.idproduto
			WHERE compras.idcliente = {$_SESSION["id_user"]}
			ORDER BY produtos.idproduto, compras.datahora DESC";
	$result = $con->query($sql);
?>

<div class="container mt-5 pt-5">
	<h3>Carrinho de compras</h3>

	<table class="table table-hover">
		<thead>
			<tr>
				<th>Nome</th>
				<th>Descrição</th>
				<th>Imagem</th>
				<th>Preço</th>
				<th>Quantidade</th>
				<th>Total</th>
				<th>Incluído em</th>
				<th>Status</th>
				<th></th>
			</tr>
		</thead>
		<tbody>

<?php
	$total_carrinho = 0;

	if ($result->num_rows > 0) {
		while ($produto = $result->fetch_assoc()) {
			$total_item = $produto["preco"] * $produto["qtd"];
?>
			<tr>
				<td><?=$produto["nome"]?></td>
				<td><?=$produto["descricao"]?></td>
				<td><img src="<?=$produto["img"]?>" width="60"></td>
				<td class="text-nowrap"><?=formata_reais($produto["preco"])?></td>
				<td class="text-center edit-carrinho">
					<span class="d-block border" contenteditable="true"><?=$produto["qtd"]?></span>
					<button class="btn btn-info btn-sm d-none btn-qtd" data-idcompra="<?=$produto["idcompra"]?>">Atualizar</button>
				</td>
				<td class="text-nowrap"><?=formata_reais($total_item)?></td>
				<td class="text-nowrap"><?=$produto["datahora"]?></td>
				<td class="text-nowrap"><?=$produto["statuscompra"]?></td>
				<td>
					<a href="" class="bt-exclui" data-idcompra="<?=$produto["idcompra"]?>" data-nome="<?=$produto["nome"]?>">Excluir</a>
				</td>
			</tr>
<?php
				$total_carrinho += $total_item;
		}
	}

	desconecta($con);
?>
			<tr>
				<td colspan="1000">
					<h3 class="float-right">Total: <?=formata_reais($total_carrinho)?></h3>
				</td>
			</tr>
		</tbody>
	</table>
</div>

<div class="modal fade" id="modal-carrinho" role="dialog">
	<div class="modal-dialog modal-sm">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Atenção!</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body font-weight-bold">
				<p>
					<small>
						Excluindo o item <b id="descricao-exclui-produto"></b>.
					</small>
				</p>
				<p>Confirma?</p>
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary" id="bt-exclui-item">Sim</button>
				<button class="btn btn-default" data-dismiss="modal">Não</button>
			</div>
		</div>
	</div>
</div>

<?php
	require __DIR__ . "/docs/footer.php";
?>

<script>
	$('.bt-exclui').each(function () {
		$(this).click(function () {
			event.preventDefault();

			let idCompra = $(this).data('idcompra');

			$('#descricao-exclui-produto').html($(this).data('nome'));

			$('#modal-carrinho').modal();

			$('#bt-exclui-item').click(function () {
				event.preventDefault();

				$.post('src/insere_carrinho.php', {
					remove_carrinho: true,
					idcompra: idCompra,
				}, function (response, status) {
					response = JSON.parse(response);
					location.href = '<?=BASE_URL?>' + '/carrinho.php';
				});
			});
		});
	}, 'json');

	$('.edit-carrinho span').focus(function () {
		$('.edit-carrinho button').addClass('d-none');
		$(this).parent().find('button').removeClass('d-none');
	});

	$('.btn-qtd').click(function () {
		event.preventDefault();

		let idCompra = $(this).data('idcompra');
		let qtd = $(this).parent().find('span').html();

		$.post('src/insere_carrinho.php', {
			edit_carrinho: true,
			idcompra: idCompra,
			qtd: qtd
		}, function (response, status) {
			response = JSON.parse(response);
			alert(response.msg);
			location.href = '<?=BASE_URL?>' + '/carrinho.php';
		});
	});
</script>