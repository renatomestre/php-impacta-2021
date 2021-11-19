<!-- ======= MENU DO PROJETO ======== -->
<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
	<a class="navbar-brand" href="<?=BASE_URL?>/">
		<img src="<?=BASE_URL?>/imgs/logo-impacta.svg" width="120" height="30" class="d-inline-block align-top">
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="<?=BASE_URL?>/">Home</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?=BASE_URL?>/cadastro.php">Cadastre-se</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?=BASE_URL?>/carrinho.php">Carrinho de compras</a>
			</li>
		</ul>
		
		<?php if (isset($_SESSION["nome_user"])) { ?>
			<div class="navbar-text mr-2 text-nowrap">
				Olá, <?=$_SESSION["nome_user"] ?? "visitante"?>
			</div>
			<form class="form-inline mr-4" action="src/valida_user.php" method="post">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a href="src/valida_user.php" class="nav-link">Sair</a>
					</li>
				</ul>
			</form>
		<?php } else { ?>
			<ul class="navbar-nav mr-4">
				<li class="nav-item">
					<a href="#" data-toggle="modal" data-target="#modal-login" class="nav-link">Login</a>
				</li>
			</ul>
		<?php } ?>

		<div class="navbar-text text-nowrap">
			<b><i>Impacta Sales Tec</i></b>
		</div>
	</div>
</nav>
<!-- =============== FIM DO MENU =============== -->

<div class="modal fade" id="modal-login" role="dialog">
	<div class="modal-dialog modal-sm">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Identificação</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body font-weight-bold">
				<form action="src/valida_user.php" method="post">
					<fieldset>
						<ul class="list-unstyled">
							<li>
								<input type="text" name="login" placeholder="E-mail" class="form-control mb-2" required />
							</li>
							<li>
								<input type="password" name="senha" placeholder="Senha" class="form-control mb-2" required />
							</li>
							<button type="submit" class="btn btn-info p-2 mt-2">Entrar</button>
							</li>
						</ul>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>