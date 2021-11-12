<?php
    function formata_reais (float $numero) {
        return "R$ " . number_format($numero, 2, ",", ".");
    }

    function limpar_post (array $post) : array {
        $post_limpo = [];

        foreach ($post as $index => $valor) {
            // SQL Injection prevention
            $post_limpo[$index] = filter_var($valor, FILTER_SANITIZE_ADD_SLASHES);

            // XSS prevention
            $post_limpo[$index] = strip_tags($post_limpo[$index]);

            $post_limpo[$index] = trim($post_limpo[$index]);
        }

        return $post_limpo;
    }

    $url = "http://localhost/PHP-Novembro-2021/projetoloja";

    function conecta ($db, $dns = "localhost", $user = "root", $pwd = "") {
        $con = mysqli_connect($dns, $user, $pwd, $db) or die("Estamos com problemas...");

        if ($con) {
            return $con;
            echo "Conexão feita com sucesso!";
        }
    }

    function desconecta ($con) {
        mysqli_close($con);
    }

    function titulo (string $nome) {
        echo "<h2>{$nome}</h2>";
    }
?>