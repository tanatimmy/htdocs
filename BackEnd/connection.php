-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema  mydb_1
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema  mydb_1
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS ` mydb_1` DEFAULT CHARACTER SET utf8 ;
USE ` mydb_1` ;

-- -----------------------------------------------------
-- Table ` mydb_1`.`Users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS ` mydb_1`.`Users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Email` VARCHAR(25) NOT NULL,
  `Name` VARCHAR(20) NOT NULL,
  `Contact` INT(10) NOT NULL,
  `Password` LONGTEXT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table ` mydb_1`.`Messages`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS ` mydb_1`.`Messages` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Subject` MEDIUMTEXT NOT NULL,
  `Body` LONGTEXT NOT NULL,
  `time_of_reg` TIMESTAMP NOT NULL DEFAULT current_timestamp,
  `Status` ENUM('Y', 'N') NOT NULL,
  `Users_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Messages_Users_idx` (`Users_id` ASC),
  CONSTRAINT `fk_Messages_Users`
    FOREIGN KEY (`Users_id`)
    REFERENCES ` mydb_1`.`Users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table ` mydb_1`.`Login_activity`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS ` mydb_1`.`Login_activity` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Login_activity_timestamp` TIMESTAMP NOT NULL,
  `Users_id` INT NOT NULL,
  `Users_id1` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Login_activity_Users1_idx` (`Users_id1` ASC),
  CONSTRAINT `fk_Login_activity_Users1`
    FOREIGN KEY (`Users_id1`)
    REFERENCES ` mydb_1`.`Users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
