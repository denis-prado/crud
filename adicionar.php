<?php

if ($_POST)
{
	$conn = require('connection.php');

	$nome = $_POST['nome'];
	$preco = $_POST['preco'];

	$menssagem = "";

	$sql = 'INSERT INTO produtos (nome, preco) VALUES ( ?, ?)';

	$stmt = $conn->prepare($sql);
	$stmt->bind_param('sd', $nome, $preco);
	$stmt->execute();

	$menssagem .= "<div class='sucesso'>";
	$menssagem .= "<h2>Dados inseridos com sucesso!</h2>";

	$menssagem .= "<div class='conteudo-sucesso'>";
	$menssagem .= "<ul>";
	$menssagem .= "<li>Nome: <strong>".$nome."</strong></li>";
	$menssagem .= "<li>Preço <strong>R$ ".number_format($preco, 2, ',', '.')."</strong></li>";
	$menssagem .= "</ul>";
	$menssagem .= "</div>";

	$menssagem .= "<div class=''>";
	$menssagem .= "<a class='btn-2' href='index.php'>Ok</a>";
	$menssagem .= "</div>";

	$stmt->close();
}
else
{
	$menssagem .= "<div class='erro'>";
	$menssagem .= "<h2>Erro ao inserir os dados!</h2>";
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