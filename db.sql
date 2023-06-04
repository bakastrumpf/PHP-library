-- MySQL Script generated by MySQL Workbench
-- недеља, 04. јун 2023. 20:42:07 CEST
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering
-- author: Marija Savić @ ETF PHP course 2023

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema LIBRARY
-- -----------------------------------------------------
-- DROP SCHEMA IF EXISTS `LIBRARY` ;

-- -----------------------------------------------------
-- Schema LIBRARY
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `LIBRARY` ;
USE `LIBRARY` ;

-- -----------------------------------------------------
-- Table `LIBRARY`.`USER`
-- -----------------------------------------------------
-- DROP TABLE IF EXISTS `LIBRARY`.`USER` ;

CREATE TABLE IF NOT EXISTS `LIBRARY`.`USER` (
  `idUSER` INT NULL auto_increment,
  `USERname` VARCHAR(45) NULL,
  `USERsurname` VARCHAR(45) NULL,
  `USERpass` VARCHAR(45) NOT NULL,
  `USERemail` VARCHAR(45) NOT NULL,
  `USERstreet` VARCHAR(45) NULL,
  `USERcity` VARCHAR(45) NULL,
  `USERphone` VARCHAR(45) NULL,
  `USERrole` VARCHAR(45) NULL CHECK(USERrole IN ('ADMIN', 'LIBRARIAN', 'MEMBER')),
  `USERactive` TINYINT(2) NULL,
  `USERmembPaid` TINYINT(2) NULL,
  PRIMARY KEY (`idUSER`),
  UNIQUE INDEX `idUSER_UNIQUE` (`idUSER` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LIBRARY`.`BOOK`
-- -----------------------------------------------------
-- DROP TABLE IF EXISTS `LIBRARY`.`BOOK` ;

CREATE TABLE IF NOT EXISTS `LIBRARY`.`BOOK` (
  `idBOOK` INT NOT NULL auto_increment,
  `BOOKtitle` VARCHAR(45) NOT NULL,
  `BOOKyear` INT(4) NULL,
  `BOOKpublisher` VARCHAR(45) NULL,
  `BOOKpages` INT NULL,
  `BOOKisbn` VARCHAR(45) NULL,
  `BOOKdescr` VARCHAR(500) NULL,
  `BOOKimg` BLOB NULL,
  `BOOKgenre` VARCHAR(45) NULL,
  `BOOKtoBorrow` TINYINT(2) NOT NULL,
  `BOOKcopies` INT NULL,
  `BOOKisAvailable` TINYINT(2) NOT NULL,
  PRIMARY KEY (`idBOOK`),
  UNIQUE INDEX `idBOOK_UNIQUE` (`idBOOK` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LIBRARY`.`AUTHOR`
-- -----------------------------------------------------
-- DROP TABLE IF EXISTS `LIBRARY`.`AUTHOR` ;

CREATE TABLE IF NOT EXISTS `LIBRARY`.`AUTHOR` (
  `idAUTHOR` INT NOT NULL auto_increment,
  `AUTHORname` VARCHAR(45) NOT NULL,
  `AUTHORsurname` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idAUTHOR`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LIBRARY`.`WRITTEN`
-- -----------------------------------------------------
-- DROP TABLE IF EXISTS `LIBRARY`.`WRITTEN` ;

CREATE TABLE IF NOT EXISTS `LIBRARY`.`WRITTEN` (
  `BOOK_idBOOK` INT NOT NULL,
  `AUTHOR_idAUTHOR` INT NOT NULL,
  PRIMARY KEY (`BOOK_idBOOK`, `AUTHOR_idAUTHOR`),
  INDEX `fk_BOOK_has_AUTHOR_AUTHOR1_idx` (`AUTHOR_idAUTHOR` ASC) VISIBLE,
  INDEX `fk_BOOK_has_AUTHOR_BOOK_idx` (`BOOK_idBOOK` ASC) VISIBLE,
  CONSTRAINT `fk_BOOK_has_AUTHOR_BOOK`
    FOREIGN KEY (`BOOK_idBOOK`)
    REFERENCES `LIBRARY`.`BOOK` (`idBOOK`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_BOOK_has_AUTHOR_AUTHOR1`
    FOREIGN KEY (`AUTHOR_idAUTHOR`)
    REFERENCES `LIBRARY`.`AUTHOR` (`idAUTHOR`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LIBRARY`.`RATING`
-- -----------------------------------------------------
-- DROP TABLE IF EXISTS `LIBRARY`.`RATING` ;

CREATE TABLE IF NOT EXISTS `LIBRARY`.`RATING` (
  `idRATING` INT NOT NULL auto_increment,
  `USERcomm` VARCHAR(500) NULL,
  `USERrating` INT NULL,
  `BOOK_idBOOK` INT NOT NULL,
  PRIMARY KEY (`idRATING`),
  INDEX `fk_RATING_BOOK1_idx` (`BOOK_idBOOK` ASC) VISIBLE,
  CONSTRAINT `fk_RATING_BOOK1`
    FOREIGN KEY (`BOOK_idBOOK`)
    REFERENCES `LIBRARY`.`BOOK` (`idBOOK`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LIBRARY`.`BORROWED`
-- -----------------------------------------------------
-- DROP TABLE IF EXISTS `LIBRARY`.`BORROWED` ;

CREATE TABLE IF NOT EXISTS `LIBRARY`.`BORROWED` (
  `USER_idUSER` INT NOT NULL,
  `BOOK_idBOOK` INT NOT NULL,
  `BORRdateTaken` DATETIME NOT NULL,
  `BORRdateRet` DATETIME NULL,
  `BORRfine` INT NULL,
  PRIMARY KEY (`USER_idUSER`, `BOOK_idBOOK`),
  INDEX `fk_USER_has_BOOK_BOOK1_idx` (`BOOK_idBOOK` ASC) VISIBLE,
  INDEX `fk_USER_has_BOOK_USER1_idx` (`USER_idUSER` ASC) VISIBLE,
  CONSTRAINT `fk_USER_has_BOOK_USER1`
    FOREIGN KEY (`USER_idUSER`)
    REFERENCES `LIBRARY`.`USER` (`idUSER`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_USER_has_BOOK_BOOK1`
    FOREIGN KEY (`BOOK_idBOOK`)
    REFERENCES `LIBRARY`.`BOOK` (`idBOOK`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LIBRARY`.`RESERVATION`
-- -----------------------------------------------------
-- DROP TABLE IF EXISTS `LIBRARY`.`RESERVATION` ;

CREATE TABLE IF NOT EXISTS `LIBRARY`.`RESERVATION` (
  `idRESERVATION` INT NOT NULL auto_increment,
  `RESisBooked` TINYINT(2) NULL,
  `RESvalidity` INT NULL,
  `USER_idUSER` INT NOT NULL,
  `BOOK_idBOOK` INT NOT NULL,
  PRIMARY KEY (`idRESERVATION`, `USER_idUSER`, `BOOK_idBOOK`),
  INDEX `fk_RESERVATION_USER1_idx` (`USER_idUSER` ASC) VISIBLE,
  INDEX `fk_RESERVATION_BOOK1_idx` (`BOOK_idBOOK` ASC) VISIBLE,
  CONSTRAINT `fk_RESERVATION_USER1`
    FOREIGN KEY (`USER_idUSER`)
    REFERENCES `LIBRARY`.`USER` (`idUSER`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_RESERVATION_BOOK1`
    FOREIGN KEY (`BOOK_idBOOK`)
    REFERENCES `LIBRARY`.`BOOK` (`idBOOK`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LIBRARY`.`FINE`
-- -----------------------------------------------------
-- DROP TABLE IF EXISTS `LIBRARY`.`FINE` ;

CREATE TABLE IF NOT EXISTS `LIBRARY`.`FINE` (
  `idFINE` INT NOT NULL auto_increment,
  `FINEperDay` DOUBLE NULL,
  `FINEkeepDays` INT NULL,
  `FINEmaxBooks` INT NULL,
  `BORROWED_USER_idUSER` INT NOT NULL,
  `BORROWED_BOOK_idBOOK` INT NOT NULL,
  PRIMARY KEY (`idFINE`, `BORROWED_USER_idUSER`, `BORROWED_BOOK_idBOOK`),
  INDEX `fk_FINE_BORROWED1_idx` (`BORROWED_USER_idUSER` ASC, `BORROWED_BOOK_idBOOK` ASC) VISIBLE,
  CONSTRAINT `fk_FINE_BORROWED1`
    FOREIGN KEY (`BORROWED_USER_idUSER` , `BORROWED_BOOK_idBOOK`)
    REFERENCES `LIBRARY`.`BORROWED` (`USER_idUSER` , `BOOK_idBOOK`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

INSERT INTO 
USER (`USERname`, `USERsurname`, `USERpass`, `USERemail`, `USERstreet`, `USERcity`, `USERphone`, `USERrole`, USERactive, USERmembPaid)
VALUES 
('Milan', 'Jankovic', 'admin1', 'mija@admin1.net', 'Bare', 'Lazarevac', '0642588522', 'ADMIN', true, true),
('Dragana', 'Živković', 'admin2', 'drzi@gmail.com', 'Radnička 9/12', 'Obrenovac', '0629517535', 'ADMIN', true, true), 
('Zoran', 'Simić', 'admin3', 'zosi@admin.co.rs', 'Loznička 58/6', 'Radalj', '0697411233', 'ADMIN', false, false), 
('Dragica', 'Bebić', 'librarian1', 'drbe@gmail.com', 'Mike Antića 2', 'Požega', '0641233225', 'LIBRARIAN', true, true), 
('Ana', 'Milojević', 'librarian1', 'anmi@yahoo.com', 'Laze Kostića 69/9', 'Smederevo', '066278278', 'LIBRARIAN', true, true), 
('Boban', 'Jovanović', 'librarian1', 'bobi@gmail.com', 'Centar 5', 'Zrenjanin', '063278852', 'LIBRARIAN', false, false), 
('Vesna', 'Branković', 'member1', 'veki@gmail.com', 'Vojvode Putnika 25/6', 'Požega', '063242021', 'MEMBER', true, true), 
('Goran', 'Pavlović', 'member1', 'gopa@msn.net', 'Laze lazarevića 6/2', 'Šabac', '0641893369', 'MEMBER', true, true), 
('Danilo', 'Živković', 'member1', 'daca@gmail.com', NULL, NULL, '061517151', 'MEMBER', true, true),
('Mirjana', 'Jovanović', 'member1', 'mijo@yahoo.com', 'Beogradska 3', 'Smederevo', '0646060566', 'MEMBER', false, false), 
('Jelena', 'Pavlović', 'member1', 'jelpav@yandex.ru', NULL, NULL, '0607058143', 'MEMBER', false, false),
('Petar', 'Grbić', 'member1', 'petargrbic@msn.net', 'Smederevska 1', 'Smederevo', '064162255', 'MEMBER', true, false), 
('Jasmina', 'Živković', 'member1', 'jaca@yandex.ru', 'Rumenačka 13', 'Novi Sad', '063336685', 'MEMBER', true, false), 
('Darinka', 'Simić', 'member1', 'daca@yandex.ru', NULL, NULL, NULL, 'MEMBER', false, true),
('Petar', 'Danilović', 'member1', 'peki@gmail.com', 'Limska 7', 'Priboj', '062232529', 'MEMBER', false, true); 

INSERT INTO BOOK (`BOOKtitle`, BOOKyear, `BOOKpublisher`, BOOKpages, `BOOKisbn`, `BOOKdescr`, `BOOKimg`, `BOOKgenre`, BOOKtoBorrow, BOOKcopies, BOOKisAvailable)
VALUES 
('Novel 1', 1988, 'BOOKpublisher1', 352, 'BOOKisbn1', 'Lorem ipsum descr1', NULL, 'sci-fi', true, 7, true),
('Novel 2', 1998, 'BOOKpublisher2', 752, 'BOOKisbn2', 'Lorem ipsum descr1', NULL, 'thriller', true, 7, true),
('Poetry 1', 2020, 'BOOKpublisher1', 200, 'BOOKisbn11', 'Lorem ipsum descr1', NULL, 'poetry', true, 5, true),
('Poetry 2', 2021, 'BOOKpublisher1', 120, 'BOOKisbn12', 'Lorem ipsum descr1', NULL, 'poetry', true, 8, true),
('Detective 1', 1995, 'BOOKpublisher3', 290, 'BOOKisbn14', 'Lorem ipsum descr1', NULL, 'mystery', true, 7, true),
('Test book 2', 1988, 'BOOKpublisher1', 399, 'BOOKisbn3', 'Lorem ipsum descr2', NULL, 'prose', true, 10, true),
('Encyclopaedia 1', 1980, 'BOOKpublisher2', 950, 'BOOKisbn4', 'Lorem ipsum descr3', NULL, 'encyclopaedia', false, 5, true),
('Encyclopaedia 2', 1982, 'BOOKpublisher2', 950, 'BOOKisbn5', 'Lorem ipsum descr3', NULL, 'encyclopaedia', false, 5, true),
('Encyclopaedia 3', 1984, 'BOOKpublisher2', 950, 'BOOKisbn6', 'Lorem ipsum descr3', NULL, 'encyclopaedia', false, 5, true),
('Test book 3', 1984, 'BOOKpublisher2', 950, 'BOOKisbn7', 'Lorem ipsum descr3', NULL, 'encyclopaedia', true, 5, true),
('Test book 4', 1944, 'BOOKpublisher3', 480, 'BOOKisbn8', 'Lorem ipsum descr4', NULL, 'book of abstracts', false, 3, true),
('Test book 5', 1963, 'BOOKpublisher3', 480, 'BOOKisbn9', 'Lorem ipsum descr4', NULL, 'book of abstracts', false, 3, false),
('Test book 6', 1963, 'BOOKpublisher3', 480, 'BOOKisbn10', 'Lorem ipsum descr4', NULL, 'book of abstracts', true, 3, true);

INSERT INTO AUTHOR (`AUTHORname`, `AUTHORsurname`)
VALUES
('Name1', 'Surname1'),
('Name2', 'Surname2'),
('Name3', 'Surname3'),
('Name4', 'Surname4'),
('Name5', 'Surname5');

INSERT INTO WRITTEN (BOOK_idBOOK, AUTHOR_idAUTHOR)
VALUES (13, 5), (12, 4), (11, 3), (10, 1), (9, 2), (8, 1), (7, 3), (6, 1), (5, 1), (4, 5), (3, 5), (2, 1), (1, 4);

INSERT INTO RESERVATION (RESisBooked, RESvalidity, USER_idUSER, BOOK_idBOOK)
VALUES (true, 2, 9, 2), (true, 2, 7, 11), (true, 2, 13, 11), (true, 2, 12, 10);

INSERT INTO BORROWED (USER_idUSER, BOOK_idBOOK, BORRdateTaken, BORRdateRet, BORRfine)
VALUES
(7, 5, '2023-05-28', '2023-06-03', NULL), 
(10, 3, '2023-05-27', '2023-06-03', NULL), 
(9, 4, '2023-03-24', NULL, NULL), 
(8, 7, '2023-02-22', '2023-03-15', NULL);

INSERT INTO FINE (FINEperDay, FINEkeepDays, FINEmaxBooks, BORROWED_USER_idUSER, BORROWED_BOOK_idBOOK)
VALUES
(30, 15, 2, 9, 4);

INSERT INTO RATING (`USERcomm`, USERrating, BOOK_idBOOK)
VALUES 
('test comment one about the book lorem ispum dolor manet', 5, 5),
('test comment one about the book lorem ispum dolor manet', 4, 7),
('test comment one about the book lorem ispum dolor manet', 3, 3);