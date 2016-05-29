CREATE TABLE IF NOT EXISTS `company` (
	`id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`name` VARCHAR(255) NOT NULL COLLATE utf8_general_ci,
	`lon` DECIMAL(6,6) NOT NULL,
	`lat` DECIMAL(6,6) NOT NULL,
	`address_name` VARCHAR(255) NOT NULL COLLATE utf8_general_ci,
	`postcode` INT(6) UNSIGNED NOT NULL,
	`created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	`updated_at` DATETIME
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `attribute` (
	`id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`name` VARCHAR(255) NOT NULL COLLATE utf8_general_ci
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `company_attribute` (
	`id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`company_id` BIGINT(20) UNSIGNED NOT NULL,
	`attribute_id` BIGINT(20) UNSIGNED NOT NULL,
	`tag` VARCHAR(255) NOT NULL COLLATE utf8_general_ci,
	`name` VARCHAR(255) NOT NULL COLLATE utf8_general_ci,
	FOREIGN KEY (`company_id`) REFERENCES `company` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	FOREIGN KEY (`attribute_id`) REFERENCES `attribute` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `company_contact` (
	`id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`company_id` BIGINT(20) UNSIGNED NOT NULL,
	`type` VARCHAR(255) NOT NULL COLLATE utf8_general_ci,
	`value` VARCHAR(255) NOT NULL COLLATE utf8_general_ci,
	`text` VARCHAR(255) NOT NULL COLLATE utf8_general_ci,
	FOREIGN KEY (`company_id`) REFERENCES `company` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `company_schedule` (
	`id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`company_id` BIGINT(20) UNSIGNED NOT NULL,
	`day` ENUM('mon','tue','wed','thu','fri','sat','sun') NOT NULL COLLATE utf8_general_ci,
	`from` TIME,
	`to` TIME,
	FOREIGN KEY (`company_id`) REFERENCES `company` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `rubric` (
	`id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`parent_id` BIGINT(20) UNSIGNED NOT NULL,
	`name` VARCHAR(255) NOT NULL COLLATE utf8_general_ci,
	`alias` VARCHAR(255) NOT NULL COLLATE utf8_general_ci,
	`kind` VARCHAR(255) NOT NULL COLLATE utf8_general_ci
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `company_rubric` (
	`id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`company_id` BIGINT(20) UNSIGNED NOT NULL,
	`rubric_id` BIGINT(20) UNSIGNED NOT NULL,
	FOREIGN KEY (`company_id`) REFERENCES `company` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	FOREIGN KEY (`rubric_id`) REFERENCES `rubric` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
) ENGINE=InnoDB;