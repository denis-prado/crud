<?php

$conn = require('connection.php');

if($_POST){

	$id = $_POST['codigo'];
	$nome = $_POST['nome'];
	$preco = $_POST['preco'];

	$menssagem = "";

	if(empty($id)==false && empty($nome)==false && empty($preco)==false)
	{
		$sql = 'UPDATE produtos SET nome=?, preco=? WHERE codigo=?';

		$stmt = $conn->prepare($sql);
		$stmt->bind_param('sdi', $nome, $preco, $id);
		$stmt->execute();

		$menssagem .= "<div class='sucesso'>";
		$menssagem .= "<h2>Dados alterados com sucesso!</h2>";

		$menssagem .= "<div class='menssagem-sucesso'>";
		$menssagem .= "<ul>";
		$menssagem .= "<li>Nome: <strong>".$nome."</strong></li>";
		$menssagem .= "<li>Preço <strong>R$ ".number_format($preco, 2, ',', '.')."</strong></li>";
		$menssagem .= "</ul>";
		$menssagem .= "</div>";

		$menssagem .= "<div class='rodape'>";
		$menssagem .= "<a class='btn' href='view_listar.php'>Ok</a>";
		$menssagem .= "</div>";
		$menssagem .= "</div>";

		$stmt->close();
	}
	else
	{
		$menssagem .= "<div class='erro'>";
		$menssagem .= "<h2>Erro</h2>";
		$menssagem .= "<div class='menssagem-erro'>";
		$menssagem .= "<strong>Por favor volte e verifique as informações!</strong>";
		$menssagem .= "</div>";
		$menssagem .= "<div class='rodape'>";
		$menssagem .= "<a class='btn' href='view_listar.php'>Ok</a>";
		$menssagem .= "</div>";
		$menssagem .= "</div>";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/stylesheet.css">
	<title>Confirmação de alteração</title>
</head>
<body>
	<?php 
		echo $menssagem;
	?>
</body>
</html>