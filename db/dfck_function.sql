CREATE TABLE `dfck_mis`.`dfck_function`(
  `id` INT NOT NULL AUTO_INCREMENT,
  `modulename` VARCHAR(50),
  `moduleurl` VARCHAR(50),
  `modulelang` VARCHAR(50),
  `moduleparent` INT,
  `updated_at` TIMESTAMP,
  `created_at` TIMESTAMP,
  `deleted` INT DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=INNODB;