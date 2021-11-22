<!-- =============== Produtos ================== -->
<div class="row">
	<?php
		$idcliente = $_SESSION["id_user"] ?? null; 

		$con = conecta("lojaphp7");
		$sql = "SELECT * FROM produtos ORDER BY idproduto DESC";
		$result = $con->query($sql);

		if ($result->num_rows > 0) {
			while ($produto = $result->fetch_assoc()) {
	?>
	<div class="col-md-16 col-sm-16 col-lg-4">
		<div class="card">
			<img class="card-img-top" src="<?=BASE_URL . "/" . $produto["img"]?>" alt="Card image cap" style="width:50%">
			<div class="card-body">
				<h4 class="card-title"><?=$produto["nome"]?></h4>
				<p class="card-text"><?=$produto["descricao"]?></p>
				<h2><?=formata_reais($produto["preco"])?></h2>
				<a href="" class="btn btn-primary add-compra" data-idproduto="<?=$produto["idproduto"]?>" data-idcliente="<?=$idcliente?>">Adicionar ao carrinho</a>
			</div>
		</div>
	</div>
	<?php
			}
		}

		desconecta($con);
	?>
</div>
<!-- =============== Fim dos Produtos ================== -->

<script>
	$('.add-compra').each(function () {
		$(this).click(function () {
			event.preventDefault();

			$.post('src/insere_carrinho.php', {
				add_carrinho: true,
				idcliente: $(this).data('idcliente'),
				idproduto: $(this).data('idproduto'),
				datahora: '<?=date("Y-m-d h:i:s")?>',
				qtd: 1,
				statuscompra: 'Pendente'
			}, function (response, status) {
				location.href = '<?=BASE_URL?>' + '/carrinho.php';
			});
		});
	});
</script>