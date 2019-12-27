<?php

$conn = require('connection.php');

if($_POST){

	$id = $_POST['id'];
	$nome = $_POST['nome'];
	$preco = $_POST['preco'];

	$sql = 'UPDATE produtos SET nome=?, preco=? WHERE id=?';

	$stmt = $conn->prepare($sql);
	$stmt->bind_param('sdi', $nome, $preco, $id);
	$stmt->execute();

	header('location: index.php');
	$stmt->close();
}

