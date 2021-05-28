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


DROP TABLE IF EXISTS semanal;
CREATE TABLE semanal (
	id INT AUTO_INCREMENT,
	nombre VARCHAR(250) NOT NULL,
	precio FLOAT(11,2) NOT NULL,
	estatus VARCHAR(250) NOT NULL,
	fecha_creacion DATE NOT NULL,
	PRIMARY KEY (id)
); ALTER TABLE semanal CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;

INSERT INTO semanal (nombre,precio,estatus,fecha_creacion) VALUES 
('prueba1',2000.50,'Proceso','2021-05-24');

DROP TABLE IF EXISTS efectivos;
CREATE TABLE efectivos (
	id INT AUTO_INCREMENT,
	tipo VARCHAR(250) NOT NULL,
	concepto1 VARCHAR(250) NOT NULL,
	cantidad1 INT NOT NULL,
	valor1 INT NOT NULL,
	total1 INT NOT NULL,
	concepto2 VARCHAR(250) NOT NULL,
	cantidad2 INT NOT NULL,
	valor2 INT NOT NULL,
	total2 INT NOT NULL,
	concepto3 VARCHAR(250) NOT NULL,
	cantidad3 INT NOT NULL,
	valor3 INT NOT NULL,
	total3 INT NOT NULL,
	concepto4 VARCHAR(250) NOT NULL,
	cantidad4 INT NOT NULL,
	valor4 INT NOT NULL,
	total4 INT NOT NULL,
	concepto5 VARCHAR(250) NOT NULL,
	cantidad5 INT NOT NULL,
	valor5 INT NOT NULL,
	total5 INT NOT NULL,
	precio INT NOT NULL,
	total_todo INT NOT NULL,
	fecha_creacion DATE NOT NULL,
	PRIMARY KEY (id)
); ALTER TABLE efectivos CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;