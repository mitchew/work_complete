-- MySQL Script generated by MySQL Workbench
-- Fri Dec  8 20:04:48 2017
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema work_complete
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `work_complete` ;

-- -----------------------------------------------------
-- Schema work_complete
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `work_complete` DEFAULT CHARACTER SET utf8 ;
USE `work_complete` ;

-- -----------------------------------------------------
-- Table `work_complete`.`addresses`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `work_complete`.`addresses` ;

CREATE TABLE IF NOT EXISTS `work_complete`.`addresses` (
  `address_id` INT(11) NOT NULL AUTO_INCREMENT,
  `street` VARCHAR(128) NULL DEFAULT NULL,
  `city` VARCHAR(45) NULL DEFAULT NULL,
  `state` CHAR(2) NULL DEFAULT NULL,
  `zip` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`address_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `work_complete`.`attempts`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `work_complete`.`attempts` ;

CREATE TABLE IF NOT EXISTS `work_complete`.`attempts` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `ip` VARCHAR(39) NOT NULL,
  `expiredate` DATETIME NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `work_complete`.`config`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `work_complete`.`config` ;

CREATE TABLE IF NOT EXISTS `work_complete`.`config` (
  `setting` VARCHAR(100) NOT NULL,
  `value` VARCHAR(100) NULL DEFAULT NULL,
  UNIQUE INDEX `setting` (`setting` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `work_complete`.`contacts`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `work_complete`.`contacts` ;

CREATE TABLE IF NOT EXISTS `work_complete`.`contacts` (
  `contact_id` INT(11) NOT NULL AUTO_INCREMENT,
  `fname` VARCHAR(45) NULL DEFAULT NULL,
  `lname` VARCHAR(45) NULL DEFAULT NULL,
  `phone` VARCHAR(45) NULL DEFAULT NULL,
  `address_id` INT(11) NOT NULL,
  PRIMARY KEY (`contact_id`),
  INDEX `fk_contacts_addresses1_idx` (`address_id` ASC),
  CONSTRAINT `fk_contacts_addresses1`
    FOREIGN KEY (`address_id`)
    REFERENCES `work_complete`.`addresses` (`address_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `work_complete`.`requests`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `work_complete`.`requests` ;

CREATE TABLE IF NOT EXISTS `work_complete`.`requests` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `uid` INT(11) NOT NULL,
  `rkey` VARCHAR(20) NOT NULL,
  `expire` DATETIME NOT NULL,
  `type` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `work_complete`.`sessions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `work_complete`.`sessions` ;

CREATE TABLE IF NOT EXISTS `work_complete`.`sessions` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `uid` INT(11) NOT NULL,
  `hash` VARCHAR(40) NOT NULL,
  `expiredate` DATETIME NOT NULL,
  `ip` VARCHAR(39) NOT NULL,
  `agent` VARCHAR(200) NOT NULL,
  `cookie_crc` VARCHAR(40) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `work_complete`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `work_complete`.`users` ;

CREATE TABLE IF NOT EXISTS `work_complete`.`users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(100) NULL DEFAULT NULL,
  `password` VARCHAR(60) NULL DEFAULT NULL,
  `isactive` TINYINT(1) NOT NULL DEFAULT '0',
  `dt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `work_complete`.`tasks`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `work_complete`.`tasks` ;

CREATE TABLE IF NOT EXISTS `work_complete`.`tasks` (
  `task_id` INT(11) NOT NULL AUTO_INCREMENT,
  `description` LONGTEXT NULL DEFAULT NULL,
  `problem` MEDIUMTEXT NULL DEFAULT NULL,
  `contact_id` INT(11) NOT NULL,
  `complete` TINYINT(4) NOT NULL,
  `users_id` INT(11) NOT NULL,
  PRIMARY KEY (`task_id`),
  INDEX `fk_tasks_contacts1_idx` (`contact_id` ASC),
  INDEX `fk_tasks_users1_idx` (`users_id` ASC),
  CONSTRAINT `fk_tasks_contacts1`
    FOREIGN KEY (`contact_id`)
    REFERENCES `work_complete`.`contacts` (`contact_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tasks_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `work_complete`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `work_complete`.`task_notes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `work_complete`.`task_notes` ;

CREATE TABLE IF NOT EXISTS `work_complete`.`task_notes` (
  `note_id` INT(11) NOT NULL AUTO_INCREMENT,
  `task_id` INT(11) NOT NULL,
  `note` LONGTEXT NULL DEFAULT NULL,
  `date` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`note_id`),
  INDEX `fk_task_notes_tasks1_idx` (`task_id` ASC),
  CONSTRAINT `fk_task_notes_tasks1`
    FOREIGN KEY (`task_id`)
    REFERENCES `work_complete`.`tasks` (`task_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
