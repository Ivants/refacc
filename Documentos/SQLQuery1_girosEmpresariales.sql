DROP DATABASE IF EXISTS erp;
CREATE DATABASE erp;
USE erp;
-- En esta tabla se establecen los principales giros empresariales
CREATE TABLE Tipo (
  idTipo INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
  Tipo VARCHAR(20));

-- Se insertan los 3 tipos principales encontrados en nuestra investigacion
	INSERT INTO Tipo VALUES (NULL,'Industrial');
	INSERT INTO Tipo VALUES (NULL,'Comercial');
	INSERT INTO Tipo VALUES (NULL,'Servicio');
	


-- En esta tabla se establecen los subtipos de los giros empresariales
CREATE TABLE SubTipo (
  idSubTipo INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
  Tipo_idTipo INTEGER   ,
  Subtipo VARCHAR(20)      ,
  FOREIGN KEY(Tipo_idTipo)
	REFERENCES Tipo(idTipo));
	

	-- Subtipos del tipo industrial
	INSERT INTO SubTipo VALUES (NULL,1,'manofactura');
	INSERT INTO SubTipo VALUES (NULL,1,'extractiva');
	INSERT INTO SubTipo VALUES (NULL,1,'agropecuaria');
	-- Subtipos del tipo comercial
	INSERT INTO SubTipo VALUES (NULL,2,'mayoristas');
	INSERT INTO SubTipo VALUES (NULL,2,'minoristas');
	INSERT INTO SubTipo VALUES (NULL,2,'comisionistas');
	-- Subtipos del tipo Servicio
	INSERT INTO SubTipo VALUES (NULL,3,'Transporte');
	INSERT INTO SubTipo VALUES (NULL,3,'Turismo');
	INSERT INTO SubTipo VALUES (NULL,3,'Inst. financiera');
	INSERT INTO SubTipo VALUES (NULL,3,'Servicios publicos');
	INSERT INTO SubTipo VALUES (NULL,3,'Servicios prof.');
	INSERT INTO SubTipo VALUES (NULL,3,'Educacion');
	INSERT INTO SubTipo VALUES (NULL,3,'Comunicacion');
	INSERT INTO SubTipo VALUES (NULL,3,'Salud');


-- Se crea la tabla estandar que todos los usuarios tendran en un principo para despues agregar más tablas de acuerdo a sus necesidades
CREATE TABLE Estandar (
  idEstandar INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY  ,
  Tipo_idTipo INTEGER   ,
  SubTipo_idSubTipo INTEGER   ,
  NombreEmpresa VARCHAR(45)    ,
  Descripcion VARCHAR(45)    ,
  Telefono BIGINT    ,
  Direccion VARCHAR(255)    ,
  Horario DATETIME    ,
  Estado VARCHAR(45)    ,
  SitioWeb VARCHAR(45)      ,
  FOREIGN KEY(SubTipo_idSubTipo)
	REFERENCES SubTipo(idSubTipo),
  FOREIGN KEY(Tipo_idTipo)
	REFERENCES Tipo(idTipo));
	
	-- Agregamos 2 empresas, una del sector servicio-->Eduaccion y otra del sector comercial--
	INSERT INTO Estandar VALUES (NULL,3,12, 'Instituto iberia', 'Somos una buena escuela donde...',2457865,'42 norte','7:00','Puebla','www.esu.com');
	INSERT INTO Estandar VALUES (NULL,1,10, 'Abarrotes AC', 'Somos una tienda donde...',777775,'32 oriente','4:00','Tijuana','www.nnn.com');

-- Tabla de usuarios
	CREATE TABLE usuarios (
		usuario varchar(30) PRIMARY KEY NOT NULL,
		clave varchar(128) NOT NULL,
		nombre varchar(35) NOT NULL,
		correo varchar(50) NOT NULL,
		admin boolean NOT NULL DEFAULT 0
	);

	-- Administradores
	INSERT INTO `usuarios` (`usuario`, `clave`, `nombre`,`correo`,`admin`) VALUES ('ivan', '123', 'ivan', 'correo@correo.com', 1);
	INSERT INTO `usuarios` (`usuario`, `clave`, `nombre`,`correo`,`admin`) VALUES ('miguel', '123', 'miguel', 'correo@correo.com', 1);
	INSERT INTO `usuarios` (`usuario`, `clave`, `nombre`,`correo`,`admin`) VALUES ('victor', '123', 'victor', 'correo@correo.com', 1);
	INSERT INTO `usuarios` (`usuario`, `clave`, `nombre`,`correo`,`admin`) VALUES ('hector', '123', 'hector', 'correo@correo.com', 1);

	-- Usuarios mortales y normales
	INSERT INTO `usuarios` (`usuario`, `clave`, `nombre`,`correo`,`admin`) VALUES ('nancy', '123', 'nancy', 'correo@correo.com', 0);
	INSERT INTO `usuarios` (`usuario`, `clave`, `nombre`,`correo`,`admin`) VALUES ('esteff', '123', 'esteff', 'correo@correo.com', 0);
	INSERT INTO `usuarios` (`usuario`, `clave`, `nombre`,`correo`,`admin`) VALUES ('joce', '123', 'joce', 'correo@correo.com', 0);
	INSERT INTO `usuarios` (`usuario`, `clave`, `nombre`,`correo`,`admin`) VALUES ('mariano', '123', 'mariano', 'correo@correo.com', 0);


	-- Se visualizan los datos, cada empresa con su tipo de giro empresarial

	SELECT Tipo.Tipo, SubTipo.Subtipo, Estandar.NombreEmpresa
	FROM Tipo
	INNER JOIN SubTipo
	on SubTipo.Tipo_idTipo = Tipo.idTipo
	INNER JOIN Estandar 
	on Estandar.SubTipo_idSubTipo = SubTipo.idSubTipo
