-- MySQL Script generated by MySQL Workbench
-- Mon Jun 13 19:34:43 2022
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema Gestor-E
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema Gestor-E
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Gestor-E` DEFAULT CHARACTER SET utf8 ;
USE `Gestor-E` ;

-- -----------------------------------------------------
-- Table `Gestor-E`.`Roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gestor-E`.`Roles` (
  `RolId` INT NOT NULL AUTO_INCREMENT,
  `RolName` VARCHAR(45) NOT NULL,
  `RolDescription` VARCHAR(80) NULL,
  PRIMARY KEY (`RolId`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Gestor-E`.`Users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gestor-E`.`Users` (
  `UserId` INT NOT NULL AUTO_INCREMENT,
  `Identification` INT NOT NULL,
  `Name1` VARCHAR(45) NOT NULL,
  `Name2` VARCHAR(45) NULL,
  `Name3` VARCHAR(45) NOT NULL,
  `Name4` VARCHAR(45) NULL,
  `UserName` VARCHAR(45) NOT NULL,
  `Password` VARCHAR(45) NOT NULL,
  `UserEmail` VARCHAR(65) NOT NULL,
  `Roles_RolId` INT NOT NULL,
  PRIMARY KEY (`UserId`, `Roles_RolId`),
  INDEX `fk_Users_Roles1_idx` (`Roles_RolId` ASC) VISIBLE,
  CONSTRAINT `fk_Users_Roles1`
    FOREIGN KEY (`Roles_RolId`)
    REFERENCES `Gestor-E`.`Roles` (`RolId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Gestor-E`.`Suppliers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gestor-E`.`Suppliers` (
  `SupplierId` INT NOT NULL AUTO_INCREMENT,
  `SupplierName` VARCHAR(70) NOT NULL,
  `SupplierPhone` INT NOT NULL,
  `SupplierAddress` VARCHAR(45) NOT NULL,
  `SupplierDescription` VARCHAR(150) NULL,
  `SupplierWeb` VARCHAR(65) NULL,
  `SupplierEmail` VARCHAR(45) NULL,
  `CreateDate` DATE NOT NULL,
  `Users_UserId` INT NOT NULL,
  PRIMARY KEY (`SupplierId`, `Users_UserId`),
  INDEX `fk_Suppliers_Users1_idx` (`Users_UserId` ASC) VISIBLE,
  CONSTRAINT `fk_Suppliers_Users1`
    FOREIGN KEY (`Users_UserId`)
    REFERENCES `Gestor-E`.`Users` (`UserId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Gestor-E`.`Categories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gestor-E`.`Categories` (
  `CategoryId` INT NOT NULL AUTO_INCREMENT,
  `CategoryName` VARCHAR(45) NOT NULL,
  `CategoryDescription` VARCHAR(45) NULL,
  `CreateDate` DATE NOT NULL,
  `Users_UserId` INT NOT NULL,
  PRIMARY KEY (`CategoryId`, `Users_UserId`),
  INDEX `fk_Categories_Users1_idx` (`Users_UserId` ASC) VISIBLE,
  CONSTRAINT `fk_Categories_Users1`
    FOREIGN KEY (`Users_UserId`)
    REFERENCES `Gestor-E`.`Users` (`UserId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Gestor-E`.`Products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gestor-E`.`Products` (
  `ProductId` INT NOT NULL AUTO_INCREMENT,
  `ProductName` VARCHAR(45) NOT NULL,
  `ProductPrice` VARCHAR(45) NOT NULL,
  `ProductAmount` VARCHAR(45) NOT NULL,
  `ProductDescription` VARCHAR(250) NULL,
  `CreateDate` DATE NOT NULL,
  `Categories_CategoryId` INT NOT NULL,
  `Suppliers_SupplierId` INT NOT NULL,
  `Users_UserId` INT NOT NULL,
  PRIMARY KEY (`ProductId`, `Categories_CategoryId`, `Suppliers_SupplierId`, `Users_UserId`),
  INDEX `fk_Products_Categories1_idx` (`Categories_CategoryId` ASC) VISIBLE,
  INDEX `fk_Products_Suppliers1_idx` (`Suppliers_SupplierId` ASC) VISIBLE,
  INDEX `fk_Products_Users1_idx` (`Users_UserId` ASC) VISIBLE,
  CONSTRAINT `fk_Products_Categories1`
    FOREIGN KEY (`Categories_CategoryId`)
    REFERENCES `Gestor-E`.`Categories` (`CategoryId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Products_Suppliers1`
    FOREIGN KEY (`Suppliers_SupplierId`)
    REFERENCES `Gestor-E`.`Suppliers` (`SupplierId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Products_Users1`
    FOREIGN KEY (`Users_UserId`)
    REFERENCES `Gestor-E`.`Users` (`UserId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
