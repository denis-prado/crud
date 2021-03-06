<?php

if ($_POST)
{
	$conn = require('connection.php');

	$nome = $_POST['nome'];
	$preco = $_POST['preco'];

	if ($preco > 0){

		$menssagem = "";

		$sql = 'INSERT INTO produtos (nome, preco) VALUES ( ?, ?)';

		$stmt = $conn->prepare($sql);
		$stmt->bind_param('sd', $nome, $preco);
		$stmt->execute();

		$menssagem .= "<div class='sucesso'>";
		$menssagem .= "<h2>Dados inseridos com sucesso!</h2>";

		$menssagem .= "<div class='menssagem-sucesso'>";
		$menssagem .= "<ul>";
		$menssagem .= "<li>Nome: <strong>".$nome."</strong></li>";
		$menssagem .= "<li>Preço <strong>R$ ".number_format($preco, 2, ',', '.')."</strong></li>";
		$menssagem .= "</ul>";
		$menssagem .= "</div>";

		$menssagem .= "<div class='rodape'>";
		$menssagem .= "<a class='btn' href='view_adicionar.php'>Ok</a>";
		$menssagem .= "</div>";
		$menssagem .= "</div>";

		$stmt->close();
	}
	else {
		$menssagem .= "<div class='erro'>";
		$menssagem .= "<h2>Erro ao inserir os dados!</h2>";
		$menssagem .= "<div class='menssagem-erro'>";
		$menssagem .= "<p>Erro: <strong>".$preco."</strong> (Preço R$) incorreto</p>";
		$menssagem .= "</div>";

		$menssagem .= "<div class='rodape'>";
		$menssagem .= "<a class='btn' href='view_adicionar.php'>Ok</a>";
		$menssagem .= "</div>";
		$menssagem .= "</div>";
	}
}
else
{
	$menssagem .= "<div class='erro'>";
	$menssagem .= "<h2>Erro ao inserir os dados!</h2>";
	$menssagem .= "<div class='menssagem-erro'>";
	$menssagem .= "<strong>Formulário preenchido de forma incorreta</strong>";
	$menssagem .= "</div>";
	$menssagem .= "</div>";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/stylesheet.css">
	<title>Inserção de dados</title>
</head>
<body>
	<?php
		echo $menssagem;
	?>
	
</body>
</html>