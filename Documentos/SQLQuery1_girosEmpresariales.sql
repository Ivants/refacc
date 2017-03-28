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

	
	   -- Se visualizan los datos, cada empresa con su tipo de giro empresarial
	   
	   SELECT Tipo.Tipo, SubTipo.Subtipo, Estandar.NombreEmpresa
       FROM Tipo
       INNER JOIN SubTipo
       on SubTipo.Tipo_idTipo = Tipo.idTipo
       INNER JOIN Estandar 
       on Estandar.SubTipo_idSubTipo = SubTipo.idSubTipo
	   