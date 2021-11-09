<?php require("docs/header.php") ?>
<?php require("docs/nav.php") ?>

<div class="container mt-5 pt-5">
	<h2 class="text-center">Cadastro</h2>
	
	<form action="" method="post" id="form_cadastro" class="w-50 mx-auto">
		<fieldset>
			<legend class="text-center">Preencha seus dados corretamente</legend>

			<ul class="list-unstyled">
				<li>
					<input type="text" name="nome" placeholder="Nome completo" class="form-control mmb-2" required />
				</li>
				<li>
					<button class="btn btn-info p-2 mt-2">Confirmar</button>
				</li>
			</ul>
		</fieldset>
	</form>
</div>

<?php require("docs/footer.php") ?>