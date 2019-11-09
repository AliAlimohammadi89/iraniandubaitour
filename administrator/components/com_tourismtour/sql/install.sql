DROP TABLE IF EXISTS `#__tourismtour_tour`;
CREATE TABLE `#__tourismtour_tour` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`published` tinyint(1) NOT NULL,
	`ordering` int(11) NOT NULL,
	`alias` varchar(255) NOT NULL,
	`fld_title` varchar(255) DEFAULT NULL ,
	`fld_price` int(11) DEFAULT NULL ,
	`fld_metadata` text DEFAULT NULL ,
	`fld_start_time` varchar(255) DEFAULT NULL ,
	`fld_start_address` text NOT NULL ,
	`fld_locationstart` text DEFAULT NULL ,
	`fld_startdate` date DEFAULT NULL ,
	`fld_enddate` datetime DEFAULT NULL ,
	`fld_weekday` int(11) DEFAULT NULL ,
	`fld_create_time` timestamp DEFAULT NULL DEFAULT CURRENT_TIMESTAMP,
	`fld_info` text DEFAULT NULL ,
	`fld_points` int(11) DEFAULT NULL ,
	`fld_tourfeature` int(11) DEFAULT NULL ,
	PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
DROP TABLE IF EXISTS `#__tourismtour_tourorder`;
CREATE TABLE `#__tourismtour_tourorder` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`published` tinyint(1) NOT NULL,
	`ordering` int(11) NOT NULL,
	`alias` varchar(255) NOT NULL,
	`fld_id_user` int(11) DEFAULT NULL ,
	`fld_id_tour` int(11) DEFAULT NULL ,
	`fld_datetor` int(11) DEFAULT NULL ,
	`fld_countofpersons` int(11) NOT NULL ,
	`fld_phonenumber2` int(11) DEFAULT NULL ,
	`fld_price_aed` int(11) DEFAULT NULL ,
	`fld_price_irr` int(11) DEFAULT NULL ,
	`fld_price_date` int(11) DEFAULT NULL ,
	`fld_payment_number` text DEFAULT NULL ,
	`fld_payment_price` int(11) DEFAULT NULL ,
	`fld_payment_status` int(11) DEFAULT NULL ,
	PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
DROP TABLE IF EXISTS `#__tourismtour_coment`;
CREATE TABLE `#__tourismtour_coment` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`published` tinyint(1) NOT NULL,
	`ordering` int(11) NOT NULL,
	`alias` varchar(255) NOT NULL,
	`fld_title` varchar(255) DEFAULT NULL ,
	`fld_text` text DEFAULT NULL ,
	`fld_tour_id` int(11) DEFAULT NULL ,
	`fld_user_id` int(11) DEFAULT NULL ,
	PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
DROP TABLE IF EXISTS `#__tourismtour_turningpoint`;
CREATE TABLE `#__tourismtour_turningpoint` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`published` tinyint(1) NOT NULL,
	`ordering` int(11) NOT NULL,
	`alias` varchar(255) NOT NULL,
	`fld_name` varchar(255) NOT NULL ,
	`fld_location` text DEFAULT NULL ,
	`fld_metadata` text DEFAULT NULL ,
	`fld_url_info` varchar(255) DEFAULT NULL ,
	`fld_info` text DEFAULT NULL ,
	PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
DROP TABLE IF EXISTS `#__tourismtour_tourfeature`;
CREATE TABLE `#__tourismtour_tourfeature` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`published` tinyint(1) NOT NULL,
	`ordering` int(11) NOT NULL,
	`alias` varchar(255) NOT NULL,
	`fld_title` varchar(255) DEFAULT NULL ,
	`fld_icon` varchar(255) DEFAULT NULL ,
	`fld_metadata` text DEFAULT NULL ,
	`fld_information` text DEFAULT NULL ,
	PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
DROP TABLE IF EXISTS `#__tourismtour_image`;
CREATE TABLE `#__tourismtour_image` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`published` tinyint(1) NOT NULL,
	`ordering` int(11) NOT NULL,
	`alias` varchar(255) NOT NULL,
	`fld_src` int(11) DEFAULT NULL ,
	`fld_type` int(11) DEFAULT NULL ,
	`fld_title` varchar(255) DEFAULT NULL ,
	PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;