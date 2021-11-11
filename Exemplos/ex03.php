<?php
	require "docs/header.php";
	require "docs/nav.php";

    $periodo = "";
    $hora = date("H");
    $minutos = date("i");
    if ($hora > 7 && $hora < 18) {
        $periodo = "Boa tarde";
    }
    else {
        $periodo = "Bora pra casa";
    }
?>

<h4>Olá, <?=$periodo?>. Hora certa: <?=$hora?>h<?=$minutos?>.</h4>

<h2>POST</h2>

<form action="recebe_produto.php" method="post">
    <div>
        <select name="produtos" id="">
            <option value="Notebook HP">Notebook HP</option>
            <option value="Impressora Elgin">Impressora Elgin</option>
            <option value="Nobreak SMS Manager">Nobreak SMS Manager</option>
        </select>
    </div>
    <div>
        <button style="margin-top: 2vh">Confirmar</button>
    </div>
</form>

<hr>

<?php
	// Criptografia
	require "src/funcoes.php"   ;

    titulo("Criptografia");

    $senha = $_POST["senha"] ?? "";
    $senha_cripto = $senha == "" ? "" : password_hash($senha, PASSWORD_BCRYPT);

    if (password_verify("1234", $senha_cripto)) {
        $confere_senha = true;
    }
    else {
        $confere_senha = false;
    }
?>

<form action="" method="post">
    <div>
        <input type="password" name="senha" placeholder="Tente: 1234" />
        <button>Enviar</button>
    </div>
</form>

<div>
    <p><em><?=$senha_cripto?></em></p>
    <p><?=$confere_senha ? "Senha ok!" : "Senha não confere"?></p>
</div>

<?php
    titulo("Tratamento dos campos do formulário");

    // Slashes
    {
        $empresa = "Domino's";
        echo $empresa;
        echo "<br>";
        echo filter_var($empresa, FILTER_SANITIZE_ADD_SLASHES);
        echo "<hr>";
    }

    // HTML Tags
    {
        $input = "<b>PHP 7</b>";
        echo $input;
        echo "<br>";
        echo strip_tags($input);
        echo "<hr>";
    }

    // E-mail validation
    {
        $email_teste = "teste@impacta.com.br";
        echo $email_teste;
        echo "<br>";

        if (filter_var($email_teste, FILTER_VALIDATE_EMAIL)) {
            echo "Temos um e-mail válido!";
        }
        else {
            echo "Este não é um e-mail válido!";
        }
        echo "<hr>";
    }

    // Space remove
    {
        $cidade = " Rio de Janeiro ";
        echo $cidade;
        echo "<br>";
        echo trim($cidade);
        echo "<hr>";
    }
?>

<?php
	require "docs/footer.php";
?>