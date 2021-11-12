<?php
	require "docs/header.php";
	require "docs/nav.php";
	
    require "src/funcoes.php";

    titulo("Consumindo arrays");

    $animais = [
        ["Leão", "África"],
        ["Pinguin", "Alaska"],
        ["Onça", "Brasil"]
    ];

    foreach ($animais as $index => $valor) {
        echo "<p>[$index] {$valor[0]}: {$valor[1]}</p>";
    }
?>

<?php
    titulo("Upload de arquivos");

?>

<form action="upload.php" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend>Escolha uma imagem</legend>
        <input type="file" name="foto" />
        <button>Carregar</button>
    </fieldset>
</form>

<?php
	require "docs/footer.php";
?>