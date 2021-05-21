DROP DATABASE IF EXISTS buffet;
CREATE DATABASE buffet;
USE buffet;

DROP TABLE IF EXISTS usuarios;
CREATE TABLE usuarios (
	id INT AUTO_INCREMENT,
	nombre VARCHAR(250) NOT NULL,
	apellido VARCHAR(250) NOT NULL,
	documento_tipo VARCHAR(250) NOT NULL,
	documento_numero VARCHAR(250) NOT NULL,
	usuario VARCHAR(250) NOT NULL,
	clave VARCHAR(250) NOT NULL,
	fecha_creacion DATE NOT NULL,
	PRIMARY KEY (id)
); ALTER TABLE usuarios CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;

INSERT INTO usuarios (nombre,apellido,documento_tipo,documento_numero,usuario,clave,fecha_creacion) VALUES 
('Juan','Maldonado','PEP','955948708101993','admin','e1f2e2d4f6598c43c2a45d2bd3acb7be','2021-05-20');