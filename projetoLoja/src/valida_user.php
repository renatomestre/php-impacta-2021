<?php
	require "../docs/header.php";
	require "../docs/nav.php";

	$post = limpar_post($_POST);

	if (isset($post["login"]) && isset($post["senha"])) {
		$login = $post["login"];
		$senha = $post["senha"];

		$con = conecta("lojaphp7");
        {
            $sql = "SELECT * FROM clientes WHERE email = '{$login}'";
            $resultado = $con->query($sql);

            if ($resultado->num_rows > 0) {
                while ($cliente = $resultado->fetch_assoc()) {
                    if (password_verify($senha, $cliente["senha"])) {
                        $_SESSION["nome_user"] = $cliente["nome"];
                        $_SESSION["id_user"] = $cliente["idcliente"];
                        header("Location: " . BASE_URL);
                        return;
                    }
                }
            }
        }
		desconecta($con);
	}

    session_destroy();

    header("Location: " . BASE_URL);
?>

<?php
	require "../docs/footer.php";
?>