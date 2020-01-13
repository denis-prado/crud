/* erro caching sha2 password */

alter user 'meuusuario'@'localhost' identified with mysql_native_password by 'minhasenha';

CREATE DATABASE crud;

CREATE TABLE produtos
	(
		codigo	INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
		nome	VARCHAR(60),
		preco	DECIMAL(4,2)

	);
	

