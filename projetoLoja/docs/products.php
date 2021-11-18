<!-- =============== Produtos ================== -->
<div class="row">
	<?php
		$con = conecta("lojaPHP7");
		$sql = "SELECT * FROM produtos ORDER BY idproduto DESC";
		$result = $con->query($sql);

		if ($result->num_rows > 0) {
			while ($produto = $result->fetch_assoc()) {
	?>
				<div class="col-md-16 col-sm-16 col-lg-4">
					<div class="card">
						<img class="card-img-top" src="<?=BASE_URL . "/" . $produto["img"]?>" alt="Card image cap">
						<div class="card-body">
							<h4 class="card-title"><?=$produto["nome"]?></h4>
							<p class="card-text"><?=$produto["descricao"]?></p>
							<h2><?=formata_reais($produto["preco"])?></h2>
							<a href="carrinho.php?idproduto=<?=$produto["idproduto"]?>" class="btn btn-primary">Adicionar ao carrinho</a>
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