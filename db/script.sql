-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema Taller
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema Taller
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Taller` DEFAULT CHARACTER SET latin1 ;
USE `Taller` ;

-- -----------------------------------------------------
-- Table `Taller`.`Cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Taller`.`Cliente` (
  `DNI` VARCHAR(50) NOT NULL,
  `Nombre` VARCHAR(255) NOT NULL,
  `Apellido` VARCHAR(255) NOT NULL,
  `Dirección` VARCHAR(255) NULL DEFAULT NULL,
  `Teléfono` VARCHAR(20) NULL DEFAULT NULL,
  PRIMARY KEY (`DNI`),
  UNIQUE INDEX `Nombre_Completo` (`Apellido` ASC, `Nombre` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `Taller`.`Empleado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Taller`.`Empleado` (
  `ID_Empleado` INT(11) NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(255) NOT NULL,
  `Apellidos` VARCHAR(255) NOT NULL,
  `Direccion` VARCHAR(255) NULL DEFAULT NULL,
  `Telefono` VARCHAR(20) NULL DEFAULT NULL,
  `Libre` TINYINT(1) NULL DEFAULT '1',
  `Puesto` VARCHAR(20) NULL DEFAULT NULL,
  `Correo` VARCHAR(255) NOT NULL,
  `Pass` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`ID_Empleado`),
  UNIQUE INDEX `Nombre_Completo` (`Apellidos` ASC, `Nombre` ASC),
  UNIQUE INDEX `Correo` (`Correo` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 1864240
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `Taller`.`Vehiculo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Taller`.`Vehiculo` (
  `Matricula` VARCHAR(50) NOT NULL,
  `FK_DNI` VARCHAR(50) NOT NULL,
  `Modelo` VARCHAR(50) NOT NULL,
  `Color` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`Matricula`),
  INDEX `FK_DNI` (`FK_DNI` ASC),
  CONSTRAINT `Vehiculo_ibfk_1`
    FOREIGN KEY (`FK_DNI`)
    REFERENCES `Taller`.`Cliente` (`DNI`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `Taller`.`Reparacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Taller`.`Reparacion` (
  `ID_Reparacion` INT(11) NOT NULL AUTO_INCREMENT,
  `FK_Matricula` VARCHAR(50) NOT NULL,
  `Fecha_Entrada` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `Fecha_Salida` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`ID_Reparacion`),
  INDEX `FK_Matricula` (`FK_Matricula` ASC),
  CONSTRAINT `Reparacion_ibfk_1`
    FOREIGN KEY (`FK_Matricula`)
    REFERENCES `Taller`.`Vehiculo` (`Matricula`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `Taller`.`Factura`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Taller`.`Factura` (
  `ID_Reparacion` INT(11) NOT NULL,
  `Total_Refacciones` DECIMAL(6,2) NULL DEFAULT NULL,
  `Total_Mano_obra` DECIMAL(6,2) NULL DEFAULT NULL,
  `Total` DECIMAL(6,2) NULL DEFAULT NULL,
  PRIMARY KEY (`ID_Reparacion`),
  CONSTRAINT `FK_Reparacion`
    FOREIGN KEY (`ID_Reparacion`)
    REFERENCES `Taller`.`Reparacion` (`ID_Reparacion`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `Taller`.`Refacciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Taller`.`Refacciones` (
  `Codigo_R` INT(11) NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(50) NULL DEFAULT NULL,
  `Precio` DECIMAL(6,2) NULL DEFAULT NULL,
  PRIMARY KEY (`Codigo_R`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `Taller`.`Hoja_Parte`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Taller`.`Hoja_Parte` (
  `Codigo_H` INT(11) NOT NULL AUTO_INCREMENT,
  `FK_Refaccion` INT(11) NULL DEFAULT NULL,
  `FK_Reparacion` INT(11) NULL DEFAULT NULL,
  `Precio_Unitario` DECIMAL(6,2) NULL DEFAULT NULL,
  `Precio_Total` DECIMAL(6,2) NULL DEFAULT NULL,
  PRIMARY KEY (`Codigo_H`),
  INDEX `FK_Refaccion` (`FK_Refaccion` ASC),
  INDEX `FK_Reparacion` (`FK_Reparacion` ASC),
  CONSTRAINT `Hoja_Parte_ibfk_1`
    FOREIGN KEY (`FK_Refaccion`)
    REFERENCES `Taller`.`Refacciones` (`Codigo_R`),
  CONSTRAINT `Hoja_Parte_ibfk_2`
    FOREIGN KEY (`FK_Reparacion`)
    REFERENCES `Taller`.`Reparacion` (`ID_Reparacion`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `Taller`.`Mecanicos_Proyecto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Taller`.`Mecanicos_Proyecto` (
  `ID_Mecanicos` INT(11) NOT NULL AUTO_INCREMENT,
  `FK_Mecanico` INT(11) NOT NULL,
  `FK_Reparacion` INT(11) NOT NULL,
  PRIMARY KEY (`ID_Mecanicos`),
  INDEX `FK_Mecanico` (`FK_Mecanico` ASC),
  INDEX `FK_Reparacion` (`FK_Reparacion` ASC),
  CONSTRAINT `Mecanicos_Proyecto_ibfk_1`
    FOREIGN KEY (`FK_Mecanico`)
    REFERENCES `Taller`.`Empleado` (`ID_Empleado`),
  CONSTRAINT `Mecanicos_Proyecto_ibfk_2`
    FOREIGN KEY (`FK_Reparacion`)
    REFERENCES `Taller`.`Reparacion` (`ID_Reparacion`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

USE `Taller`;

DELIMITER $$
USE `Taller`$$
CREATE
DEFINER=`root`@`localhost`
TRIGGER `Taller`.`defaultPass`
BEFORE INSERT ON `Taller`.`Empleado`
FOR EACH ROW
SET NEW.Pass = IFNULL(NEW.Pass, CONCAT(LEFT(NEW.Nombre, 3), RIGHT(NEW.Telefono, 4)))$$


DELIMITER ;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
