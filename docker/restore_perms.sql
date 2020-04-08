CREATE DATABASE `jumpstart`;
USE `jumpstart`;
CREATE USER 'test'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON `jumpstart`.* TO 'test'@'localhost';
FLUSH PRIVILEGES;
