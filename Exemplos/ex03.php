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

<?php
	require "docs/footer.php";
?>