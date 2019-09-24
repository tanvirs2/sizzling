/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.6.21 : Database - sizzling
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sizzling` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `sizzling`;

/*Table structure for table `tbl_admin` */

DROP TABLE IF EXISTS `tbl_admin`;

CREATE TABLE `tbl_admin` (
  `admin_id` int(5) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `admin_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `admin_password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `admin_status` enum('active','inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'inactive',
  `admin_created_by` int(11) NOT NULL,
  `admin_updated_by` int(5) NOT NULL,
  `admin_created_on` datetime NOT NULL,
  `admin_updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_admin` */

insert  into `tbl_admin`(`admin_id`,`admin_name`,`admin_email`,`admin_password`,`admin_status`,`admin_created_by`,`admin_updated_by`,`admin_created_on`,`admin_updated_on`) values (1,'ADMIN','admin@sizzling.com','21232f297a57a5a74#sizzling#3894a0e4a801fc3','active',0,0,'0000-00-00 00:00:00','2019-08-04 15:03:20');

/*Table structure for table `tbl_banner` */

DROP TABLE IF EXISTS `tbl_banner`;

CREATE TABLE `tbl_banner` (
  `banner_id` int(11) NOT NULL AUTO_INCREMENT,
  `banner_title` varchar(255) NOT NULL,
  `banner_link` varchar(255) NOT NULL,
  `banner_image` varchar(255) NOT NULL,
  `banner_status` enum('Active','Inactive') NOT NULL,
  `banner_created_on` datetime NOT NULL,
  `banner_created_by` int(11) NOT NULL,
  `banner_updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `banner_updated_by` int(11) NOT NULL,
  PRIMARY KEY (`banner_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_banner` */

insert  into `tbl_banner`(`banner_id`,`banner_title`,`banner_link`,`banner_image`,`banner_status`,`banner_created_on`,`banner_created_by`,`banner_updated_on`,`banner_updated_by`) values (3,'Fashion Jewellery Collection','1','Fashion-Jewellery-Collection.jpg','Active','2019-08-01 12:04:08',1,'2019-08-01 12:04:08',0),(4,'Fashionable Womens Bag Collection','3','Fashionable-Womens-Bag-Collection.jpg','Active','2019-08-01 12:04:49',1,'2019-08-01 12:04:49',0);

/*Table structure for table `tbl_brand` */

DROP TABLE IF EXISTS `tbl_brand`;

CREATE TABLE `tbl_brand` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_name` varchar(100) NOT NULL,
  `client_image` varchar(255) NOT NULL,
  `client_status` enum('Active','Inactive') NOT NULL,
  `client_created_on` datetime NOT NULL,
  `client_created_by` int(11) NOT NULL,
  `client_updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `client_updated_by` int(11) NOT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_brand` */

insert  into `tbl_brand`(`client_id`,`client_name`,`client_image`,`client_status`,`client_created_on`,`client_created_by`,`client_updated_on`,`client_updated_by`) values (1,'Tissot','Brand-Tissot.jpg','Active','2018-03-31 23:34:32',0,'2018-03-31 23:34:32',0),(2,'MVMT','Brand-MVMT.jpg','Active','2018-03-31 23:34:57',0,'2018-03-31 23:34:57',0),(3,'Naviforce','Brand-Naviforce.jpg','Active','2018-03-31 23:35:13',0,'2018-03-31 23:35:13',0),(4,'Inalis','Brand-Inalis.jpg','Active','2018-03-31 23:35:24',0,'2018-03-31 23:35:24',0),(5,'Curren','Brand-Curren.jpg','Active','2018-03-31 23:35:33',0,'2018-03-31 23:35:33',0),(6,'17 KM Jewelry','Brand-17 KM Jewelry.jpg','Active','2018-03-31 23:35:59',0,'2018-03-31 23:35:59',0),(7,'Xenlex','Brand-Xenlex.jpg','Active','2018-03-31 23:36:25',0,'2018-03-31 23:36:25',0),(8,'Sinobi','Brand-Sinobi.jpg','Active','2018-03-31 23:36:45',0,'2018-03-31 23:36:45',0);

/*Table structure for table `tbl_code` */

DROP TABLE IF EXISTS `tbl_code`;

CREATE TABLE `tbl_code` (
  `code_id` int(11) NOT NULL AUTO_INCREMENT,
  `code_no` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`code_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_code` */

/*Table structure for table `tbl_contact` */

DROP TABLE IF EXISTS `tbl_contact`;

CREATE TABLE `tbl_contact` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_name` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_subject` varchar(255) NOT NULL,
  `contact_message` text NOT NULL,
  `contact_created_on` datetime NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_contact` */

/*Table structure for table `tbl_order` */

DROP TABLE IF EXISTS `tbl_order`;

CREATE TABLE `tbl_order` (
  `order_id` int(10) NOT NULL AUTO_INCREMENT,
  `order_user_id` int(10) NOT NULL,
  `order_name` varchar(100) NOT NULL,
  `order_email` varchar(100) NOT NULL,
  `order_amount` decimal(10,2) NOT NULL,
  `order_delivery_charge` decimal(10,2) NOT NULL,
  `order_location_id` int(11) NOT NULL,
  `order_phone` varchar(255) NOT NULL,
  `order_total_quantity` int(11) NOT NULL,
  `order_created_on` datetime NOT NULL,
  `order_status` enum('Received','Processing','Shipped','Delivered') NOT NULL,
  `order_ship_address` text NOT NULL,
  `order_payment_method` varchar(255) NOT NULL,
  `order_session_id` varchar(255) NOT NULL,
  `order_track_no` varchar(255) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='o=order';

/*Data for the table `tbl_order` */

/*Table structure for table `tbl_order_details` */

DROP TABLE IF EXISTS `tbl_order_details`;

CREATE TABLE `tbl_order_details` (
  `order_details_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_details_order_id` int(11) NOT NULL,
  `order_details_product_id` int(11) NOT NULL,
  `order_details_product_quantity` int(11) NOT NULL,
  `order_details_product_price` decimal(10,2) NOT NULL,
  `order_details_product_flag` enum('N','O') NOT NULL,
  `order_details_session_id` varchar(255) NOT NULL,
  PRIMARY KEY (`order_details_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_order_details` */

/*Table structure for table `tbl_product` */

DROP TABLE IF EXISTS `tbl_product`;

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_category_id` int(11) NOT NULL,
  `product_collection_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_sku` varchar(20) NOT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `product_details` text NOT NULL,
  `product_stock_quantity` int(11) NOT NULL,
  `product_buying_price` decimal(10,2) NOT NULL,
  `product_old_price` decimal(10,2) NOT NULL,
  `product_new_price` decimal(10,2) NOT NULL,
  `product_keywords` varchar(255) NOT NULL DEFAULT 'Online jewellery shopping in Comilla,necklace, bracelet, womens fashion jewelry, womens fashion jewelry online, necklaces for womens,earrings jewelry, quartz watches in bd, mens watch, led watch,wrist watch online,',
  `product_description` varchar(255) NOT NULL DEFAULT 'Eighteen provides best online shopping experience in Comilla. Huge collection of men''s watches - Top brands, Trendy, stylish jewellery collection from Tk. 80 - Earrings, bracelet, pendant, bangle set, rings',
  `product_created_on` datetime NOT NULL,
  `product_created_by` int(10) NOT NULL,
  `product_updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `product_updated_by` int(10) NOT NULL,
  `product_status` enum('Active','Inactive','Sold') NOT NULL,
  `product_featured` enum('Yes','No') NOT NULL DEFAULT 'No',
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_product` */

insert  into `tbl_product`(`product_id`,`product_category_id`,`product_collection_id`,`product_title`,`product_sku`,`product_image`,`product_details`,`product_stock_quantity`,`product_buying_price`,`product_old_price`,`product_new_price`,`product_keywords`,`product_description`,`product_created_on`,`product_created_by`,`product_updated_on`,`product_updated_by`,`product_status`,`product_featured`) values (1,1,1,'Sizzling','Sizzling01','Sizzling-20190804150711.jpg','Test description&lt;br /&gt;',1000,'99.00','0.00','299.00','','','2019-08-04 15:07:11',0,'2019-08-04 15:07:56',0,'Active','Yes'),(2,1,1,'Sizzling 02','Sizzling02','Sizzling-20190804150711.jpg','Test description&lt;br /&gt;',1000,'99.00','0.00','299.00','Online jewellery shopping in Comilla,necklace, bracelet, womens fashion jewelry, womens fashion jewelry online, necklaces for womens,earrings jewelry, quartz watches in bd, mens watch, led watch,wrist watch online,','Eighteen provides best online shopping experience in Comilla. Huge collection of men\'s watches - Top brands, Trendy, stylish jewellery collection from Tk. 80 - Earrings, bracelet, pendant, bangle set, rings','0000-00-00 00:00:00',0,'2019-08-04 15:15:49',0,'Active','Yes'),(3,1,1,'Sizzling','Sizzling03','Sizzling-20190804150711.jpg','Test description&lt;br /&gt;',1000,'99.00','0.00','299.00','Online jewellery shopping in Comilla,necklace, bracelet, womens fashion jewelry, womens fashion jewelry online, necklaces for womens,earrings jewelry, quartz watches in bd, mens watch, led watch,wrist watch online,','Eighteen provides best online shopping experience in Comilla. Huge collection of men\'s watches - Top brands, Trendy, stylish jewellery collection from Tk. 80 - Earrings, bracelet, pendant, bangle set, rings','0000-00-00 00:00:00',0,'2019-08-04 15:15:52',0,'Active','Yes');

/*Table structure for table `tbl_product_category` */

DROP TABLE IF EXISTS `tbl_product_category`;

CREATE TABLE `tbl_product_category` (
  `product_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_category_name` varchar(255) NOT NULL,
  `product_category_description` varchar(255) NOT NULL,
  `product_category_parent_id` int(11) NOT NULL,
  `product_category_created_by` int(11) NOT NULL,
  `product_category_created_on` datetime NOT NULL,
  `product_category_updated_by` int(11) NOT NULL,
  `product_category_updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `product_category_status` enum('Active','Inactive') NOT NULL,
  `product_category_keywords` varchar(255) NOT NULL,
  PRIMARY KEY (`product_category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_product_category` */

insert  into `tbl_product_category`(`product_category_id`,`product_category_name`,`product_category_description`,`product_category_parent_id`,`product_category_created_by`,`product_category_created_on`,`product_category_updated_by`,`product_category_updated_on`,`product_category_status`,`product_category_keywords`) values (1,'Test','',0,0,'2019-08-04 15:05:55',0,'2019-08-04 15:05:55','Active','');

/*Table structure for table `tbl_product_collection` */

DROP TABLE IF EXISTS `tbl_product_collection`;

CREATE TABLE `tbl_product_collection` (
  `product_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_category_name` varchar(255) NOT NULL,
  `product_category_created_by` int(11) NOT NULL,
  `product_category_created_on` datetime NOT NULL,
  `product_category_updated_by` int(11) NOT NULL,
  `product_category_updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `product_category_status` enum('Active','Inactive') NOT NULL,
  `product_category_keywords` varchar(255) NOT NULL,
  `product_category_description` varchar(255) NOT NULL,
  PRIMARY KEY (`product_category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_product_collection` */

insert  into `tbl_product_collection`(`product_category_id`,`product_category_name`,`product_category_created_by`,`product_category_created_on`,`product_category_updated_by`,`product_category_updated_on`,`product_category_status`,`product_category_keywords`,`product_category_description`) values (1,'Test',0,'2019-08-04 15:06:27',0,'2019-08-04 15:06:27','Active','Sizzling','Sizzling');

/*Table structure for table `tbl_temp_order` */

DROP TABLE IF EXISTS `tbl_temp_order`;

CREATE TABLE `tbl_temp_order` (
  `temp_order_id` int(11) NOT NULL AUTO_INCREMENT,
  `temp_order_product_id` int(11) NOT NULL,
  `temp_order_product_qty` int(11) NOT NULL,
  `temp_order_product_price` decimal(10,2) NOT NULL,
  `temp_order_session_id` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`temp_order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_temp_order` */

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_mobile` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_password_text` varchar(255) NOT NULL,
  `user_address` text NOT NULL,
  `user_created_on` datetime NOT NULL,
  `user_status` enum('Active','Inactive') NOT NULL,
  `user_last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_user` */

insert  into `tbl_user`(`user_id`,`user_name`,`user_email`,`user_mobile`,`user_password`,`user_password_text`,`user_address`,`user_created_on`,`user_status`,`user_last_login`) values (0,'Nazrul Kabir','ziankabir@gmail.com','01671121200','81dc9bdb52d04dc20#eighteen#036dbd8313ed055','1234','','2018-12-27 16:37:30','Active','0000-00-00 00:00:00');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
