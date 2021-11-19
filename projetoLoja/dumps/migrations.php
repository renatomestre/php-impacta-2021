<?php
	$con = new mysqli("localhost", "root", "", "lojaphp7");

	if ($con->connect_error) {
		die("<p>Ops! Estamos com problemas.</p>");
	}
	else {
		echo "Conectou =)";
	}

	mysqli_query($con,
		'CREATE TABLE IF NOT EXISTS produtos
		(
			idproduto INT PRIMARY KEY AUTO_INCREMENT,
			nome VARCHAR (80) NOT NULL,
			descricao VARCHAR (255),
			preco DECIMAL (11,2) NOT NULL,
			img VARCHAR (80) NULL
		)'
	);

	echo "Criou tabela produtos";

	mysqli_query($con,
		'CREATE TABLE IF NOT EXISTS clientes
		(
			idcliente INT PRIMARY KEY AUTO_INCREMENT,
			nome VARCHAR (80) NOT NULL,
			email VARCHAR (80),
			telefone VARCHAR (80) NOT NULL,
			tipo_profissao VARCHAR (80) NOT NULL,
			senha VARCHAR (255) NOT NULL
		)'
	);

	echo "Criou tabela clientes";

	// {
	//     require "produtos_array.php";
		
	//     $values = "";
	//     $insert = "INSERT INTO produtos VALUES";
		
	//     foreach ($produtos as $item) {
	//         $prod = (object)$item;
	//         $values = "(NULL,
	//         '$prod->nome', '$prod->descricao', '$prod->preco', '$prod->img')
	//         ";
	//         mysqli_query($con, $insert . $values);
	//     }
	// }

	mysqli_query($con,
		'CREATE TABLE IF NOT EXISTS compras
		(
			idcompra INT PRIMARY KEY AUTO_INCREMENT,
			idcliente INT NOT NULL,
			idproduto INT NOT NULL,
			datahora DATETIME NOT NULL,
			qtd INT,
			valor DECIMAL (11,2) NOT NULL,
			statuscompra VARCHAR (80) NOT NULL
		)'
	);

	echo "Criou tabela compras";
?>