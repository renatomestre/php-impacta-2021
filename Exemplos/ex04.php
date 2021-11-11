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
        echo $index;
        echo "<p>{$valor[0]}: {$valor[1]}</p>";
    }
?>

<?php

?>

<?php
	require "docs/footer.php";
?>