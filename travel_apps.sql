-- Valentina Studio --
-- MySQL dump --
-- ---------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- ---------------------------------------------------------


-- CREATE DATABASE "travel_apps" ---------------------------
CREATE DATABASE IF NOT EXISTS `travel_apps` CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `travel_apps`;
-- ---------------------------------------------------------


-- CREATE TABLE "booking" ----------------------------------
-- DROP TABLE "booking" ----------------------------------------
DROP TABLE IF EXISTS `booking` CASCADE;
-- -------------------------------------------------------------


-- CREATE TABLE "booking" --------------------------------------
CREATE TABLE `booking` ( 
	`id_booking` Int( 11 ) NOT NULL,
	`id_user` Int( 11 ) NOT NULL,
	`no_book` VarChar( 32 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`total_price` Double( 22, 0 ) NOT NULL,
	`start_date` Date NOT NULL,
	`end_date` Date NOT NULL,
	`duration` VarChar( 12 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`status_validate` TinyInt( 255 ) NOT NULL,
	`name` VarChar( 200 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`phone` VarChar( 12 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`addres` Text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`id_card` Text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`id_admin_client` Int( 255 ) NOT NULL,
	`time_val` DateTime NOT NULL,
	PRIMARY KEY ( `id_booking` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE TABLE "detail_book" ------------------------------
-- DROP TABLE "detail_book" ------------------------------------
DROP TABLE IF EXISTS `detail_book` CASCADE;
-- -------------------------------------------------------------


-- CREATE TABLE "detail_book" ----------------------------------
CREATE TABLE `detail_book` ( 
	`id_detail_book` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`id_booking` Int( 11 ) NOT NULL,
	`id_voucer` Int( 11 ) NOT NULL,
	`price` Int( 255 ) NOT NULL,
	PRIMARY KEY ( `id_detail_book` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 1;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE TABLE "district" ---------------------------------
-- DROP TABLE "district" ---------------------------------------
DROP TABLE IF EXISTS `district` CASCADE;
-- -------------------------------------------------------------


-- CREATE TABLE "district" -------------------------------------
CREATE TABLE `district` ( 
	`id_district` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`district_name` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`id_province` Int( 255 ) NOT NULL,
	PRIMARY KEY ( `id_district` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 12;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE TABLE "hotel" ------------------------------------
-- DROP TABLE "hotel" ------------------------------------------
DROP TABLE IF EXISTS `hotel` CASCADE;
-- -------------------------------------------------------------


-- CREATE TABLE "hotel" ----------------------------------------
CREATE TABLE `hotel` ( 
	`id_hotel` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`hotel_name` VarChar( 200 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`id_sub_district` Int( 11 ) NOT NULL,
	`address` MediumText CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`phone` VarChar( 12 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`lat` VarChar( 32 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`lng` VarChar( 32 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`primary_pic` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`rnd` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	PRIMARY KEY ( `id_hotel` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 4;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE TABLE "hotel_fasility" ---------------------------
-- DROP TABLE "hotel_fasility" ---------------------------------
DROP TABLE IF EXISTS `hotel_fasility` CASCADE;
-- -------------------------------------------------------------


-- CREATE TABLE "hotel_fasility" -------------------------------
CREATE TABLE `hotel_fasility` ( 
	`id_fasility` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`name_fasiliity` VarChar( 32 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`id_hotel` Int( 255 ) NOT NULL,
	`id_room_type` Int( 255 ) NOT NULL,
	PRIMARY KEY ( `id_fasility` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 1;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE TABLE "hotel_pic" --------------------------------
-- DROP TABLE "hotel_pic" --------------------------------------
DROP TABLE IF EXISTS `hotel_pic` CASCADE;
-- -------------------------------------------------------------


-- CREATE TABLE "hotel_pic" ------------------------------------
CREATE TABLE `hotel_pic` ( 
	`id_pic` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`pic` VarChar( 32 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`id_hotel` Int( 255 ) NOT NULL,
	PRIMARY KEY ( `id_pic` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 1;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE TABLE "province" ---------------------------------
-- DROP TABLE "province" ---------------------------------------
DROP TABLE IF EXISTS `province` CASCADE;
-- -------------------------------------------------------------


-- CREATE TABLE "province" -------------------------------------
CREATE TABLE `province` ( 
	`id_province` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`province_name` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	PRIMARY KEY ( `id_province` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 20;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE TABLE "room_type" --------------------------------
-- DROP TABLE "room_type" --------------------------------------
DROP TABLE IF EXISTS `room_type` CASCADE;
-- -------------------------------------------------------------


-- CREATE TABLE "room_type" ------------------------------------
CREATE TABLE `room_type` ( 
	`id_room_type` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`name_type` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	PRIMARY KEY ( `id_room_type` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 9;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE TABLE "source_voucher" ---------------------------
-- DROP TABLE "source_voucher" ---------------------------------
DROP TABLE IF EXISTS `source_voucher` CASCADE;
-- -------------------------------------------------------------


-- CREATE TABLE "source_voucher" -------------------------------
CREATE TABLE `source_voucher` ( 
	`id_source_voucher` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`name` VarChar( 200 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`address` Text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`phone` VarChar( 12 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`email` VarChar( 32 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	PRIMARY KEY ( `id_source_voucher` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 2;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE TABLE "sub_district" -----------------------------
-- DROP TABLE "sub_district" -----------------------------------
DROP TABLE IF EXISTS `sub_district` CASCADE;
-- -------------------------------------------------------------


-- CREATE TABLE "sub_district" ---------------------------------
CREATE TABLE `sub_district` ( 
	`id_sub_district` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`sub_district_name` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`id_district` Int( 255 ) NOT NULL,
	PRIMARY KEY ( `id_sub_district` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 9;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE TABLE "users" ------------------------------------
-- DROP TABLE "users" ------------------------------------------
DROP TABLE IF EXISTS `users` CASCADE;
-- -------------------------------------------------------------


-- CREATE TABLE "users" ----------------------------------------
CREATE TABLE `users` ( 
	`id_user` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`name` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`addres` Text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`password` VarChar( 32 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`email` VarChar( 32 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`phone` VarChar( 12 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	PRIMARY KEY ( `id_user` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 3;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE TABLE "users_adm" --------------------------------
-- DROP TABLE "users_adm" --------------------------------------
DROP TABLE IF EXISTS `users_adm` CASCADE;
-- -------------------------------------------------------------


-- CREATE TABLE "users_adm" ------------------------------------
CREATE TABLE `users_adm` ( 
	`id_adm` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`name` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`user_name` VarChar( 32 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`password` VarChar( 32 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`email` VarChar( 32 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`phone` VarChar( 12 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	PRIMARY KEY ( `id_adm` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 2;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE TABLE "voucer_travel" ----------------------------
-- DROP TABLE "voucer_travel" ----------------------------------
DROP TABLE IF EXISTS `voucer_travel` CASCADE;
-- -------------------------------------------------------------


-- CREATE TABLE "voucer_travel" --------------------------------
CREATE TABLE `voucer_travel` ( 
	`id_voucer` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`no_voucer` VarChar( 32 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`id_hotel` Int( 11 ) NOT NULL,
	`start_date` Date NOT NULL,
	`end_date` Date NOT NULL,
	`id_room_type` Int( 11 ) NOT NULL,
	`price` Double( 22, 0 ) NOT NULL,
	`id_source` Int( 11 ) NOT NULL,
	`stock` Int( 11 ) NOT NULL,
	`status_voucer` TinyInt( 2 ) NOT NULL DEFAULT '0',
	`expired_date` Date NOT NULL,
	PRIMARY KEY ( `id_voucer` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 5;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- Dump data of "booking" ----------------------------------
-- ---------------------------------------------------------


-- Dump data of "detail_book" ------------------------------
-- ---------------------------------------------------------


-- Dump data of "district" ---------------------------------
INSERT INTO `district`(`id_district`,`district_name`,`id_province`) VALUES ( '3', 'Sleman', '19' );
INSERT INTO `district`(`id_district`,`district_name`,`id_province`) VALUES ( '4', 'Bantul', '19' );
INSERT INTO `district`(`id_district`,`district_name`,`id_province`) VALUES ( '5', 'Kota Yogyakarta', '19' );
INSERT INTO `district`(`id_district`,`district_name`,`id_province`) VALUES ( '6', 'Kulon Progo', '19' );
INSERT INTO `district`(`id_district`,`district_name`,`id_province`) VALUES ( '7', 'Gunung Kidul', '19' );
INSERT INTO `district`(`id_district`,`district_name`,`id_province`) VALUES ( '8', 'Solo', '4' );
INSERT INTO `district`(`id_district`,`district_name`,`id_province`) VALUES ( '9', 'Karawang', '2' );
INSERT INTO `district`(`id_district`,`district_name`,`id_province`) VALUES ( '10', 'Bandung', '2' );
INSERT INTO `district`(`id_district`,`district_name`,`id_province`) VALUES ( '11', 'Medan', '6' );
-- ---------------------------------------------------------


-- Dump data of "hotel" ------------------------------------
INSERT INTO `hotel`(`id_hotel`,`hotel_name`,`id_sub_district`,`address`,`phone`,`lat`,`lng`,`primary_pic`,`rnd`) VALUES ( '1', 'Jambuluwuk', '7', 'Jalan Gajah Mada, Purwokinanti, Yogyakarta City, Special Region of Yogyakarta, Indonesia', '(0274) 58565', '-7.797558600000002', '110.37225860000001', 'http://localhost/travel_apps/images/data/Hotel/Jambuluwuk-Malioboro-Hotel-FACADE_-1.jpg', '' );
INSERT INTO `hotel`(`id_hotel`,`hotel_name`,`id_sub_district`,`address`,`phone`,`lat`,`lng`,`primary_pic`,`rnd`) VALUES ( '2', 'The Alana Hotel', '7', 'Sariharjo, Sleman Regency, Special Region of Yogyakarta, Indonesia', '(0274) 88880', '-7.739414200000001', '110.37713380000002', 'http://localhost/travel_apps/images/data/Hotel/64890707.jpg', '' );
INSERT INTO `hotel`(`id_hotel`,`hotel_name`,`id_sub_district`,`address`,`phone`,`lat`,`lng`,`primary_pic`,`rnd`) VALUES ( '3', 'Grand Central Medan', '8', 'Jalan Sei Belutu, Merdeka, Medan City, North Sumatra, Indonesia', '(061) 805138', '3.5751099', '98.6534302', 'http://localhost/travel_apps/images/data/Hotel/30000002000346023_wh_4.png', '' );
-- ---------------------------------------------------------


-- Dump data of "hotel_fasility" ---------------------------
-- ---------------------------------------------------------


-- Dump data of "hotel_pic" --------------------------------
-- ---------------------------------------------------------


-- Dump data of "province" ---------------------------------
INSERT INTO `province`(`id_province`,`province_name`) VALUES ( '1', 'Aceh' );
INSERT INTO `province`(`id_province`,`province_name`) VALUES ( '2', 'Jawa Barat' );
INSERT INTO `province`(`id_province`,`province_name`) VALUES ( '3', 'Bali' );
INSERT INTO `province`(`id_province`,`province_name`) VALUES ( '4', 'Jawa Tengah' );
INSERT INTO `province`(`id_province`,`province_name`) VALUES ( '5', 'Jawa Timur' );
INSERT INTO `province`(`id_province`,`province_name`) VALUES ( '6', 'Sumatra Utara' );
INSERT INTO `province`(`id_province`,`province_name`) VALUES ( '7', 'Sumatra Barat' );
INSERT INTO `province`(`id_province`,`province_name`) VALUES ( '8', 'Sumatra Selatan' );
INSERT INTO `province`(`id_province`,`province_name`) VALUES ( '9', 'Kalimantan Barat' );
INSERT INTO `province`(`id_province`,`province_name`) VALUES ( '10', 'Kalimatan Tengah' );
INSERT INTO `province`(`id_province`,`province_name`) VALUES ( '11', 'Kalimantan Selatan' );
INSERT INTO `province`(`id_province`,`province_name`) VALUES ( '12', 'Kalimantan Timur' );
INSERT INTO `province`(`id_province`,`province_name`) VALUES ( '13', 'Sulawesi Utara' );
INSERT INTO `province`(`id_province`,`province_name`) VALUES ( '14', 'Sulawesi Selatan' );
INSERT INTO `province`(`id_province`,`province_name`) VALUES ( '15', 'Maluku' );
INSERT INTO `province`(`id_province`,`province_name`) VALUES ( '16', 'Papua' );
INSERT INTO `province`(`id_province`,`province_name`) VALUES ( '17', 'Nusatengara Barat' );
INSERT INTO `province`(`id_province`,`province_name`) VALUES ( '18', 'Nusatenggara Timur' );
INSERT INTO `province`(`id_province`,`province_name`) VALUES ( '19', 'Yogyakarta' );
-- ---------------------------------------------------------


-- Dump data of "room_type" --------------------------------
INSERT INTO `room_type`(`id_room_type`,`name_type`) VALUES ( '4', 'Luxurie' );
INSERT INTO `room_type`(`id_room_type`,`name_type`) VALUES ( '5', 'Deluxe' );
INSERT INTO `room_type`(`id_room_type`,`name_type`) VALUES ( '6', 'Family Room' );
INSERT INTO `room_type`(`id_room_type`,`name_type`) VALUES ( '7', 'Standart Rom' );
INSERT INTO `room_type`(`id_room_type`,`name_type`) VALUES ( '8', 'Superior Room' );
-- ---------------------------------------------------------


-- Dump data of "source_voucher" ---------------------------
INSERT INTO `source_voucher`(`id_source_voucher`,`name`,`address`,`phone`,`email`) VALUES ( '1', 'Antonius Doni O', 'Sono Pakus Lor no 339 Kasihan, Bantul Yogyakarta', '081222506239', 'antonius.doni@durioindigo.co.id' );
-- ---------------------------------------------------------


-- Dump data of "sub_district" -----------------------------
INSERT INTO `sub_district`(`id_sub_district`,`sub_district_name`,`id_district`) VALUES ( '7', 'Keraton', '5' );
INSERT INTO `sub_district`(`id_sub_district`,`sub_district_name`,`id_district`) VALUES ( '8', 'Medan Baru,', '11' );
-- ---------------------------------------------------------


-- Dump data of "users" ------------------------------------
INSERT INTO `users`(`id_user`,`name`,`addres`,`password`,`email`,`phone`) VALUES ( '2', 'Antonius Doni O', 'Sono Pakis Lor', '123456', 'donioantonius@gmail.com', '081225062393' );
INSERT INTO `users`(`id_user`,`name`,`addres`,`password`,`email`,`phone`) VALUES ( '3', 'Handoyo', 'Ambarawa', '12345', 'user@travel_apps.com', '' );
-- ---------------------------------------------------------


-- Dump data of "users_adm" --------------------------------
INSERT INTO `users_adm`(`id_adm`,`name`,`user_name`,`password`,`email`,`phone`) VALUES ( '1', 'Antonius Doni O', 'dev8', 'dev8', 'admin@travel_apps.com', '081' );
-- ---------------------------------------------------------


-- Dump data of "voucer_travel" ----------------------------
INSERT INTO `voucer_travel`(`id_voucer`,`no_voucer`,`id_hotel`,`start_date`,`end_date`,`id_room_type`,`price`,`id_source`,`stock`,`status_voucer`,`expired_date`) VALUES ( '2', 'JA/JGJ/001', '1', '2018-09-24', '2018-09-25', '4', '500000', '1', '0', '0', '2018-09-26' );
INSERT INTO `voucer_travel`(`id_voucer`,`no_voucer`,`id_hotel`,`start_date`,`end_date`,`id_room_type`,`price`,`id_source`,`stock`,`status_voucer`,`expired_date`) VALUES ( '3', 'JA/JGJ/002', '1', '2018-09-20', '2018-09-21', '5', '300000', '1', '0', '0', '2018-09-24' );
INSERT INTO `voucer_travel`(`id_voucer`,`no_voucer`,`id_hotel`,`start_date`,`end_date`,`id_room_type`,`price`,`id_source`,`stock`,`status_voucer`,`expired_date`) VALUES ( '4', 'JA/JGJ/003', '1', '2018-09-21', '2018-09-22', '5', '275000', '1', '0', '0', '2018-09-23' );
-- ---------------------------------------------------------


-- CREATE INDEX "lnk_booking_detail_book" ------------------
-- CREATE INDEX "lnk_booking_detail_book" ----------------------
CREATE INDEX `lnk_booking_detail_book` USING BTREE ON `detail_book`( `id_booking` );
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE INDEX "lnk_voucer_travel_detail_book" ------------
-- CREATE INDEX "lnk_voucer_travel_detail_book" ----------------
CREATE INDEX `lnk_voucer_travel_detail_book` USING BTREE ON `detail_book`( `id_voucer` );
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE INDEX "lnk_province_district" --------------------
-- CREATE INDEX "lnk_province_district" ------------------------
CREATE INDEX `lnk_province_district` USING BTREE ON `district`( `id_province` );
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE INDEX "lnk_sub_district_hotel" -------------------
-- CREATE INDEX "lnk_sub_district_hotel" -----------------------
CREATE INDEX `lnk_sub_district_hotel` USING BTREE ON `hotel`( `id_sub_district` );
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE INDEX "lnk_hotel_hotel_fasility" -----------------
-- CREATE INDEX "lnk_hotel_hotel_fasility" ---------------------
CREATE INDEX `lnk_hotel_hotel_fasility` USING BTREE ON `hotel_fasility`( `id_hotel` );
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE INDEX "lnk_hotel_hotel_pic" ----------------------
-- CREATE INDEX "lnk_hotel_hotel_pic" --------------------------
CREATE INDEX `lnk_hotel_hotel_pic` USING BTREE ON `hotel_pic`( `id_hotel` );
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE INDEX "lnk_room_type_voucer_travel" --------------
-- CREATE INDEX "lnk_room_type_voucer_travel" ------------------
CREATE INDEX `lnk_room_type_voucer_travel` USING BTREE ON `voucer_travel`( `id_room_type` );
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE INDEX "lnk_source_voucher_voucer_travel" ---------
-- CREATE INDEX "lnk_source_voucher_voucer_travel" -------------
CREATE INDEX `lnk_source_voucher_voucer_travel` USING BTREE ON `voucer_travel`( `id_source` );
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE LINK "lnk_booking_detail_book" -------------------
-- DROP LINK "lnk_booking_detail_book" -------------------------
ALTER TABLE `detail_book` DROP FOREIGN KEY `lnk_booking_detail_book`;
-- -------------------------------------------------------------


-- CREATE LINK "lnk_booking_detail_book" -----------------------
ALTER TABLE `detail_book`
	ADD CONSTRAINT `lnk_booking_detail_book` FOREIGN KEY ( `id_booking` )
	REFERENCES `booking`( `id_booking` )
	ON DELETE Cascade
	ON UPDATE Cascade;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE LINK "lnk_voucer_travel_detail_book" -------------
-- DROP LINK "lnk_voucer_travel_detail_book" -------------------
ALTER TABLE `detail_book` DROP FOREIGN KEY `lnk_voucer_travel_detail_book`;
-- -------------------------------------------------------------


-- CREATE LINK "lnk_voucer_travel_detail_book" -----------------
ALTER TABLE `detail_book`
	ADD CONSTRAINT `lnk_voucer_travel_detail_book` FOREIGN KEY ( `id_voucer` )
	REFERENCES `voucer_travel`( `id_voucer` )
	ON DELETE Cascade
	ON UPDATE Cascade;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE LINK "lnk_province_district" ---------------------
-- DROP LINK "lnk_province_district" ---------------------------
ALTER TABLE `district` DROP FOREIGN KEY `lnk_province_district`;
-- -------------------------------------------------------------


-- CREATE LINK "lnk_province_district" -------------------------
ALTER TABLE `district`
	ADD CONSTRAINT `lnk_province_district` FOREIGN KEY ( `id_province` )
	REFERENCES `province`( `id_province` )
	ON DELETE Cascade
	ON UPDATE Cascade;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE LINK "lnk_sub_district_hotel" --------------------
-- DROP LINK "lnk_sub_district_hotel" --------------------------
ALTER TABLE `hotel` DROP FOREIGN KEY `lnk_sub_district_hotel`;
-- -------------------------------------------------------------


-- CREATE LINK "lnk_sub_district_hotel" ------------------------
ALTER TABLE `hotel`
	ADD CONSTRAINT `lnk_sub_district_hotel` FOREIGN KEY ( `id_sub_district` )
	REFERENCES `sub_district`( `id_sub_district` )
	ON DELETE Cascade
	ON UPDATE Cascade;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE LINK "lnk_district_sub_district" -----------------
-- DROP LINK "lnk_district_sub_district" -----------------------
ALTER TABLE `sub_district` DROP FOREIGN KEY `lnk_district_sub_district`;
-- -------------------------------------------------------------


-- CREATE LINK "lnk_district_sub_district" ---------------------
ALTER TABLE `sub_district`
	ADD CONSTRAINT `lnk_district_sub_district` FOREIGN KEY ( `id_sub_district` )
	REFERENCES `district`( `id_district` )
	ON DELETE Cascade
	ON UPDATE Cascade;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE LINK "lnk_room_type_voucer_travel" ---------------
-- DROP LINK "lnk_room_type_voucer_travel" ---------------------
ALTER TABLE `voucer_travel` DROP FOREIGN KEY `lnk_room_type_voucer_travel`;
-- -------------------------------------------------------------


-- CREATE LINK "lnk_room_type_voucer_travel" -------------------
ALTER TABLE `voucer_travel`
	ADD CONSTRAINT `lnk_room_type_voucer_travel` FOREIGN KEY ( `id_room_type` )
	REFERENCES `room_type`( `id_room_type` )
	ON DELETE Cascade
	ON UPDATE Cascade;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE LINK "lnk_source_voucher_voucer_travel" ----------
-- DROP LINK "lnk_source_voucher_voucer_travel" ----------------
ALTER TABLE `voucer_travel` DROP FOREIGN KEY `lnk_source_voucher_voucer_travel`;
-- -------------------------------------------------------------


-- CREATE LINK "lnk_source_voucher_voucer_travel" --------------
ALTER TABLE `voucer_travel`
	ADD CONSTRAINT `lnk_source_voucher_voucer_travel` FOREIGN KEY ( `id_source` )
	REFERENCES `source_voucher`( `id_source_voucher` )
	ON DELETE Cascade
	ON UPDATE Cascade;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- ---------------------------------------------------------


