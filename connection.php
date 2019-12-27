<?php

$conn = new mysqli('localhost', 'root', '1234', 'crud');

if ($conn->connect_errno){
    die('Falha ao conectar no banco: (' .$conn->connect_errno. ')' .$conn->connect_error);
}
else
{
	/*echo "Conexão realizada com sucesso! <br>";*/
} 

return $conn;