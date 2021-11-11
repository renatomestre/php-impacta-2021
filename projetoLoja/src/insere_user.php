<?php
    $senha_cripto = $_POST["senha"] == "" ? "" : password_hash($_POST["senha"], PASSWORD_BCRYPT);

    var_dump($_POST);
    echo $senha_cripto;
?>