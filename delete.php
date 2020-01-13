<?php

$conn = require('connection.php');

if ($_GET){
	$id = $_GET['del'];

	$sql = 'DELETE FROM produtos WHERE codigo = ?';

	$stmt = $conn->prepare($sql);
	$stmt->bind_param('i', $id);
	$stmt->execute();

	$stmt->close();

	header('location: view_listar.php');
}