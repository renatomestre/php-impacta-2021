<?php
	require "docs/header.php";
	require "docs/nav.php";

    $imagem = "../projetoLoja/imgs/";
    switch ($_POST["produtos"]) {
        case 'Notebook HP':
                $imagem .= "notebook-hp.jpg";
                $valor = 6939.28;
            break;
            case 'Impressora Elgin':
                $imagem .= "Impressora-elgin.png";
                $valor = 962.3;
            break;
        case 'Nobreak SMS Manager':
                $imagem .= "Nobreak-SMS.jpg";
                $valor = 598.0;
                break;
    }
?>

<h2>Conheça nossos produtos</h2>

<p>Você escolheu....</p>

<div>
    <h3><?=$_POST["produtos"] ?? ""?> - Por apenas R$ <?=number_format($valor,2,',','.')?></h3>
    <img src="<?=$imagem?>" width="120">
</div>

<?php
	require "docs/footer.php";
?>