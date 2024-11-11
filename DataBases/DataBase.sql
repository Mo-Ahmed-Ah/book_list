CREATE DATABASE IF NOT EXISTS Book;
USE Book;

CREATE TABLE IF NOT EXISTS `Book_list` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `book_name` VARCHAR(150) NOT NULL,
  `status` ENUM('قراءة', 'مكتمل', 'مؤجل') DEFAULT 'مؤجل',  -- نوع الحقل status ليكون أكثر دقة
  `completion_status` VARCHAR(45) NULL DEFAULT 'لم ينتهي',  -- تعديل اسم الحقل Bookcol
  `add_in_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_in_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `Favorite` (
  `ID` INT NOT NULL AUTO_INCREMENT,  -- إضافة حقل ID كمعرّف أساسي
  `Book_ID` INT NOT NULL,
  `add_in_date` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),  -- تعيين الحقل ID كمعرّف أساسي
  INDEX `fk_Favorite_Book_idx` (`Book_ID` ASC),
  CONSTRAINT `fk_Favorite_Book` FOREIGN KEY (`Book_ID`) REFERENCES `Book_list` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB;
