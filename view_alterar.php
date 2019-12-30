<?php

$conn = require('connection.php');

$menssagem = "";

if ($_GET){

	$id = $_GET['alt'];

	$sql = 'SELECT * FROM produtos WHERE id = ?';

	$stmt = $conn->prepare($sql);
	$stmt->bind_param('i', $id);
	$stmt->execute();

	$result = $stmt->get_result();

	$busca = $result->fetch_array(MYSQLI_ASSOC);

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
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/stylesheet.css">
	<title>Alteração de item</title>
</head>
<body>
	<div class="listar">
		<div class="titulo-lista">
			<h2>Alteração de item</h2>
		</div>
		<table>
			<tr>
				<th>#</th>
				<th>Nome</th>
				<th>Preço R$</th>
				<th>Ação</th>
			</tr>
			<tr>
				<form action="alterar.php" method="POST">
					<td><input class="input" type="number" name="id" value="<?php echo $busca['id'] ?>" readonly="true" /></p></td>

					<td><input class="input" type="text" name="nome" value="<?php echo $busca['nome'] ?>" autocomplete="off" /></td>

					<td><input class="input" type="number" step="any"  name="preco" value="<?php echo $busca['preco'] ?>" autocomplete="off" /></td>

					<td><input class="alterar" type="submit" value="Alterar"></td>
				</form>
			</tr>
		</table>
		<div class="grupo-btn">
			<a class="btn esquerda" href="view_listar.php">Voltar</a>
		</div>
	</div>

	<?php
		echo $menssagem;
	?>

</body>
</html>