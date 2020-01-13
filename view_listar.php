<?php

$conn = require('connection.php');

$sql = 'SELECT * FROM produtos';

$stmt = $conn->prepare($sql);
$stmt->execute();

$busca = $stmt->get_result();

$produtos = $busca->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/stylesheet.css">
	<title>Listagem de Produtos</title>
</head>
<body>
	<div class="listar">
		<div class="titulo-lista">
			<h2>Produtos</h2>
		</div>
		<table>
			<tr>
				<th><p>#</p></th>
				<th><p>Nome</p></th>
				<th><p>Preço R$</p></th>
				<th><p>Ação</p></th>
			</tr>
 
			<?php foreach ($produtos as $produto) { ?>
			<tr>
				<td><p class="id"><?php echo $produto['codigo'] ?></p></td>
				<td><?php echo $produto['nome'] ?></td>
				<td><?php echo number_format($produto['preco'], 2, ',', '.') ?></td>
				<td><a class="alterar" href="view_alterar.php?alt=<?php echo $produto['id']; ?>">Alterar</a><a class="excluir" href="delete.php?del=<?php echo $produto['id']; ?>">Excluir</a></td>
			</tr>
			<?php } ?>
		</table>
		<div class="grupo-btn">
			<a class="btn esquerda" href="index.php">Voltar</a>
		</div>
	</div>
</body>
</html>