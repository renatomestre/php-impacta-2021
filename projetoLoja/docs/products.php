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
						<img class="card-img-top" src="<?=$produto["img"]?>" alt="Card image cap">
						<div class="card-body">
							<h4 class="card-title"><?=$produto["nome"]?></h4>
							<p class="card-text"><?=$produto["descricao"]?></p>
							<h2><?=formata_reais($produto["preco"])?></h2>
							<a href="#" class="btn btn-primary">Adicionar ao carrinho</a>
						</div>
					</div>
				</div>
	<?php
			}
		}

		desconecta($con);
	?>
<!--
	<div class="col-md-16 col-sm-16 col-lg-4">
		<div class="card">
			<img class="card-img-top" src="imgs/notebook-hp.jpg" alt="Card image cap">
			<div class="card-body">
				<h4 class="card-title">Notebook HP</h4>
				<p class="card-text">Notebook HP i7-6600U 8GB 256GB SSD 14 Polegadas 1AB02LA</p>
				<h2>R$6.939,28</h2>
				<a href="#" class="btn btn-primary">Adicionar ao carrinho</a>
			</div>
		</div>
	</div>
	<div class="col-md-16 col-sm-16 col-lg-4">
		<div class="card">
			<img class="card-img-top" src="imgs/macbookpro-15.jpg" alt="Card image cap">
			<div class="card-body">
				<h4 class="card-title">MacBook Pro</h4>
				<p class="card-text">MacBook Pro 15.4 Polegadas Touch Bar (MLW72BZA) - Prateado</p>
				<h2> R$15.233,40</h2>
				<a href="#" class="btn btn-primary">Adicionar ao carrinho</a>
			</div>
		</div>
	</div>
	<div class="col-md-16 col-sm-16 col-lg-4">
		<div class="card">
			<img class="card-img-top" src="imgs/impressora-epson.jpg" alt="Card image cap">
			<div class="card-body">
				<h4 class="card-title">Scanner Epson</h4>
				<p class="card-text">Scanner Epson Workforce ES-400 Duplex 35PPM ADF B11B226201</p>
				<h2>R$2.012,40</h2>
				<a href="#" class="btn btn-primary">Adicionar ao carrinho</a>
			</div>
		</div>
	</div>
	<div class="col-md-16 col-sm-16 col-lg-4">
		<div class="card">
			<img class="card-img-top" src="imgs/tablet-hp.jpg" alt="Card image cap">
			<div class="card-body">
				<h4 class="card-title">Tablet HP</h4>
				<p class="card-text">Tablet HP Inc 12.5in LED in Core i5-4302Y 4GB SSD 256GB com teclado P7Q24LA</p>
				<h2>R$4.772,50</h2>
				<a href="#" class="btn btn-primary">Adicionar ao carrinho</a>
			</div>
		</div>
	</div>
	<div class="col-md-16 col-sm-16 col-lg-4">
		<div class="card">
			<img class="card-img-top" src="imgs/placa_de_video.png" alt="Card image cap">
			<div class="card-body">
				<h4 class="card-title">Gigabyte GeForce GTX 1060</h4>
				<p class="card-text">Placa de Video Gigabyte GeForce GTX 1060 G1 Gaming 6GB (GV-N1060G1GAMING-6GD)</p>
				<h2>R$1.379,00</h2>
				<a href="#" class="btn btn-primary">Adicionar ao carrinho</a>
			</div>
		</div>
	</div>
	<div class="col-md-16 col-sm-16 col-lg-4">
		<div class="card">
			<img class="card-img-top" src="imgs/Nobreak-SMS.jpg" alt="Card image cap">
			<div class="card-body">
				<h4 class="card-title">Nobreak SMS Manager</h4>
				<p class="card-text">Nobreak SMS Manager NET4+ SMS 1400VA 220V 5 Tomadas 27289</p>
				<h2>R$598,00</h2>
				<a href="#" class="btn btn-primary">Adicionar ao carrinho</a>
			</div>
		</div>
	</div>
	<div class="col-md-16 col-sm-16 col-lg-4">
		<div class="card">
			<img class="card-img-top" src="imgs/Impressora-elgin.png" alt="Card image cap">
			<div class="card-body">
				<h4 class="card-title">Impressora Elgin</h4>
				<p class="card-text">Impressora Elgin L42 Impressora Codigo de Barras USB (Corp) (outletinfo)</p>
				<h2>R$962,30</h2>
				<a href="#" class="btn btn-primary">Adicionar ao carrinho</a>
			</div>
		</div>
	</div>
	<div class="col-md-16 col-sm-16 col-lg-4">
		<div class="card">
			<img class="card-img-top" src="imgs/Computador-lenovo.jpg" alt="Card image cap">
			<div class="card-body">
				<h4 class="card-title">Computador Lenovo</h4>
				<p class="card-text">Computador Lenovo Intel i3-4130 8GB HD 1TB Win 10 Pro</p>
				<h2>R$2.676,19</h2>
				<a href="#" class="btn btn-primary">Adicionar ao carrinho</a>
			</div>
		</div>
	</div>
-->
</div>
<!-- =============== Fim dos Produtos ================== -->