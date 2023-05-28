-- MySQL Script generated by MySQL Workbench
-- Tue May 23 20:22:08 2023
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema clinic
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema clinic
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `clinic` DEFAULT CHARACTER SET utf8mb4 ;
USE `clinic` ;

-- -----------------------------------------------------
-- Table `clinic`.`trauma`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clinic`.`trauma` (
  `cod_trauma` MEDIUMINT(9) NOT NULL AUTO_INCREMENT,
  `name_doctor` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`cod_trauma`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `clinic`.`role`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clinic`.`role` (
  `cod_role` MEDIUMINT(9) NOT NULL AUTO_INCREMENT,
  `role` VARCHAR(12) NOT NULL,
  PRIMARY KEY (`cod_role`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `clinic`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clinic`.`user` (
  `id_user` MEDIUMINT(9) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(20) NOT NULL,
  `email` VARCHAR(40) NOT NULL,
  `password` VARCHAR(200) NULL DEFAULT NULL,
  `cod_verify` VARCHAR(5) NULL DEFAULT NULL,
  `active` INT(1) NOT NULL DEFAULT 1,
  `reg_date` TIMESTAMP(6) NULL DEFAULT NULL,
  `role_cod_role` MEDIUMINT(9) NOT NULL,
  PRIMARY KEY (`id_user`, `role_cod_role`),
  CONSTRAINT `fk_user_role1`
    FOREIGN KEY (`role_cod_role`)
    REFERENCES `clinic`.`role` (`cod_role`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `clinic`.`patient`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clinic`.`patient` (
  `cod_patient` MEDIUMINT(9) NOT NULL,
  `first_name` VARCHAR(45) NOT NULL,
  `last_name` VARCHAR(45) NOT NULL,
  `date_birth` TIMESTAMP(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `age` INT(11) NULL DEFAULT NULL,
  `sex` VARCHAR(1) NULL DEFAULT NULL,
  `user_id_user` MEDIUMINT(9) NOT NULL,
  `trauma_cod_trauma` MEDIUMINT(9) NOT NULL,
  PRIMARY KEY (`cod_patient`, `user_id_user`, `trauma_cod_trauma`),
  CONSTRAINT `fk_patient_trauma1`
    FOREIGN KEY (`trauma_cod_trauma`)
    REFERENCES `clinic`.`trauma` (`cod_trauma`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_patient_user1`
    FOREIGN KEY (`user_id_user`)
    REFERENCES `clinic`.`user` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `clinic`.`address`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clinic`.`address` (
  `cod_address` MEDIUMINT(9) NOT NULL AUTO_INCREMENT,
  `street` VARCHAR(50) NULL DEFAULT NULL,
  `pc` VARCHAR(10) NULL DEFAULT NULL,
  `city` VARCHAR(45) NULL DEFAULT NULL,
  `country` VARCHAR(25) NULL DEFAULT NULL,
  `number` VARCHAR(3) NULL DEFAULT NULL,
  `flat` VARCHAR(3) NULL DEFAULT NULL,
  `patient_cod_patient` MEDIUMINT(9) NOT NULL,
  PRIMARY KEY (`cod_address`, `patient_cod_patient`),
  CONSTRAINT `fk_address_patient1`
    FOREIGN KEY (`patient_cod_patient`)
    REFERENCES `clinic`.`patient` (`cod_patient`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `clinic`.`employee`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clinic`.`employee` (
  `cod_emp` MEDIUMINT(9) NOT NULL AUTO_INCREMENT,
  `name_emp` VARCHAR(45) NOT NULL,
  `title` VARCHAR(45) NOT NULL,
  `title_court` VARCHAR(4) NOT NULL,
  `date_birth` TIMESTAMP(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `date_hire` TIMESTAMP(6) NULL DEFAULT NULL,
  `user_id_user` MEDIUMINT(9) NOT NULL,
  PRIMARY KEY (`cod_emp`, `user_id_user`),
  CONSTRAINT `fk_employee_user1`
    FOREIGN KEY (`user_id_user`)
    REFERENCES `clinic`.`user` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `clinic`.`appointment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clinic`.`appointment` (
  `cod_appoint` MEDIUMINT(9) NOT NULL AUTO_INCREMENT,
  `date_appoint` TIMESTAMP(6) NULL DEFAULT NULL,
  `employee_cod_emp` MEDIUMINT(9) NOT NULL,
  `patient_cod_patient` MEDIUMINT(9) NOT NULL,
  PRIMARY KEY (`cod_appoint`, `employee_cod_emp`, `patient_cod_patient`),
  CONSTRAINT `fk_appointment_employee1`
    FOREIGN KEY (`employee_cod_emp`)
    REFERENCES `clinic`.`employee` (`cod_emp`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_appointment_patient1`
    FOREIGN KEY (`patient_cod_patient`)
    REFERENCES `clinic`.`patient` (`cod_patient`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `clinic`.`ch`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clinic`.`ch` (
  `cod_ch` MEDIUMINT(9) NOT NULL AUTO_INCREMENT,
  `lesion` VARCHAR(100) NULL DEFAULT NULL,
  `intervention` VARCHAR(100) NULL DEFAULT NULL,
  `reg_date` TIMESTAMP(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `patient_cod_patient` MEDIUMINT(9) NOT NULL,
  PRIMARY KEY (`cod_ch`, `patient_cod_patient`),
  CONSTRAINT `fk_ch_patient1`
    FOREIGN KEY (`patient_cod_patient`)
    REFERENCES `clinic`.`patient` (`cod_patient`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `clinic`.`therapy`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clinic`.`therapy` (
  `cod_therapy` MEDIUMINT(9) NOT NULL AUTO_INCREMENT,
  `name_ther` VARCHAR(45) NOT NULL,
  `description` VARCHAR(200) NULL DEFAULT NULL,
  `material` VARCHAR(200) NULL DEFAULT NULL,
  PRIMARY KEY (`cod_therapy`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `clinic`.`ch_therapy`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clinic`.`ch_therapy` (
  `ch_cod_ch` MEDIUMINT(9) NOT NULL,
  `therapy_cod_therapy` MEDIUMINT(9) NOT NULL,
  PRIMARY KEY (`ch_cod_ch`, `therapy_cod_therapy`),
  CONSTRAINT `fk_ch_has_therapy_ch1`
    FOREIGN KEY (`ch_cod_ch`)
    REFERENCES `clinic`.`ch` (`cod_ch`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ch_has_therapy_therapy1`
    FOREIGN KEY (`therapy_cod_therapy`)
    REFERENCES `clinic`.`therapy` (`cod_therapy`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `clinic`.`message`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clinic`.`message` (
  `cod_msg` MEDIUMINT(9) NOT NULL AUTO_INCREMENT,
  `cod_receiver` MEDIUMINT(9) NOT NULL,
  `subject` VARCHAR(100) NULL DEFAULT NULL,
  `message` MEDIUMTEXT NOT NULL,
  `date_Sent` TIMESTAMP(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `seen` TINYINT(1) NOT NULL,
  `user_id_user` MEDIUMINT(9) NOT NULL,
  PRIMARY KEY (`cod_msg`, `user_id_user`),
  CONSTRAINT `fk_message_user1`
    FOREIGN KEY (`user_id_user`)
    REFERENCES `clinic`.`user` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;