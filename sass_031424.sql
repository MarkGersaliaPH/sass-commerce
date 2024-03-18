-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: sass
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint unsigned DEFAULT NULL,
  `store_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Burgers',NULL,1,'2024-03-05 19:39:06','2024-03-13 17:42:12'),(2,'Pizza',NULL,1,'2024-03-05 19:39:19','2024-03-13 17:42:23'),(3,'Snacks',NULL,NULL,'2024-03-13 17:41:33','2024-03-13 17:41:33'),(4,'Rice Meal',NULL,NULL,'2024-03-13 17:41:42','2024-03-13 17:41:42'),(5,'Drinks',NULL,NULL,'2024-03-13 17:41:46','2024-03-13 17:41:46'),(6,'Lunch',NULL,NULL,'2024-03-13 17:41:50','2024-03-13 17:41:50'),(7,'Breakfast',NULL,NULL,'2024-03-13 17:41:54','2024-03-13 17:41:54');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2024_03_06_005144_create_products_table',2),(6,'2024_03_06_005154_create_orders_table',2),(7,'2024_03_06_005201_create_categories_table',2),(8,'2024_03_06_005206_create_stores_table',2),(9,'2024_03_06_010048_create_order_items_table',2),(12,'2024_03_06_011102_update_users_add_user_type',3),(13,'2024_03_06_011751_create_table_store_user',3),(14,'2024_03_06_033404_update_products_table_add_column',4),(16,'2024_03_06_045925_update_order_items_add_column',5),(19,'2024_03_07_050210_create_addresses_table',6),(20,'2024_03_08_025353_update_stores_add_avatar',7),(22,'2024_03_14_012626_update_products_make_promo_price_description_nullable',8),(23,'2024_03_14_014046_update_categories_make_store_id_nullable',9),(24,'2024_03_14_062832_update_products_add_preparation_time',10);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `unit_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_items`
--

LOCK TABLES `order_items` WRITE;
/*!40000 ALTER TABLE `order_items` DISABLE KEYS */;
INSERT INTO `order_items` VALUES (1,1,1,'2024-03-05 21:13:20','2024-03-05 21:13:20',NULL,NULL),(2,1,2,'2024-03-05 21:16:03','2024-03-05 21:16:03',NULL,NULL),(3,2,2,'2024-03-06 17:40:30','2024-03-06 17:40:30',NULL,NULL),(4,2,3,'2024-03-06 17:40:30','2024-03-06 17:40:30',NULL,NULL),(5,3,3,'2024-03-06 20:54:42','2024-03-06 20:54:42','100',1),(6,3,2,'2024-03-06 20:55:07','2024-03-06 20:55:07','156',1);
/*!40000 ALTER TABLE `order_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `store_id` bigint unsigned NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `shipping_fee` decimal(10,2) NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `shipping_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,4,2,100.00,100.00,1,'',0,'2024-03-05 19:57:10','2024-03-05 19:57:10'),(3,4,1,500.00,50.00,1,'Pasig City',1,'2024-03-06 20:54:42','2024-03-06 20:54:42');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` int NOT NULL,
  `promo_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `preparation_time` int DEFAULT NULL,
  `created_by_id` bigint unsigned NOT NULL,
  `store_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint unsigned NOT NULL,
  `is_enabled` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Pork Barbecue','[\"01HRXAHXDBBAD7WTPN0XGBQMW7.jpg\"]','<p>Quae ea similique la.</p>',128,'100',15,3,2,'2024-03-05 19:27:29','2024-03-13 22:03:04',4,1),(3,'BURGER','[\"01HRC4Q9FV3QHZ8P6B18MQQQ11.png\"]','<p>AAASSDAWDASd</p>',100,'55',15,2,1,'2024-03-05 19:40:13','2024-03-07 01:59:58',1,1),(4,'Ramen Soup','[\"01HRC4QX0G8QZDQ8MMDQ0J099X.png\"]','<p>Aut natus dolore eni.</p>',888,'41',15,2,1,'2024-03-05 23:14:21','2024-03-13 22:35:48',2,1),(5,'Brynne Morales','[\"01HRC4RNYGA9EN8CBK3N4X78YP.png\"]','<p>Illo aut quasi assum.</p>',65,'67',15,2,1,'2024-03-07 01:44:00','2024-03-07 01:44:00',2,1),(6,'Giacomo Combs','[\"01HRC4S3MVMR2WK1ZGWR7XB8SX.png\"]','<p>Laborum aliquam dolo.</p>',703,'266',15,2,1,'2024-03-07 01:44:14','2024-03-13 22:16:31',1,1),(7,'Hotdog Sandwhich','[\"01HRXA8Z42C31FNDEZTD0M61H7.jpg\"]','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vel lacus mauris. Nullam mattis rhoncus odio, id dapibus diam ultricies sed. Sed ac pulvinar dui, eu tempus leo. Integer porttitor a tortor id sagittis. Quisque sed est eget sapien tempor pulvinar. Cras interdum pretium erat. Suspendisse sed bibendum elit. Ut a porttitor lacus.</p>',250,NULL,15,2,1,'2024-03-13 17:30:09','2024-03-13 17:47:27',3,1),(8,'Chicken Wings','[\"01HRX9Q0DRE9T7MJRSWTDEZ66X.jpg\"]',NULL,2,NULL,15,2,1,'2024-03-13 17:37:33','2024-03-13 17:49:32',1,1),(9,'Fries','[\"01HRXA1GA8K54XDRSQFP7ZJ570.jpg\"]','<p>Excepteur voluptatib.</p>',2,NULL,15,2,1,'2024-03-13 17:43:17','2024-03-13 17:43:17',3,1),(10,'Buffalo Wings','[\"01HRXA2DPGFWKFGQXQQFSDTVZ0.jpg\"]',NULL,200,'150',15,2,1,'2024-03-13 17:43:47','2024-03-13 22:17:25',4,1),(11,'Burger Stake','[\"01HRXA3D4RSATMFM861VGZQ9F3.jpg\"]','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vel lacus mauris. Nullam mattis rhoncus odio, id dapibus diam ultricies sed. Sed ac pulvinar dui, eu tempus leo. Integer porttitor a tortor id sagittis. Quisque sed est eget sapien tempor pulvinar. Cras interdum pretium erat. Suspendisse sed bibendum elit. Ut a porttitor lacus.</p>',2,NULL,15,2,1,'2024-03-13 17:44:19','2024-03-13 17:49:36',4,1),(12,'Hungaria Silog','[\"01HRXA471FW4WTHE61P00P4ZWW.jpg\"]',NULL,2,NULL,15,2,1,'2024-03-13 17:44:46','2024-03-13 17:49:37',4,1),(13,'Chicken Wings with Salted Egg','[\"01HRXA52X59RF3XG80Z5YZGRZG.jpg\"]','<p>AA</p>',2,NULL,15,2,1,'2024-03-13 17:45:14','2024-03-13 22:16:47',6,1),(14,'Pork Large Intestine','[\"01HRXAFTJAX1W0AYK1540CP05C.jpg\"]',NULL,128,NULL,15,3,2,'2024-03-13 17:51:06','2024-03-13 17:54:17',4,1),(15,'Tenga ng Baboy','[\"01HRXAJW77Z7ZR8C65J61QNVHB.jpg\"]',NULL,128,NULL,15,3,2,'2024-03-13 17:52:46','2024-03-13 17:54:16',4,1),(16,'Pork Isaw','[\"01HRXAKQ5R3X7ZRAYC34T4AEWG.jpg\"]',NULL,128,NULL,15,3,2,'2024-03-13 17:53:14','2024-03-13 17:53:14',4,1),(17,'Isaw ng Manok','[\"01HRXAMDEHZKSW4TV9BP2ABYBH.jpg\"]',NULL,128,NULL,15,3,2,'2024-03-13 17:53:37','2024-03-13 17:54:19',4,1),(18,'Lechon Kawali','[\"01HRXANB7NRK16VT2B78S466AK.jpg\"]',NULL,148,NULL,15,3,2,'2024-03-13 17:54:07','2024-03-13 17:54:21',4,1);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shipping_address`
--

DROP TABLE IF EXISTS `shipping_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shipping_address` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint unsigned NOT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barangay` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shipping_address`
--

LOCK TABLES `shipping_address` WRITE;
/*!40000 ALTER TABLE `shipping_address` DISABLE KEYS */;
/*!40000 ALTER TABLE `shipping_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shipping_addresses`
--

DROP TABLE IF EXISTS `shipping_addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shipping_addresses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint unsigned NOT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barangay` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shipping_addresses`
--

LOCK TABLES `shipping_addresses` WRITE;
/*!40000 ALTER TABLE `shipping_addresses` DISABLE KEYS */;
INSERT INTO `shipping_addresses` VALUES (1,3,NULL,NULL,'Metro manila','ALSDKJAsda','Santa ana','taguig city','1630','2024-03-07 00:34:14','2024-03-07 00:47:21');
/*!40000 ALTER TABLE `shipping_addresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `store_user`
--

DROP TABLE IF EXISTS `store_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `store_user` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `store_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `store_user`
--

LOCK TABLES `store_user` WRITE;
/*!40000 ALTER TABLE `store_user` DISABLE KEYS */;
INSERT INTO `store_user` VALUES (1,2,1,NULL,NULL),(2,3,2,NULL,NULL);
/*!40000 ALTER TABLE `store_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stores`
--

DROP TABLE IF EXISTS `stores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stores` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stores`
--

LOCK TABLES `stores` WRITE;
/*!40000 ALTER TABLE `stores` DISABLE KEYS */;
INSERT INTO `stores` VALUES (1,'WTF','0999881231','Pasig','soliders@diner.com','2024-03-05 17:09:43','2024-03-13 17:18:05','01HRX8KC2V7A4R8V5A4HD9TJ23.jpg'),(2,'KKB',NULL,'Madaluyong',NULL,'2024-03-05 18:56:43','2024-03-13 18:05:57','01HRX8T8HWEMZPWXZ9WFXVVN6Z.jpg');
/*!40000 ALTER TABLE `stores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int NOT NULL COMMENT '1 = Admin, 2=Store,3=Customers',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','admin@admin.com',NULL,'$2y$12$EuUlvDuIDpugX1JI3hQ0V.AN2Rrk0sJaTG3cb5F5LCFe9TRDE4Kqm',0,NULL,'2024-03-05 16:49:43','2024-03-05 16:49:43'),(2,'Store1','store@store.com',NULL,'$2y$12$7HkghFmau/F381hhhD1bUOhEWM0yhmEDiZlhGLaXVmo03C4yulUi6',2,NULL,'2024-03-05 18:42:05','2024-03-05 18:42:05'),(3,'WTF Manager','store2@store.com',NULL,'$2y$12$UY407KxuOXj55HNXZKGizeT7n93fFqLldl0sabDqdJSvzJrRIhHaO',2,NULL,'2024-03-05 18:57:36','2024-03-05 19:02:34'),(4,'Customer','customer1@customer.com',NULL,'$2y$12$1/1x9VQzwv1Z.IFyCu41VunnYqZoCBGyP5v/r7ZpJbyEgKodtVRj.',3,NULL,'2024-03-05 19:50:51','2024-03-05 19:50:51');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-03-14 16:53:42