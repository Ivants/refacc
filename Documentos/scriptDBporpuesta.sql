SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `GirosEmpresariales` ;
CREATE SCHEMA IF NOT EXISTS `GirosEmpresariales` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `GirosEmpresariales` ;

-- -----------------------------------------------------
-- Table `GirosEmpresariales`.`Administrador`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `GirosEmpresariales`.`Administrador` (
  `idAdministrador` INT NOT NULL AUTO_INCREMENT ,
  `Nombre` VARCHAR(45) NOT NULL ,
  `Correo` VARCHAR(45) NOT NULL ,
  `Telefono` BIGINT NOT NULL ,
  `Contrasena` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idAdministrador`) )
ENGINE = InnoDB;

CREATE UNIQUE INDEX `idAdministrador_UNIQUE` ON `GirosEmpresariales`.`Administrador` (`idAdministrador` ASC) ;


-- -----------------------------------------------------
-- Table `GirosEmpresariales`.`Salud`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `GirosEmpresariales`.`Salud` (
  `idSalud` INT NOT NULL AUTO_INCREMENT ,
  `Paciente` VARCHAR(45) NOT NULL ,
  `Padecimiento` VARCHAR(45) NOT NULL ,
  `Descripcion` VARCHAR(45) NOT NULL ,
  `NumeroSeguro` BIGINT NOT NULL ,
  `Provincia` VARCHAR(45) NOT NULL ,
  `Poblacion` VARCHAR(45) NOT NULL ,
  `Domicilio` VARCHAR(45) NOT NULL ,
  `Saludcol` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idSalud`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `GirosEmpresariales`.`Educacion`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `GirosEmpresariales`.`Educacion` (
  `idtable1` INT NOT NULL AUTO_INCREMENT ,
  `Alumno` VARCHAR(45) NOT NULL ,
  `Prefesor` VARCHAR(45) NOT NULL ,
  `Materia` VARCHAR(45) NOT NULL ,
  `seccion` VARCHAR(45) NOT NULL ,
  `Horario` DATETIME NOT NULL ,
  `Codigo` VARCHAR(45) NOT NULL ,
  `Descripcion` VARCHAR(45) NOT NULL ,
  `Calificaciones` INT NOT NULL ,
  `Educacioncol` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idtable1`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `GirosEmpresariales`.`Transporte`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `GirosEmpresariales`.`Transporte` (
  `idTransporte` INT NOT NULL AUTO_INCREMENT ,
  `TipoAuto` VARCHAR(45) NOT NULL ,
  `Numero` INT NULL ,
  `BaseImponiblel` VARCHAR(45) NULL ,
  `Descripcion` VARCHAR(45) NULL ,
  `KM actuales` INT NULL ,
  `Estado` VARCHAR(45) NULL ,
  `Chofer` VARCHAR(45) NULL ,
  `Combustible` VARCHAR(45) NULL ,
  `Mantenimiento` VARCHAR(45) NULL ,
  PRIMARY KEY (`idTransporte`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `GirosEmpresariales`.`SubtipoElegido`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `GirosEmpresariales`.`SubtipoElegido` (
  `idGiroEmpresarialElegido` INT NOT NULL AUTO_INCREMENT ,
  `ID_SubtipoElegido` INT NOT NULL ,
  `Salud_idSalud` INT NOT NULL ,
  `Educacion_idtable1` INT NOT NULL ,
  `Transporte_idTransporte` INT NOT NULL ,
  PRIMARY KEY (`idGiroEmpresarialElegido`) ,
  CONSTRAINT `fk_SubtipoElegido_Salud1`
    FOREIGN KEY (`Salud_idSalud` )
    REFERENCES `GirosEmpresariales`.`Salud` (`idSalud` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_SubtipoElegido_Educacion1`
    FOREIGN KEY (`Educacion_idtable1` )
    REFERENCES `GirosEmpresariales`.`Educacion` (`idtable1` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_SubtipoElegido_Transporte1`
    FOREIGN KEY (`Transporte_idTransporte` )
    REFERENCES `GirosEmpresariales`.`Transporte` (`idTransporte` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE UNIQUE INDEX `idGiroEmpresarialElegido_UNIQUE` ON `GirosEmpresariales`.`SubtipoElegido` (`idGiroEmpresarialElegido` ASC) ;

CREATE INDEX `fk_SubtipoElegido_Salud1_idx` ON `GirosEmpresariales`.`SubtipoElegido` (`Salud_idSalud` ASC) ;

CREATE INDEX `fk_SubtipoElegido_Educacion1_idx` ON `GirosEmpresariales`.`SubtipoElegido` (`Educacion_idtable1` ASC) ;

CREATE INDEX `fk_SubtipoElegido_Transporte1_idx` ON `GirosEmpresariales`.`SubtipoElegido` (`Transporte_idTransporte` ASC) ;


-- -----------------------------------------------------
-- Table `GirosEmpresariales`.`Subtipos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `GirosEmpresariales`.`Subtipos` (
  `idSubtipo` INT NOT NULL ,
  `Subtipo` VARCHAR(45) NOT NULL ,
  `SubtipoElegido_idGiroEmpresarialElegido` INT NOT NULL ,
  PRIMARY KEY (`idSubtipo`) ,
  CONSTRAINT `fk_Subtipos_SubtipoElegido1`
    FOREIGN KEY (`SubtipoElegido_idGiroEmpresarialElegido` )
    REFERENCES `GirosEmpresariales`.`SubtipoElegido` (`idGiroEmpresarialElegido` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_Subtipos_SubtipoElegido1_idx` ON `GirosEmpresariales`.`Subtipos` (`SubtipoElegido_idGiroEmpresarialElegido` ASC) ;

CREATE UNIQUE INDEX `idSubtipo_UNIQUE` ON `GirosEmpresariales`.`Subtipos` (`idSubtipo` ASC) ;


-- -----------------------------------------------------
-- Table `GirosEmpresariales`.`GiroEmpresarial`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `GirosEmpresariales`.`GiroEmpresarial` (
  `idGiroEmpresarial` INT NOT NULL AUTO_INCREMENT ,
  `Tipo` VARCHAR(45) NOT NULL ,
  `Subtipos_idSubtipo` INT NOT NULL ,
  PRIMARY KEY (`idGiroEmpresarial`) ,
  CONSTRAINT `fk_GiroEmpresarial_Subtipos1`
    FOREIGN KEY (`Subtipos_idSubtipo` )
    REFERENCES `GirosEmpresariales`.`Subtipos` (`idSubtipo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_GiroEmpresarial_Subtipos1_idx` ON `GirosEmpresariales`.`GiroEmpresarial` (`Subtipos_idSubtipo` ASC) ;

CREATE UNIQUE INDEX `idGiroEmpresarial_UNIQUE` ON `GirosEmpresariales`.`GiroEmpresarial` (`idGiroEmpresarial` ASC) ;


-- -----------------------------------------------------
-- Table `GirosEmpresariales`.`Empresa`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `GirosEmpresariales`.`Empresa` (
  `idEmpresa` INT NOT NULL AUTO_INCREMENT ,
  `NombreEmpresa` VARCHAR(45) NOT NULL ,
  `Descripcion` VARCHAR(45) NOT NULL ,
  `Direccion` VARCHAR(45) NOT NULL ,
  `sitioWeb` VARCHAR(45) NOT NULL ,
  `GiroEmpresarial_idGiroEmpresarial` INT NOT NULL ,
  `Administrador_idAdministrador` INT NOT NULL ,
  PRIMARY KEY (`idEmpresa`) ,
  CONSTRAINT `fk_Empresa_GiroEmpresarial1`
    FOREIGN KEY (`GiroEmpresarial_idGiroEmpresarial` )
    REFERENCES `GirosEmpresariales`.`GiroEmpresarial` (`idGiroEmpresarial` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Empresa_Administrador1`
    FOREIGN KEY (`Administrador_idAdministrador` )
    REFERENCES `GirosEmpresariales`.`Administrador` (`idAdministrador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_Empresa_GiroEmpresarial1_idx` ON `GirosEmpresariales`.`Empresa` (`GiroEmpresarial_idGiroEmpresarial` ASC) ;

CREATE INDEX `fk_Empresa_Administrador1_idx` ON `GirosEmpresariales`.`Empresa` (`Administrador_idAdministrador` ASC) ;

CREATE UNIQUE INDEX `idEmpresa_UNIQUE` ON `GirosEmpresariales`.`Empresa` (`idEmpresa` ASC) ;


-- -----------------------------------------------------
-- Table `GirosEmpresariales`.`Minoristas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `GirosEmpresariales`.`Minoristas` (
  `idMinoristas` INT NOT NULL AUTO_INCREMENT ,
  `Articulo` VARCHAR(45) NOT NULL ,
  `Cliente` VARCHAR(45) NOT NULL ,
  `Detalle` VARCHAR(45) NOT NULL ,
  `Factura` VARCHAR(45) NOT NULL ,
  `CodigoBarra` BIGINT NOT NULL ,
  `Precio` INT NOT NULL ,
  `Compra` INT NOT NULL ,
  `Venta` INT NOT NULL ,
  `NumeroProducto` INT NOT NULL ,
  `SubtipoElegido_idGiroEmpresarialElegido` INT NOT NULL ,
  PRIMARY KEY (`idMinoristas`) ,
  CONSTRAINT `fk_Minoristas_SubtipoElegido1`
    FOREIGN KEY (`SubtipoElegido_idGiroEmpresarialElegido` )
    REFERENCES `GirosEmpresariales`.`SubtipoElegido` (`idGiroEmpresarialElegido` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_Minoristas_SubtipoElegido1_idx` ON `GirosEmpresariales`.`Minoristas` (`SubtipoElegido_idGiroEmpresarialElegido` ASC) ;

USE `GirosEmpresariales` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;




