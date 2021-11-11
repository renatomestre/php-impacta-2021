<?php require("docs/header.php") ?>
<?php require("docs/nav.php") ?>

<div class="container mt-5 pt-5">
	<h2 class="text-center">Cadastro</h2>
	
	<form action="src/insere_user.php" method="post" id="form_cadastro" class="shadow-lg p-4 bg-white w-50 mx-auto">
		<fieldset>
			<legend class="text-center">Preencha seus dados corretamente</legend>

			<ul class="list-unstyled">
				<li>
					<input type="text" name="nome" placeholder="Nome completo" class="form-control mb-2" required />
				</li>
				<li>
					<input type="email" name="email" placeholder="E-mail" class="form-control mb-2" required />
				</li>
				<li>
					<input type="text" name="telefone" placeholder="Celular ou telefone" class="form-control mb-2" required />
				</li>
				<li>
					<select name="tipo_profissao" class="form-control mb-2" required>
						<option value="">- Profissão -</option>
						<option value="empresa">CLT</option>
						<option value="prof_liberal">Profissional liberal</option>
						<option value="autonomo">Autônomo</option>
					</select>
				</li>
				<li>
					<input type="password" name="senha" placeholder="Crie sua senha" class="form-control mb-2" required />
				</li>
				<li>
					<button class="btn btn-info p-2 mt-2">Confirmar</button>
				</li>
			</ul>
		</fieldset>
	</form>
</div>

<?php require("docs/footer.php") ?>