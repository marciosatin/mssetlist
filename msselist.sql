-- MySQL Script generated by MySQL Workbench
-- 08/20/16 11:53:28
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mssetlist
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Table `tbmusica`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tbmusica` ;

CREATE TABLE IF NOT EXISTS `tbmusica` (
  `cdMusica` INT NOT NULL AUTO_INCREMENT,
  `stNome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`cdMusica`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tbartista`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tbartista` ;

CREATE TABLE IF NOT EXISTS `tbartista` (
  `cdArtista` INT NOT NULL AUTO_INCREMENT,
  `stNome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`cdArtista`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tbgenero`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tbgenero` ;

CREATE TABLE IF NOT EXISTS `tbgenero` (
  `cdGenero` INT NOT NULL AUTO_INCREMENT,
  `stNome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`cdGenero`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tbmusicaartista`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tbmusicaartista` ;

CREATE TABLE IF NOT EXISTS `tbmusicaartista` (
  `cdMusicaArtista` INT NOT NULL AUTO_INCREMENT,
  `cdArtista` INT NOT NULL,
  `cdMusica` INT NOT NULL,
  `cdGenero` INT NOT NULL,
  `stLinkVideo` VARCHAR(255) NULL,
  `stTom` VARCHAR(5) NULL,
  `dtCadastro` TIMESTAMP NULL,
  `dtAlteracao` TIMESTAMP NULL,
  `stLinkCifra` VARCHAR(255) NULL,
  `stTempoDuracao` VARCHAR(45) NULL,
  PRIMARY KEY (`cdMusicaArtista`, `cdArtista`, `cdMusica`),
  INDEX `fk_tbartista_has_tbmusica_tbmusica1_idx` (`cdMusica` ASC),
  INDEX `fk_tbartista_has_tbmusica_tbartista1_idx` (`cdArtista` ASC),
  INDEX `fk_tbmusicaartista_tbgenero1_idx` (`cdGenero` ASC),
  UNIQUE INDEX `cdGenero_cdMusica_cdArtistaUNIQUE` (`cdGenero` ASC, `cdArtista` ASC, `cdMusica` ASC),
  CONSTRAINT `fk_tbartista_has_tbmusica_tbartista1`
    FOREIGN KEY (`cdArtista`)
    REFERENCES `tbartista` (`cdArtista`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbartista_has_tbmusica_tbmusica1`
    FOREIGN KEY (`cdMusica`)
    REFERENCES `tbmusica` (`cdMusica`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbmusicaartista_tbgenero1`
    FOREIGN KEY (`cdGenero`)
    REFERENCES `tbgenero` (`cdGenero`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tbuser`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tbuser` ;

CREATE TABLE IF NOT EXISTS `tbuser` (
  `cdUser` INT NOT NULL AUTO_INCREMENT,
  `stLogin` VARCHAR(45) NOT NULL,
  `stSenha` VARCHAR(45) NOT NULL,
  `stNome` VARCHAR(80) NOT NULL,
  PRIMARY KEY (`cdUser`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tbsetlist`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tbsetlist` ;

CREATE TABLE IF NOT EXISTS `tbsetlist` (
  `cdSetlist` INT NOT NULL AUTO_INCREMENT,
  `stNome` VARCHAR(45) NOT NULL,
  `dtCadastro` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `inNota` INT(2) NULL,
  PRIMARY KEY (`cdSetlist`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tbsetlistitem`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tbsetlistitem` ;

CREATE TABLE IF NOT EXISTS `tbsetlistitem` (
  `cdSetlist` INT NOT NULL,
  `cdMusicaArtista` INT NOT NULL,
  `dtCadastro` TIMESTAMP NULL,
  PRIMARY KEY (`cdSetlist`, `cdMusicaArtista`),
  INDEX `fk_tbsetlist_has_tbmusicaartista_tbmusicaartista1_idx` (`cdMusicaArtista` ASC),
  INDEX `fk_tbsetlist_has_tbmusicaartista_tbsetlist1_idx` (`cdSetlist` ASC),
  CONSTRAINT `fk_tbsetlist_has_tbmusicaartista_tbsetlist1`
    FOREIGN KEY (`cdSetlist`)
    REFERENCES `tbsetlist` (`cdSetlist`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbsetlist_has_tbmusicaartista_tbmusicaartista1`
    FOREIGN KEY (`cdMusicaArtista`)
    REFERENCES `tbmusicaartista` (`cdMusicaArtista`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tbinstrumento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tbinstrumento` ;

CREATE TABLE IF NOT EXISTS `tbinstrumento` (
  `cdInstrumento` INT NOT NULL AUTO_INCREMENT,
  `stNome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`cdInstrumento`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tbinstrumentoitem`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tbinstrumentoitem` ;

CREATE TABLE IF NOT EXISTS `tbinstrumentoitem` (
  `cdInstrumento` INT NOT NULL,
  `cdMusicaArtista` INT NOT NULL,
  `stObservacao` VARCHAR(45) NULL,
  PRIMARY KEY (`cdInstrumento`, `cdMusicaArtista`),
  INDEX `fk_tbinstrumento_has_tbmusicaartista_tbmusicaartista1_idx` (`cdMusicaArtista` ASC),
  INDEX `fk_tbinstrumento_has_tbmusicaartista_tbinstrumento1_idx` (`cdInstrumento` ASC),
  CONSTRAINT `fk_tbinstrumento_has_tbmusicaartista_tbinstrumento1`
    FOREIGN KEY (`cdInstrumento`)
    REFERENCES `tbinstrumento` (`cdInstrumento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbinstrumento_has_tbmusicaartista_tbmusicaartista1`
    FOREIGN KEY (`cdMusicaArtista`)
    REFERENCES `tbmusicaartista` (`cdMusicaArtista`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
