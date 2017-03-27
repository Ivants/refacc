
-- En esta tabla se establecen los principales giros empresariales
CREATE TABLE Tipo (
  idTipo INTEGER,
  Tipo VARCHAR(20)      ,
PRIMARY KEY(idTipo));

-- Se insertan los 3 tipos principales encontrados en nuestra investigacion
	INSERT INTO Tipo VALUES (1,'Industrial')
	INSERT INTO Tipo VALUES (2,'Comercial')
	INSERT INTO Tipo VALUES (3,'Servicio')
	


--En esta tabla se establecen los subtipos de los giros empresariales
CREATE TABLE SubTipo (
  idSubTipo INTEGER  ,
  Tipo_idTipo INTEGER   ,
  Subtipo VARCHAR(20)      ,
PRIMARY KEY(idSubTipo)  ,
  FOREIGN KEY(Tipo_idTipo)
    REFERENCES Tipo(idTipo));
	

	-- Subtipos del tipo industrial
	INSERT INTO SubTipo VALUES (1,1,'manofactura')
	INSERT INTO SubTipo VALUES (2,1,'extractiva')
	INSERT INTO SubTipo VALUES (3,1,'agropecuaria')
	-- Subtipos del tipo comercial
	INSERT INTO SubTipo VALUES (4,2,'mayoristas')
	INSERT INTO SubTipo VALUES (5,2,'minoristas')
	INSERT INTO SubTipo VALUES (6,2,'comisionistas')
	--Subtipos del tipo Servicio
	INSERT INTO SubTipo VALUES (7,3,'Transporte')
	INSERT INTO SubTipo VALUES (8,3,'Turismo')
	INSERT INTO SubTipo VALUES (9,3,'Inst. financiera')
	INSERT INTO SubTipo VALUES (10,3,'Servicios publicos')
	INSERT INTO SubTipo VALUES (11,3,'Servicios prof.')
	INSERT INTO SubTipo VALUES (12,3,'Educacion')
	INSERT INTO SubTipo VALUES (13,3,'Comunicacion')
    INSERT INTO SubTipo VALUES (13,3,'Salud')


-- Se crea la tabla estandar que todos los usuarios tendran en un principo para despues agregar más tablas de acuerdo a sus necesidades
CREATE TABLE Estandar (
  idEstandar INTEGER   ,
  Tipo_idTipo INTEGER   ,
  SubTipo_idSubTipo INTEGER   ,
  NombreEmpresa VARCHAR(45)    ,
  Descripcion VARCHAR(45)    ,
  Telefono BIGINT    ,
  Direccion VARCHAR(255)    ,
  Horario DATETIME    ,
  Estado VARCHAR(45)    ,
  SitioWeb VARCHAR(45)      ,
PRIMARY KEY(idEstandar)    ,
  FOREIGN KEY(SubTipo_idSubTipo)
    REFERENCES SubTipo(idSubTipo),
  FOREIGN KEY(Tipo_idTipo)
    REFERENCES Tipo(idTipo));
	
	--- Agregamos 2 empresas, una del sector servicio-->Eduaccion y otra del sector comercial--
	INSERT INTO Estandar VALUES (1,3,12, 'Instituto iberia', 'Somos una buena escuela donde...',2457865,'42 norte','7:00','Puebla','www.esu.com')
	INSERT INTO Estandar VALUES (3,1,10, 'Abarrotes AC', 'Somos una tienda donde...',777775,'32 oriente','4:00','Tijuana','www.nnn.com')

	
	   --- Se visualizan los datos, cada empresa con su tipo de giro empresarial
	   
	   SELECT Tipo.Tipo, SubTipo.Subtipo, Estandar.NombreEmpresa
       FROM Tipo
       INNER JOIN SubTipo
       on SubTipo.Tipo_idTipo = Tipo.idTipo
       INNER JOIN Estandar 
       on Estandar.SubTipo_idSubTipo = SubTipo.idSubTipo
	   