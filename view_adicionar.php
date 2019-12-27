<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/stylesheet.css">
	<title>Adicionar Produtos</title>
</head>
<body>
	<div class="listar">
		<div class="titulo-lista">
			<h2>Adicionar produtos</h2>
		</div>
		<div id="adicionar">
			<form action="adicionar.php" method="POST">
				<div>
					<label for="nome">Nome:</label>
				</div>
				<div>
					<input type="text" name="nome" id="nome" autocomplete="off" required />
				</div>

				<div>
					<label for="preco">Preço R$:</label>
				</div>
				<div>
					<input type="number" step="any" name="preco" id="preco" autocomplete="off" required />
				</div>
				
				<div id="ajuste">
					<button type="submit" class="btn esquerda">Enviar</button>
					<a href="index.php" class="btn direita">Voltar</a>
				</div>
			</form>
		</div>
	</div>
</body>
</html>