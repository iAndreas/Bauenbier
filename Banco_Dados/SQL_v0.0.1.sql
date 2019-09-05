-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema Livro
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema Livro
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Livro` DEFAULT CHARACTER SET utf8 ;
USE `Livro` ;
-- DROP DATABASE `Livro` ;

-- -----------------------------------------------------
-- Table `Livro`.`Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Livro`.`Usuario` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT,
  `Usuario` VARCHAR(45) NOT NULL,
  `Senha` VARCHAR(45) NOT NULL,
  `Nome` VARCHAR(45) NULL,
  `Data_nascimento` VARCHAR(45) NULL,
  `Ultimo_Login` DATE NULL,
  `Email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  UNIQUE INDEX `idUusario_UNIQUE` (`idUsuario` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Livro`.`receita`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Livro`.`receita` (
  `idreceita` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `anotacao` VARCHAR(45) NULL,
  `Usuario_idUsuaio` INT NOT NULL,
  PRIMARY KEY (`idreceita`),
  UNIQUE INDEX `idreceita_UNIQUE` (`idreceita` ASC),
  INDEX `fk_receita_Cervejeiro1_idx` (`Usuario_idUsuaio` ASC),
  CONSTRAINT `fk_receita_Cervejeiro1`
    FOREIGN KEY (`Usuario_idUsuaio`)
    REFERENCES `Livro`.`Usuario` (`idCervejeiro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Livro`.`lupulos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Livro`.`lupulos` (
  `idlupulo` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(60) NOT NULL,
  `origem` VARCHAR(15) NULL,
  `alfaAcido` VARCHAR(45) NOT NULL,
  `forma` VARCHAR(45) NOT NULL,
  `tipo` VARCHAR(45) NOT NULL,
  `anotacao` VARCHAR(100) NULL,
  `receita_idreceita` INT NOT NULL,
  PRIMARY KEY (`idlupulo`),
  UNIQUE INDEX `idlupulo_UNIQUE` (`idlupulo` ASC),
  INDEX `fk_lupulos_receita_idx` (`receita_idreceita` ASC),
  CONSTRAINT `fk_lupulos_receita`
    FOREIGN KEY (`receita_idreceita`)
    REFERENCES `Livro`.`receita` (`idreceita`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Livro`.`graos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Livro`.`graos` (
  `idgraos` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(60) NOT NULL,
  `origem` VARCHAR(15) NULL,
  `tipo` VARCHAR(45) NOT NULL,
  `cor` VARCHAR(45) NOT NULL,
  `potencial` VARCHAR(45) NOT NULL,
  `anotacao` VARCHAR(100) NULL,
  `receita_idreceita` INT NOT NULL,
  UNIQUE INDEX `idgraos_UNIQUE` (`idgraos` ASC),
  PRIMARY KEY (`idgraos`),
  INDEX `fk_graos_receita1_idx` (`receita_idreceita` ASC),
  CONSTRAINT `fk_graos_receita1`
    FOREIGN KEY (`receita_idreceita`)
    REFERENCES `Livro`.`receita` (`idreceita`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Livro`.`levedura`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Livro`.`levedura` (
  `idlevedura` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `anotacao` VARCHAR(100) NULL,
  `receita_idreceita` INT NOT NULL,
  PRIMARY KEY (`idlevedura`),
  INDEX `fk_levedura_receita1_idx` (`receita_idreceita` ASC),
  CONSTRAINT `fk_levedura_receita1`
    FOREIGN KEY (`receita_idreceita`)
    REFERENCES `Livro`.`receita` (`idreceita`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
