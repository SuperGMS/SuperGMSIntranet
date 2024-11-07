-- Drop database if exists to start fresh
DROP DATABASE IF EXISTS admin_SuperGMSWHMCS;

-- Create the database
CREATE DATABASE admin_SuperGMSWHMCS;

-- Switch to the database
USE admin_SuperGMSWHMCS;

-- Create users table
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(64) NOT NULL,
  `password_reset_token` varchar(64) DEFAULT NULL,
  `password_reset_expires` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `failed_login_count` int(11) DEFAULT 0,
  `account_locked_until` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Create login_attempts table
CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `attempt_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email_time` (`email`, `attempt_time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Create Configuratie table
CREATE TABLE IF NOT EXISTS `Configuratie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stad` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Create mod_licensing table
CREATE TABLE IF NOT EXISTS `mod_licensing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `licensekey` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `serviceid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Create tblhosting table
CREATE TABLE IF NOT EXISTS `tblhosting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `packageid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Create tblproducts table
CREATE TABLE IF NOT EXISTS `tblproducts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert test data
INSERT INTO `users` (`email`, `password`, `salt`) VALUES
('test@example.com', '098f6bcd4621d373cade4e832627b4f6', 'test_salt');

INSERT INTO `Configuratie` (`stad`) VALUES ('test_license_key');

INSERT INTO `mod_licensing` (`licensekey`, `status`, `serviceid`) VALUES
('test_license_key', 'Active', 1);

INSERT INTO `tblhosting` (`packageid`) VALUES (1);

INSERT INTO `tblproducts` (`name`) VALUES ('Test Product');
