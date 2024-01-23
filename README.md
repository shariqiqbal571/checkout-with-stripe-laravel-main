/*
SQLyog Ultimate v12.5.0 (64 bit)
MySQL - 10.4.27-MariaDB : Database - error_handling
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`error_handling` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `error_handling`;

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `products` */

insert  into `products`(`id`,`product_name`,`product_description`,`photo`,`price`,`created_at`,`updated_at`) values 
(1,'Laptop A','Powerful laptop with high performance.','https://i.pinimg.com/originals/a4/5f/2d/a45f2d98cf20447525bd963225d00a00.jpg','1200',NULL,NULL),
(2,'Mobile Phone X','Latest mobile phone with amazing features.','https://d3chjy2wsvtsxc.cloudfront.net/1.d/preview/b/3/b3800bd9_c471fa15_iPhone_14_Pro_Max_Deep_Purple_PDP_Image_Position-5_Colors_SEA.jpg','800',NULL,NULL),
(3,'High Speed USB ','Choetech USB C To Micro USB Adapter.','https://dablew.pk/file/2022/04/Buy-CHOETECH-USB-C-To-Micro-USB-Adapter-in-Pakistan-at-Dab-Lew-Tech-4.jpg','1500',NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
