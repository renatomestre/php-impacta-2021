<?php
    $arquivo = $_FILES["foto"];

    if ($arquivo["error"] <> 0) {
        echo "Erro ao carregar o arquivo";
        return;
    }

    $formato_permitido = "image/jpeg";

    if ($arquivo["type"] != $formato_permitido) {
        echo "Formato não suportado. Utilize $formato_permitido.";
    } else {
        $imagem = $arquivo["name"];
        $path = "upload";

        if (move_uploaded_file($arquivo["tmp_name"], "$path/$imagem")) {
            echo "<h4>Imagem carregada com sucesso!</h4>";
            echo "<img src='". "$path/$imagem" ."' width='400' />";
        }
    }
?>