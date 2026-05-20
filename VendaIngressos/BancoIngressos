-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema VendaIngressos
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema VendaIngressos
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `VendaIngressos` DEFAULT CHARACTER SET utf8 ;
USE `VendaIngressos` ;

-- -----------------------------------------------------
-- Table `VendaIngressos`.`Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `VendaIngressos`.`Usuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `senha` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `VendaIngressos`.`Cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `VendaIngressos`.`Cliente` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `cpf` INT(11) NOT NULL,
  `telefone` INT(11) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `VendaIngressos`.`Evento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `VendaIngressos`.`Evento` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NULL,
  `local` VARCHAR(255) NULL,
  `cidade` VARCHAR(255) NULL,
  `estado` VARCHAR(255) NULL,
  `data_inicio` DATETIME NULL,
  `data_termino` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `VendaIngressos`.`Ingresso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `VendaIngressos`.`Ingresso` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `status` VARCHAR(255) NOT NULL,
  `valor` DECIMAL(8,2) NOT NULL,
  `Cliente_id` INT NOT NULL,
  `Evento_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Ingresso_Cliente_idx` (`Cliente_id` ASC) ,
  INDEX `fk_Ingresso_Evento1_idx` (`Evento_id` ASC) ,
  CONSTRAINT `fk_Ingresso_Cliente`
    FOREIGN KEY (`Cliente_id`)
    REFERENCES `VendaIngressos`.`Cliente` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Ingresso_Evento1`
    FOREIGN KEY (`Evento_id`)
    REFERENCES `VendaIngressos`.`Evento` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;